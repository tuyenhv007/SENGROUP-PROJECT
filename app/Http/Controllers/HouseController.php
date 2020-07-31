<?php

namespace App\Http\Controllers;

use App\City;
use App\House;
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


    public function postForm(){
        $cities = City::all();
        return view('houses.post-form',compact('cities'));
    }


}
