<?php

namespace App\Livewire\Front;

use Livewire\Component;

class Items extends Component
{
    public $items = [], $search = '';
    public function render()
    {
        return view('livewire.front.items');
    }
    
    public function index()
    {
        $page = request()->page;
        return view('front.items', compact('page'));
    }
    
    public function mount($page)
    {
        $this->search = $page;
        $this->items = $this->int_items();
    }
    
    public function int_items()
    {
        
        $data = 'url=https://elements.envato.com/data-api/page/items-page?path=/'.$this->search.'&languageCode=en&clientVersion=4c0d36193b41d268f7a7cb0c72a49d6d84013cae&enrollments=acDRkPbsSg6ejqGlTTHslg=1&512f222f-a9b5-401e-88e9-ec32db4407e9=0&81a51c79-9ad5-4cf3-a786-cd99e99009fd=0&proxy='.config('app.web_proxy');
        $explod = explode('/', $this->search);
        if($explod[0] == null)
        {
            $data = 'url=https://elements.envato.com/data-api/page/all-items-page?path=/all-items/'.$explod[1].'&languageCode=en&clientVersion=4c0d36193b41d268f7a7cb0c72a49d6d84013cae&enrollments=acDRkPbsSg6ejqGlTTHslg=1&512f222f-a9b5-401e-88e9-ec32db4407e9=0&81a51c79-9ad5-4cf3-a786-cd99e99009fd=0&proxy='.config('app.web_proxy');
        }
        
        $url = 'http://c-req.ospo.in/url/request';
        $req = self::request('POST', $url, $data);
        $items = [];
        if(isset($req['data']['groups']))
        {
            foreach($req['data']['groups'] as $group)
            {
                foreach($group['result']['items'] as $item)
                {
                    $items[] = $item;
                }
            }
            
            $req['data']['items'] = $items;
        }
        
        return $req['data']['items'] ?? [];
    }
    
    public static function request($type = 'GET', $url, $data = 0, $httpheader = array(), $proxy = 0){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
        //curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL , 1);
        if($proxy) curl_setopt($ch, CURLOPT_PROXY, $proxy);
        if($httpheader)curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        if ($data):
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        endif;
        $response = curl_exec($ch);
        if(curl_errno($ch))
        return $ch;
        
        $httpcode = curl_getinfo($ch);
        if(!$httpcode) return false; else{
            $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            curl_close($ch);
            return json_decode($body, true);
        }
    }
    
}
