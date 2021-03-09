<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;

class AuthController extends Controller
{
    public function login(){
        return view('auths.login');
    }

    public function postLogin(Request $request){
        $username= $request->input('txtUsername');
        $password= $request->input('txtPassword');

        $checkLogin= DB::table('user')->where(['username'=>$username,'password'=>$password])->get();
        if(count($checkLogin) > 0){
            return redirect('/');
        }
        else{
            return redirect('/login');
        }
    }

    public function logout(){
        return view('auths.login');
    }
}
