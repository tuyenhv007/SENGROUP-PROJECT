<?php

namespace App\Http\Controllers;

use App\Address;
use App\Bill;
use App\City;
use App\Comment;
use App\District;
use App\House;
use App\Http\Requests\ValidatePostHouse;
use App\Image;
use App\Road;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use willvincent\Rateable\Rateable;
use willvincent\Rateable\Rating;

class HouseController extends Controller
{
    public function index()
    {
        Carbon::setLocale('vi');
        $houses = House::orderBy('created_at', 'DESC')->paginate(6);
        $cities = City::all();
        return view('houses.list', compact('houses', 'cities'));
    }

    public function show($id)
    {
        Carbon::setLocale('vi');
        $house = House::findOrFail($id);
        $comments = Comment::where('house_id', $id)->orderBy('created_at', 'DESC')->get();
        return view('houses.detail', compact('house', 'comments'));
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
        $city = City::find($request->city);
        $district = District::find($request->district);
        $road = Road::find($request->road);
        $house->city = $city->name;
        $house->district = $district->name;
        $house->road = $road->name;
        $house->address = $request->sn;
        $house->location = $request->location;
        $house->save();
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

    public function bookHouse(Request $request, $id)
    {
        $request->validate([
            'dateIn' => 'required|date|after:yesterday',
            'dateOut' => 'required|date|after:dateIn'
        ],
            [
                'dateIn.required' => 'Ngày đến không được để trống !',
                'dateOut.required' => 'Ngày đi không được để trống !',
                'dateIn.after' => 'Ngày đến phải sau ngày hôm nay !',
                'dateOut.after' => 'Ngày đi phải sau ngày đến !'
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
        if (!$request->citySearch && !$request->search) {
            return redirect()->route('houses.list');
        } elseif ($request->citySearch && !$request->search) {
            if (!$request->districtSearch && !$request->roadSearch) {
                $city = City::find($request->citySearch);
                $nameCity = $city->name;
                $houses = House::where('city', $nameCity)->paginate(6);
            } elseif ($request->districtSearch && !$request->roadSearch) {
                $district = District::find($request->districtSearch);
                $nameDistrict = $district->name;
                $houses = House::where('district', $nameDistrict)->paginate(6);
            } else {
                $road = Road::find($request->roadSearch);
                $nameRoad = $road->name;
                $houses = House::where('road', $nameRoad)->paginate(6);
//                $images=[];
//                foreach ($houses as $house){
//                    array_push($images,$house->images);
//                }
//                $result=[];
//                array_push($result,$houses);
//                array_push($result,$images);
            }
            return view('houses.list', compact('houses'));
//            return response()->json($result);
        } elseif (!$request->citySearch && $request->search) {
            $search = $request->search;
            $houses = House::where('name', 'LIKE', '%' . $search . '%')->paginate(6);
            return view('houses.list', compact('houses'));
        } else {
            $search = $request->search;
            if (!$request->districtSearch && !$request->roadSearch) {
                $city = City::find($request->citySearch);
                $nameCity = $city->name;
                $houses = House::where('city', $nameCity)->where('name', 'LIKE', '%' . $search . '%')->paginate(6);
            } elseif ($request->districtSearch && !$request->roadSearch) {
                $district = District::find($request->districtSearch);
                $nameDistrict = $district->name;
                $houses = House::where('district', $nameDistrict)->where('name', 'LIKE', '%' . $search . '%')->paginate(6);
            } else {
                $road = Road::find($request->roadSearch);
                $nameRoad = $road->name;
                $houses = House::where('road', $nameRoad)->where('name', 'LIKE', '%' . $search . '%')->paginate(6);
            }
            return view('houses.list', compact('houses'));
        }
    }


}
