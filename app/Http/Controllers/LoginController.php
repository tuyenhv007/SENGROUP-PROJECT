<?php

namespace App\Http\Controllers;


use App\Customer;
use App\Host;
use App\Http\Requests\ValidateLogin;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ValidateRegister;


class LoginController extends Controller
{
    //
    public function showFormLogin()
    {
        return view('users.login');
    }

    public function showFormRegister()
    {
        return view('users.register');
    }

    public function login(ValidateLogin $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        $user = User::where([
            ['email', '=', $email],
            ['password', '=', $password],
        ])->first();
        if ($user) {
            $login = $user->count();
            if ($login > 0) {
                Session::put('user', $user);
                return redirect()->route('houses.list');
            } else {
                Session::put('error', 'Sai tên đăng nhập hoặc mật khẩu!');
                return redirect()->route('user.login');
            }
        }
    }

    public function logout()
    {
        Session::put('user', null);
        Session::put('user_role',null);
        return redirect()->route('login');
    }

    public function register(ValidateRegister $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = md5($request->password);
        $phone = $request->phone;
        $role = $request->role;
        $address = $request->address;
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->phone = $phone;
        $user->address = $address;
        $user->role = $role;
        $user->save();
        return redirect()->route('user.login');
    }
}
