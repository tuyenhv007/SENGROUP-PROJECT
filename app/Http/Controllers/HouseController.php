<?php

namespace App\Http\Controllers;

use App\Address;
use App\Bill;
use App\City;
use App\District;
use App\House;
use App\Http\Requests\ValidateFormBookHouse;
use App\Http\Requests\ValidatePostHouse;

use App\Image;
use App\Road;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::all();
        return view('houses.list', compact('houses'));
    }

    public function show($id)
    {
        $house = House::findOrFail($id);
        return view('houses.detail', compact('house'));
    }

    public function postForm()
    {
        $cities = City::all();
        return view('houses.post-form', compact('cities'));
    }

    public function postHouse(ValidatePostHouse $request)
    {
        $house = new House();
        $house->name = $request->name;
        $house->type = $request->type;
        $house->rooms = $request->rooms;
        $house->desc = $request->desc;
        $house->price = $request->price;
        $house->user_id = Session::get('user')->id;
        $house->status = HouseStatus::EMPTY;
        $house->save();
        $city = City::where('id', $request->city)->get();
        $district = District::where('id', $request->district)->get();
        $road = Road::where('id', $request->road)->get();
        $sn = $request->sn;
        $address = new Address();
        $address->city = $city[0]['name'];
        $address->district = $district[0]['name'];
        $address->road = $road[0]['name'];
        $address->sn = $sn;
        $address->house_id = $house->id;
        $address->save();
        if ($request->hasFile('photos')) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $files = $request->file('photos');
            $exe_flg = true;
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if (!$check) {
                    $exe_flg = false;
                    break;
                }
            }
            if ($exe_flg) {
                foreach ($request->photos as $photo) {
                    $filename = $photo->store('images', 'public');
                    $image = new Image();
                    $image->image = $filename;
                    $image->house_id = $house->id;
                    $image->save();
                }
                toastr()->success('Đăng bài thành công !', 'Thông báo');
                return redirect()->route('houses.list');
            } else {
                toastr()->error('Đăng bài thất bại, bạn vui lòng kiểm tra lạ i!');
            }
        }
    }

    public function viewBookHouse($id)
    {
        $house = House::findOrFail($id);
        return view('houses.book-house', compact('house'));
    }

    public function bookHouse(ValidateFormBookHouse $request, $id)
    {
        $house = House::findOrFail($id);
        $bill = new Bill();
        $bill->checkIn = $request->dateIn;
        $bill->checkOut = $request->dateOut;
        $bill->status = 0;
        $bill->total = $house->price;
        $bill->house_id = $house->id;
        $bill->user_id = \Illuminate\Support\Facades\Session::get('user')->id;
        $bill->save();
        return back();
    }

}
