<?php

namespace App\Http\Controllers;

use App\Bill;
use App\House;
use App\Http\Requests\ValidateFormChangePassword;
use App\Http\Requests\ValidateProfile;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //

    public function showProfile()
    {
//        $id_social = Auth::user()->id;
        $id = Session::get('user')->id;
        $user = User::find($id);
        return view('users.profile', compact('user'));
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

    public function changePassword(ValidateFormChangePassword $request, $id)
    {
        $user = User::find($id);
        $password = md5($request->password);

        if ($user->password === $password) {
            if (($request->newpass) === ($request->confirmpass)) {
                if ($user->password === md5($request->newpass)) {
                    alert()->error('Error', 'Mật khẩu mới trùng với mật khẩu cũ');
                    return redirect()->back();
                }
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

    public function historyBookHouses($id)
    {

        $user = User::find($id);
        $bills = Bill::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        return view('users.history-bookHouses', compact('user', 'bills'));
    }

    public function showHouseUser($id)
    {
        $houses = House::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        return view('users.show-house-user', compact('houses'));
    }

    public function showBillHouse($id)
    {
        $bills = Bill::where('house_id', $id)->orderBy('created_at', 'DESC')->get();
        return view('users.show-bill-house', compact('bills'));
    }


    public function formCancleBookHouse($id)
    {
        $bill = Bill::find($id);
        $house = House::find($bill->house_id);
        return view('users.cancle-bookHouse', compact('bill', 'house'));
    }

    public function cancleBookHouse($id)
    {
        $bill = Bill::find($id);
        $dateIn = $bill->checkIn;
        $now = date("Y-m-d", time());
        $checkDate = (strtotime($dateIn) - strtotime($now)) / (60 * 60 * 24);
        if ($checkDate > HouseStatus::ONEDAY) {
            $bill->status = BillStatus::CANCLE;
            $bill->save();
            Alert()->success('Hủy thành công !');
            return redirect()->route('user.historyBookHouses', $bill->user_id);
        } else {
            alert()->error('Error', 'Không được hủy trước 1 ngày');
            return redirect()->route('user.historyBookHouses', $bill->user_id);
        }
    }

    public function updateStatusHouse(Request $request, $id)
    {
        $house = House::find($id);
        $house->status = $request->statusHouse;
        $house->save();
        foreach ($house->bills as $bill) {
            $bill_id = $bill->id;
            $bill->status = $request->$bill_id;
            $bill->save();
        }
        Alert()->success('Cập nhật thành công !');
        return redirect()->route('user.billHouse', $id);
    }

    public function showIncome($id)
    {
        $user = User::find($id);
        $income = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0];
        for ($i = 1; $i < 13; $i++) {
            foreach ($user->billsOfUser as $bill) {

                if (substr($bill->checkOut, 0, 4) == 2020 && substr($bill->checkOut, 5, 2) == $i && $bill->status == BillStatus::COMPLETE)
                    $income[$i] += $bill->total;
            }
        }

        return view('users.show-income',compact('income'));
    }

}

