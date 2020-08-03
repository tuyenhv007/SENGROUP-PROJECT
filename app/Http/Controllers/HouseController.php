<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\District;
use App\House;
use App\Image;
use App\Road;
use Illuminate\Http\Request;

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

    public function postHouse(Request $request)
    {
        $nameHouse = $request->name;
        $type = $request->type;
        $rooms = $request->rooms;
        $desc = $request->desc;
        $price = $request->price;
        $status = HouseStatus::EMPTY;
        $house = new House();
        $house->name = $nameHouse;
        $house->type = $type;
        $house->roooms = $rooms;
        $house->desc = $desc;
        $house->price = $price;
        $house->user_id = 2;
        $house->status = $status;
        $house->save();
        $city_id = $request->city;
        $city = City::where('id', $city_id)->get();
        $district_id = $request->district;
        $district = District::where('id', $district_id)->get();
        $road_id = $request->road;
        $road = Road::where('id', $road_id)->get();
        $sn = $request->sn;
        $address = new Address();
        $address->city = $city[0]['name'];
        $address->district = $district[0]['name'];
        $address->road = $road[0]['name'];
        $address->sn = $sn;
        $address->house_id = $house->id;
        $address->save();
        if ($request->hasFile('photos')) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg', 'gif'];
            $files = $request->file('photos');
            // flag xem có thực hiện lưu DB không. Mặc định là có
            $exe_flg = true;
            // kiểm tra tất cả các files xem có đuôi mở rộng đúng không
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if (!$check) {
                    // nếu có file nào không đúng đuôi mở rộng thì đổi flag thành false
                    $exe_flg = false;
                    break;
                }
            }
            // nếu không có file nào vi phạm validate thì tiến hành lưu DB
            if ($exe_flg) {
                foreach ($request->photos as $photo) {
                    $filename = $photo->store('images','public');
                    $image = new Image();
                    $image->image = $filename;
                    $image->house_id = $house->id;
                    $image->save();
                }
                echo "Upload successfully";
            } else {
                echo "Falied to upload. Only accept jpg, png photos.";
            }
        }

    }

}
