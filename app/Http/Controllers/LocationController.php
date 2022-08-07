<?php

namespace App\Http\Controllers;

use App\Models\district;
use App\Models\division;
use App\Models\union;
use App\Models\upazila;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function division(){
        $division = division::all();

        return response()->json([
            'division' => $division,
        ]);
    }

    public function district(Request $request){
        $divisions = division::where('bn_name',$request->district_id)->first();
        $division_id = $divisions->name;

        $district = district::where('division_id',$division_id)->get();

        return response()->json([
            'district' => $district,
        ]);
    }

    public function upazila(Request $request){
        $districts = district::where('bn_name',$request->district_id)->first();
        $district_id = $districts->name;

        $upazila = upazila::where('district_id',$district_id)->get();

        return response()->json([
            'upazila' => $upazila,
        ]);
    }

    public function union(Request $request){
        $upazila = upazila::where('bn_name',$request->district_id)->first();
        $upazila_id = $upazila->id;

        $union = union::where('upazilla_id',$upazila_id)->get();

        return response()->json([
            'union' => $union,
        ]);
    }
}
