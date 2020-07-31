<?php

namespace App\Http\Controllers;

use App\Road;
use Illuminate\Http\Request;

class RoadController extends Controller
{
    public function showRoadInDistrict(Request $request,$idDistrict){
        $roads = Road::where('district_id',$idDistrict)->select('id', 'name')->get();

        return response()->json($roads);
    }
}
