<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;

class SocialAuthController extends Controller
{
    public function loginGoogleCallback(Request $request){
      $userGoogle = Socialite::driver('google')->user();
      if(!$userGoogle) {
        return redirect()->route('register');
      }
      $userSystem = User::where('google_id', $userGoogle->id)->get()->first();
      // Dã có trên hệ thống
      if($userSystem) {
        Auth::loginUsingId($userSystem->id);
          return redirect()->route('home');
      }
      else {
        $newUser = User::create([
          'username' => $userGoogle->name,
          'email' => $userGoogle->email,
          'google_id' => $userGoogle->id,

        ]);
        Auth::loginUsingId($newUser->id);
        return redirect()->route('home');
      }
    }

    public function loginFacebookCallback() {
      $userFacebook = Socialite::driver('facebook')->user();
      if(!$userFacebook) {
        return redirect()->route('register');
      }
      $userSystem = User::where('facebook_id', $userFacebook->id)->get()->first();
      // Dã có trên hệ thống
      if($userSystem) {
        Auth::loginUsingId($userSystem->id);
          return redirect()->route('home');
      }
      else {
        $newUser = User::create([
          'username' => $userFacebook->name,
          'email' => $userFacebook->email,
          'facebook_id' => $userFacebook->id,

        ]);
        Auth::loginUsingId($newUser->id);
        return redirect()->route('home');
      }
    }
}