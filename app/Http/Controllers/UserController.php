<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateFormChangePassword;
use App\Http\Requests\ValidateProfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //

    public function showProfile()
    {
        $id = Session::get('user')->id;
        $user = User::find($id);
        return view('users.profile', compact(['user']));
    }

    public function editProfile(ValidateProfile $request, $id)
    {
        User::where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        alert('Sửa thành công', 'Successfully', 'success')->autoClose(1500);
        return redirect()->route('user.show');
    }

    public function updateAvatar(Request $request, $id)
    {
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $newFileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $cover->getClientOriginalExtension();
            $cover->storeAs('public/images', $newFileName);
            $user = User::find($id);
            $user->image = $newFileName;
            $user->save();
        }
        alert('Cập nhập thành công', 'Successfully', 'success')->autoClose(1500);
        return redirect()->back();
    }

    public function formChangePassword()
    {
        return view('users.change-password');
    }
    public function changePassword(ValidateFormChangePassword $request, $id){
        $user = User::find($id);
        $password = md5($request->password);
        if ($user->password == $password) {
            if ($request->newpass == $request->confirmpass) {
                $user->password = md5($request->newpass);
                $user->save();
                alert('Đổi mật khẩu thành công', 'Successfully', 'success')->autoClose(1500);
                return redirect()->route('houses.list');
            } else {
                alert()->error('Error', 'Nhập lại mật khẩu không khớp');
                return redirect()->back();
            }
        } else {
            alert()->error('Error', 'Mật khẩu hiện tại không chính xác');
            return redirect()->back();
        }
    }
}

