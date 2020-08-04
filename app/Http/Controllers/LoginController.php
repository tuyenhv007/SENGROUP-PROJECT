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
                return redirect()->route('login');
            }
        }
    }

    public function logout()
    {
        Session::put('user', null);
        return back();
    }

    public function register(ValidateRegister $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = md5($request->password);
        $phone = $request->phone;
        $role = $request->role;
        $address = $request->address;
        if ($request->hasFile('avatar')) {
            $cover = $request->file('avatar');
            $newFileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $cover->getClientOriginalExtension();
            $cover->storeAs('public/images', $newFileName);
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->phone = $phone;
            $user->address = $address;
            $user->role = $role;
            $user->image = $newFileName;
            $user->save();
        }
        return redirect()->route('');

    }
}
