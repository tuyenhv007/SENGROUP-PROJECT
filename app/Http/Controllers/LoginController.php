<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function showFormLogin(){
        return view('users/login');
    }
    public function showFormRegister(){
        return view('users/register');
    }
    public function login(){

    }
    public function register(Request $request){
        $name=$request->username;
        $email=$request->email;
        $password=$request->password;
        $phone=$request->phone;
        $address=$request->address;
        User::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'address'=>$address,
            'phone'=>$phone
        ]);
        return redirect()->route('home');
    }
}
