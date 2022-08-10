<?php

namespace App\Http\Controllers;

use App\Models\Marksheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarksheetController extends Controller
{
    public function all()
    {
        $assignment = DB::table('marksheets')->get();

        return response()->json($assignment);
    }

    public function create(Request $request)
    {
        foreach ($request->marks as $key => $data){
            $marksheet = new Marksheet();
            $marksheet->student_id = $request->student_id;
            $marksheet->batch = $request->batch;
            $marksheet->term = $request->term;
            $marksheet->course = $request->course;
            if ($request->assignment){
                $marksheet->assignment = $request->assignment;
            }else if ($request->presentation){
                $marksheet->presentation = $request->presentation;
            }else if ($request->class_test){
                $marksheet->class_test = $request->class_test;
            }else if ($request->course_mark){
                $marksheet->course_mark = $request->course_mark;
            }
            $marksheet->save();
        }

        return response()->json( ['status' => 'success'] );
    }

    public function view(Request $request)
    {
        $marksheet = DB::table('marksheets')
            ->where('batch',$request->batch)
            ->where('course_name',$request->course)->get();

        return response()->json($marksheet);
    }

    public function update(Request $request)
    {
        foreach ($request->marks as $key => $data){
            $marksheet = Marksheet::find($request->id);
            if ($request->assignment){
                $marksheet->assignment = $request->assignment;
            }else if ($request->presentation){
                $marksheet->presentation = $request->presentation;
            }else if ($request->class_test){
                $marksheet->class_test = $request->class_test;
            }else if ($request->course_mark){
                $marksheet->course_mark = $request->course_mark;
            }
            $marksheet->save();
        }

        return response()->json( ['status' => 'success'] );
    }

    public function delete($id)
    {
        $marksheet = Marksheet::find($id);
        if($marksheet){
            $marksheet->delete();
        }
        return response()->json( ['status' => 'success'] );
    }
}
