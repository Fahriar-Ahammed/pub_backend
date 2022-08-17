<?php

namespace App\Http\Controllers;

use App\Models\presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresentationController extends Controller
{
    public function all()
    {
        $presentation = DB::table('presentations')->get();

        return response()->json($presentation);
    }

    public function create(Request $request)
    {
        $presentation = new presentation();
        $presentation->batch = $request->batch;
        $presentation->term = $request->term;
        $presentation->course_name = $request->course_name;
        $presentation->presentation_details = $request->presentation_details;
        $presentation->submission_date = $request->submission_date;
        $presentation->save();

        return response()->json( ['status' => 'success'] );
    }

    public function view($id)
    {
        $presentation = presentation::find($id);

        return response()->json($presentation);
    }

    public function update(Request $request,$id)
    {
        $presentation = presentation::find($id);
        $presentation->batch = $request->batch;
        $presentation->course_name = $request->course_name;
        $presentation->presentation_details = $request->presentation_details;
        $presentation->submission_date = $request->submission_date;
        $presentation->save();

        return response()->json( ['status' => 'success'] );
    }

    public function delete($id)
    {
        $presentation = presentation::find($id);
        if($presentation){
            $presentation->delete();
        }
        return response()->json( ['status' => 'success'] );
    }
}
