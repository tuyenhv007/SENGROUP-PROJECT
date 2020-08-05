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
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class HouseController extends Controller
{
    public function index()
    {
        Carbon::setLocale('vi');
        $houses = House::orderBy('created_at', 'DESC')->get();
        $cities = City::all();
        return view('houses.list', compact('houses', 'cities'));
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
                alert('Đăng bài thành công', 'Successfully', 'success')->autoClose(1500);
                return redirect()->route('houses.list');
            } else {
                alert('Đăng bài thất bại', 'Successfully', 'success')->autoClose(1500);
                return back();
            }
        }
    }

//    public function viewBookHouse($id)
//    {
//        $house = House::findOrFail($id);
//        return view('houses.book-house', compact('house'));
//    }

    public function bookHouse(Request $request, $id)
    {
        $request->validate([
            'dateIn' => 'required|date|after:yesterday',
            'dateOut' => 'required|date|after:dateIn'
        ],
            [
                'dateIn.required'=>'Ngày đến không được để trống !',
                'dateOut.required'=>'Ngày đi không được để trống !',
                'dateIn.after'=>'Ngày đến phải sau ngày hôm nay !',
                'dateOut.after'=>'Ngày đi phải sau ngày đến !'
            ]);

        $dateIn = $request->dateIn;
        $dateOut = $request->dateOut;
        $days = (strtotime($dateOut) - strtotime($dateIn)) / (60 * 60 * 24);
        $house = House::findOrFail($id);
        $bill = new Bill();
        $bill->checkIn = $request->dateIn;
        $bill->checkOut = $request->dateOut;
        $bill->status = BillStatus::ORDER;
        $bill->note = $request->note;
        $bill->total = ($house->price) * $days;
        $bill->house_id = $house->id;
        $bill->user_id = \Illuminate\Support\Facades\Session::get('user')->id;
        $bill->save();
        Alert()->success('Thuê nhà thành công !');
        return back();
    }

    public function search(Request $request)
    {
        if (!$request->city && !$request->search) {
            return redirect()->route('houses.list');
        } elseif ($request->city && !$request->search) {
            $city_id = $request->city;
            $city = City::find($city_id);
            $district_id = $request->district;
            $district = District::find($district_id);
            $road_id = $request->road;
            $road = Road::find($road_id);
            if ($city_id && !$district_id && !$road_id) {
                $addresses = Address::where('city', $city->name)->get();
            } elseif ($city_id && $district_id && !$road_id) {
                $addresses = Address::where('district', $district->name)->get();
            } else {
                $addresses = Address::where('road', $road->name)->get();
            }
            $houses = [];
            foreach ($addresses as $address) {
                $house = House::find($address->house_id);
                array_push($houses, $house);
            }
            $cities = City::all();
            return view('houses.list', compact('houses', 'cities'));
        } else {
            $search = $request->search;
            $houses = House::where('name', 'LIKE', '%' . $search . '%')->get();
            $cities = City::all();
            return view('houses.list', compact('houses', 'cities'));
        }
    }
}
