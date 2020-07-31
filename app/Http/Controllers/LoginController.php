<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\ValidateRegister;



class LoginController extends Controller
{
    //
    public function showFormLogin(){
        return view('users/login');
    }
    public function showFormRegister(){
        return view('users/register');
    }

    public function login(Request $request){
        $name=$request->username;
        $password=md5($request->password);
        $user = User::where([
            ['name', '=', $name],
            ['password', '=', $password],
        ])->first();

        if($user){
            $login=$user->count();
            if($login>0){
                Session::put('user',$login->name);
                return \view('houses.list');
            }else{
                Session::put('error','Sai tên đăng nhập hoặc mật khẩu!');
                return \redirect()->route('user.login');
            }
        }
    }

    public function register(ValidateRegister $request){
        $name=$request->username;
        $email=$request->email;
        $password=$request->password;
        $phone=$request->phone;
        $role=$request->role;
        $address=$request->address;
        User::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'role'=>$role,
            'address'=>$address,
            'phone'=>$phone
        ]);
        return redirect()->route('user.login');
    }
}
