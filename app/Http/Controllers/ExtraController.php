<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function client_web_events(Request $request)
    {
       event(new \App\Events\UserOnline($request->user()));
       return response()->json(['message' => 'Event has been sent!']);
    }
    
    public function update_fcm_token(Request $request)
    {
       $request->user()->update(['fcmtoken' => $request->token]);
       return response()->json(['message' => 'Token has been updated!']);
    }
    
      public function logout()
      {
         auth()->logout();
         return redirect()->route('home');
      }
      
      public function profile()
      {
         $purchases = auth()->user()->purchases;
         return view('profile', compact('purchases'));
      }
      
      public function account()
      {
         return view('account');
      }
      
      public function payment_options()
      {
         $purchase = auth()->user()?->purchases?->first();
         return view('payment_options', compact('purchase'));
      }
      
      public function downloads()
      {
         $downloads = auth()->user()?->downloads;
         return view('downloads', compact('downloads'));
      }
}
