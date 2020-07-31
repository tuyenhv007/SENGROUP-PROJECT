<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{

    public function index()
    {
        $houses = House::all();
        return view('houses.list', compact('houses'));

    }

    public function show()
    {
        return view('houses.detail');
    }

}
