<?php

namespace App\Livewire\Front;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Livewire\Component;
use App\Models\EnvatoCookie;
use App\Models\Page;
use GuzzleHttp\Psr7\Request;

class Detail extends Component
{
    public $item = [];
    public function render()
    {
        return view('livewire.front.detail');
    }

    public function mount($slug)
    {
        try {
            //$url = 'http://c-req.ospo.in/url/request';
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://c-req.ospo.in/url/request',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => 'url=https%3A%2F%2Felements.envato.com%2Fdata-api%2Fpage%2Fitem-detail%3Fpath%3D%2F' . $slug . '%26languageCode%3Den%26clientVersion%3D4c0d36193b41d268f7a7cb0c72a49d6d84013cae%26enrollments%3DacDRkPbsSg6ejqGlTTHslg%3D0%26512f222f-a9b5-401e-88e9-ec32db4407e9%3D1%2681a51c79-9ad5-4cf3-a786-cd99e99009fd%3D0&proxy=' . config('app.web_proxy'),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded'
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response, true);
            $this->item = $response['data'];
        } catch (\Exception $e) {
            $this->item = [];
        }
    }


    public function download()
    {
        try {
            $settings = \App\Models\Setting::get();
            $interval = $settings->where('key', 'interval')->value('value') ?? 10;
            if (auth()->check()) {
                $subscription = auth()->user()?->purchases->first();

                if (!$subscription) {
                    $this->dispatchBrowserEvent('show-snackbar', ['message' => 'Please purchase a subscription to download.', 'type' => 'error']);
                    return;
                }
                $total_limit = $subscription?->package?->per_day_download ?? 5;
                $subscription_end = $subscription?->subscription_end;
                if (Carbon::parse($subscription_end)?->diffInDays(Carbon::now()->subDay()) > 0) {
                    $next_download = auth()->user()?->downloads()->latest()
                        ->where('created_at', '>=', Carbon::now()->startOfDay())->first()->next_download ?? now();
                    $today_downloads = auth()->user()->downloads()->where('created_at', '>=', Carbon::now()->startOfDay())->count();
                   

                    if ($today_downloads > $total_limit) {
                        $this->dispatchBrowserEvent('show-snackbar', ['message' => 'You have reached your daily download limit.', 'type' => 'error']);
                        return;
                    }

                    if ($next_download == now() || $next_download < now()) {
                        $this->donwload();
                        auth()->user()?->downloads()->create(
                            [
                                'file_name' => $this->item['item']['title'] ?? '',
                                'next_download' => now()->addMinutes($interval)
                            ]
                        );
                        return;
                    } else {
                        $minutes_remaining = Carbon::parse($next_download)->diffInMinutes(now());
                        $this->dispatchBrowserEvent('show-snackbar', ['message' => 'You can download again after ' . $minutes_remaining . ' minutes.', 'type' => 'error']);
                    }
                } else {
                    $this->dispatchBrowserEvent('show-snackbar', ['message' => 'Your subscription has expired. Please renew your subscription to continue downloading.', 'type' => 'error']);
                }
            } else {
                $this->dispatchBrowserEvent('show-snackbar', ['message' => 'Please login to download.', 'type' => 'error']);
            }
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('show-snackbar', ['message' => 'Something went wrong. Please try again later.', 'type' => 'error']);
        }
    }


    public function donwload()
    {
        $envato_data = EnvatoCookie::where('active', 1)->where('limit_downloads', '<', 20)->first();
        if (!$envato_data) {
            EnvatoCookie::latest()->update(['limit_downloads' => 0]);
            // $this->js('alert("Please refresh the page and try again.")');
            $this->dispatchBrowserEvent('show-snackbar', ['message' => 'Please refresh the page and try again.', 'type' => 'error']);
            return;
        }


        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json'
        ];
        $body = '{
            "csrf_1": "' . $envato_data['x-csrf-token'] . '",
            "csrf_2": "' . $envato_data['x-csrf-token-2'] . '",
            "cookie": "' . $envato_data['cookie'] . '"
          }';

        $request = new Request('POST', 'https://c-req.ospo.in/elements-api/items/' . $this->item['item']['id'] . '/download_and_license.json', $headers, $body);
        $res = $client->sendAsync($request)->wait();
        if ($res->getStatusCode() == 200) {
            $json = json_decode($res->getBody(), true);
            if (isset($json['data']['attributes']['downloadUrl'])) {
                $envato_data->total_downloads = $envato_data->total_downloads + 1;
                $envato_data->limit_downloads = $envato_data->limit_downloads + 1;
                $envato_data->save();
                $this->dispatchBrowserEvent('open-new-tab', ['url' => $json['data']['attributes']['downloadUrl']]);
            } else {
                $this->dispatchBrowserEvent('show-snackbar', ['message' => 'Something went wrong. Please try again later.', 'type' => 'error']);
            }
        }
    }


    public function index($slug)
    {
        
        $page = Page::where('slug', $slug)->first();
        if($page != null)
        {
           return view('page', compact('page'));
        }
        return view('front.detail', compact('slug'));
    }
}
