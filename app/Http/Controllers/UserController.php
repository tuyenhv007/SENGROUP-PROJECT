<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
class UserController extends Controller
{
    //

    public function showProfile(){
        $id=Session::get('user')->id;
        $user=User::find($id);
        return view('users.profile',compact(['user']));
    }
    public function editProfile(Request $request,$id){
        User::where('id',$id)->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address
        ]);
        alert('Profile Update', 'Successfully', 'success')->autoClose(1500);
        return redirect()->route('user.show');
    }
    public function updateAvatar(Request $request ,$id){
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $newFileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $cover->getClientOriginalExtension();
            $cover->storeAs('public/images', $newFileName);
            $user=User::find($id);
            $user->image = $newFileName;
            $user->save();
        }
        alert('Avatar Update', 'Successfully', 'success')->autoClose(1500);
        return redirect()->back();
    }
}