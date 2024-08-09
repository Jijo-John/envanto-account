<?php

namespace App\Livewire\Admin;

use GuzzleHttp\Client;
use Livewire\Component;
use App\Models\EnvatoCookie;
use GuzzleHttp\Psr7\Request;

class EnvatoSetting extends Component
{
    public $username, $password, $proxy, $web_proxy, $search;
    public $showModal = false;
    public function render()
    {
        $envato_cookies = EnvatoCookie::when($this->search, function($query) {
            $query->where('username', 'like', '%'.$this->search.'%');
        });
        
        $total_downloads = $envato_cookies->sum('total_downloads');
        $total_accounts = $envato_cookies->count();
        $envato_cookies = $envato_cookies->paginate(10); 
        $total_active = EnvatoCookie::where('active', 1)->count();
        return view('livewire.admin.envato-setting', compact('envato_cookies', 'total_downloads', 'total_accounts', 'total_active'));
    }
    
    public function changeActive($id)
    {
        $envato_cookie = EnvatoCookie::find($id);
        $envato_cookie->active = !$envato_cookie->active;
        $envato_cookie->save();
    }
    public function deleteEnvatoAccount($id)
    {
        $envato_cookie = EnvatoCookie::find($id);
        $envato_cookie->delete();
    }
    
    public function store()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        try {
            $url = $this->getRedirectUrl($this->username, $this->password);
            $response = $this->setCookieOnServer($url);
            
            $envato = EnvatoCookie::updateOrCreate(
                ['username' => $this->username],
                [
                    'username' => $this->username,
                    'password' => $this->password,
                ]
            );
            
            $this->updateServerCookies($envato->id);
            $this->dispatchBrowserEvent('notify:modal', [
                'title' => 'Success',
                'message' => 'Envato Account Added Successfully.'
            ]);
        
            
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('notify:modal', [
                'title' => 'Error',
                'message' => 'Invalid Envato Account.'
            ]);
            return;
        }
    }
    
    public function updateCookie($id)
    {
        try {
        $envato = EnvatoCookie::find($id);
        $url = $this->getRedirectUrl($envato->username, $envato->password);
        $this->setCookieOnServer($url);
            
        $this->updateServerCookies($id);
        $this->dispatchBrowserEvent('notify:modal', [
            'title' => 'Success',
            'message' => 'Envato Account Updated Successfully.'
        ]);
            
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('notify:modal', [
                'title' => 'Error',
                'message' => 'Invalid Envato Account.'
            ]);
            return;
        }
    }
    
    protected function updateServerCookies($id)
    {
        $client = new Client();
        $headers = [
        'Content-Type' => 'application/json'
        ];
        $request = new Request('GET', 'https://envato.ospo.in/download_data', $headers);
        $res = $client->sendAsync($request)->wait();
        $res = json_decode($res->getBody(), true);
        
        $find = EnvatoCookie::find($id);
        $find ->update([
            'cookie' => $res['data']['cookie'] ?? '',
            'x-csrf-token' => $res['data']['x-csrf-token'] ?? '',
            'x-csrf-token-2' => $res['data']['x-csrf-token-2'] ?? '',
        ]);
    }
    protected function setCookieOnServer($url) : array
    {
        $client = new Client();
        $headers = [
        'Content-Type' => 'application/json'
        ];
        $body = '{
        "url": "' . $url . '"
        }';
        $request = new Request('POST', 'https://envato.ospo.in/login', $headers, $body);
        $res = $client->sendAsync($request)->wait();
        return json_decode($res->getBody(), true);
    }

    protected function getRedirectUrl($username, $password): string
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://account.envato.com/api/public/sign_in',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPPROXYTUNNEL => 1,
            CURLOPT_PROXY => $this->proxy,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "language_code": "en",
                "password": "'.$password.'",
                "state": "",
                "to": "elements",
                "username": "'.$username.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type:  application/json',
                'User-Agent:  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
                'x-client-version:  3.0.3',
                'Accept:  application/json',
                'Cookie: __cf_bm=wPG8YmH7U9PTalG4UXPICCH7ZrJgpvaZEQwl4VUL3Jk-1705227949-1-AW9gG+Mmis9jJkmnGF5hs+pg0FRUcvulHn/bWMU9s+bGbR/wM3Th+w2khNufYF0lBjd10ogPrMOlQmGHgJtTTYI=; _cfuvid=rsT9EDptoqkI.tSXVKvR.Z_TBQMEilzcsZi6stFoUbM-1705227949596-0-604800000; btt=627f6877a2ba48318df20382cb8ca30a-ChhnN9JLR0; envatosession=MoYtel8vssQ6lpjViFNokp4NXRUSdVaDuzwHr6C8Zcye%2FHfEISQeRCQ%2FKR7SDjWtOxMaNSWobEwsc1qmQR5fpSJr%2FhFNIxkwWPv1UGrUuQXVxhISR8kRkZHDFnTAxzIRQM%2FIN0hrCspTjKu2uRa2ZWotd6E%2FdhMXUvspJRePivH79IX5I15%2FzvmFdu%2FMvYrHttONPN8%2FjWk4JCA6HJVpGPIgZipK1Nm7%2Fqm%2FM1ezbWYS3SWScOuVKrFzwJnQYoZiL0iHwro2aEm%2FUbyN9uZH--PML4MHLCOkbNBkqP--XJ8e2nvJXV9chr4u6KqH4g%3D%3D'
            ),
            ));

            $res = curl_exec($curl);
            $response = json_decode($res, true);
            if (isset($response['state']) && $response['state'] != 'ok') {
                $this->dispatchBrowserEvent('notify:modal', [
                    'title' => 'Error',
                    'message' => 'Invalid Envato Account or Captcha Required.'
                ]);
                return '';
            }

            $url = $response['redirect'];
            return $url;
    }
}
