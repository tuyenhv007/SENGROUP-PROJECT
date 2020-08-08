<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function showDistrictInCity(Request $request , $city_id){
        $districts = District::where('city_id',$city_id)->select('id', 'name')->get();
        return response()->json($districts);
    }
}
