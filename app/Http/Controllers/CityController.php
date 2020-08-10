<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\Road;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    public function getAllCity()
    {
        $cities = City::all();
        return response()->json($cities);
    }

    public function getDistrictByCity($cityId)
    {
        $districts = District::where('city_id',$cityId)->get();
        return response()->json($districts);
    }

    public function getWardByDistrict($districtId)
    {
        $roads= Road::where('district_id',$districtId)->get();
        return response()->json($roads);
    }
}
