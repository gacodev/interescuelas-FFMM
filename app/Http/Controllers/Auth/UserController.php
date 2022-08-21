<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller{
    public function login(Request $request){

        $login = $request->validate([
            'email'=> 'required | string',
            'password'=> 'required | string',
        ]);
      
     if(!Auth::attemp($login)){
         return response(['message'=>'user not exist']);
     }
     $token = Auth::$user->createToken('authToken')->accessToken;
     return response(['user' =>Auth::$user,'access token' =>$accessToken]);
    }

}
