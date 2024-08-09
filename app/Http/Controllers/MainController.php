<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\EnvatoCookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function envatoAccounts()
    {
        $envato_cookies = EnvatoCookie::get(['id', 'username', 'password', 'active', 'created_at', 'updated_at']);
        foreach ($envato_cookies as $envato) {
            $envato->updated = $envato->updated_at->diffForHumans();
        }
        return response()->json(['message' => 'Envato Accounts', 'data' => $envato_cookies], 200);
    }
    
    public function updateOrCreateEnvatoAccount(Request $request)
    {
        
        $validate = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'url' => 'required',
        ]);
        
        if ($validate->fails()) {
            return response()->json(['message' => 'Invalid credentials!', 'data' => [$validate->errors()]], 200);
        }
        
        $envato = EnvatoCookie::updateOrCreate(
            ['username' => $request->username],
            [
                'username' => $request->username,
                'password' => $request->password,
            ]
        );
        
        $server = [];
        
        if($request->login_by_cookie){
            $find = EnvatoCookie::find($envato->id);
            $find ->update([
                'cookie' => $request->cookie,
                'x-csrf-token' => $request->x_csrf_token,
                'x-csrf-token-2' => $request->x_csrf_token_2,
            ]);  
        }else {
       // $server = $this->setCookieOnServer($envato->url);
        // $this->updateServerCookies($envato->id);
        }
        
        return response()->json(['message' => 'Envato Account Added Successfully.', 'data' => [
            'username' => $envato->username,
            'active' => $envato->active,
            'server' => $server,
        ]], 200);
    }
    
    protected function updateServerCookies($id)
    {
        $client = new Client();
        $headers = [
        'Content-Type' => 'application/json'
        ];
        $request = new \GuzzleHttp\Psr7\Request('GET', 'https://envato.ospo.in/download_data', $headers);
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
        $request = new \GuzzleHttp\Psr7\Request('POST', 'https://envato.ospo.in/login', $headers, $body);
        $res = $client->sendAsync($request)->wait();
        return json_decode($res->getBody(), true);
    }
    
}
    