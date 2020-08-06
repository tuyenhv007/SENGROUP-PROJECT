<?php

namespace App\Http\Controllers;


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
                Alert()->success('Đăng nhập thành công !')->autoClose(1500);
                return redirect()->route('houses.list');
            }
        } else {
            Session::put('mess', 'Sai tên đăng nhập hoặc mật khẩu!');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Session::put('user', null);
        return redirect()->route('houses.list');
    }

    public function register(ValidateRegister $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = $request->role;
        if ($request->hasFile('avatar')) {
            $cover = $request->file('avatar');
            $newFileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $cover->getClientOriginalExtension();
            $cover->storeAs('public/images', $newFileName);
            $user->image = $newFileName;
//            $user->code = null;
//            $user->time_code = null;

        }
        $user->save();
        alert('Đăng kí thành công', 'Success', 'success')->autoClose(1500);
        return redirect()->route('login');
    }
}
