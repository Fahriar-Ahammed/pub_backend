<?php

namespace App\Http\Controllers;

use App\Models\Marksheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarksheetController extends Controller
{
    public function all()
    {
        $marksheeet = DB::table('marksheets')->get();

        return response()->json($marksheeet);
    }

    public function teacherWise(Request $request)
    {
        $marksheeet = DB::table('marksheets')
            ->where('batch',$request->batch)
            ->where('course',$request->course)
            ->where('term',$request->term)
            ->get();

        return response()->json($marksheeet);
    }

    public function create(Request $request)
    {
        $assignmentMarkData = json_decode($request->assignmentMarkData, true);
        $classTestMarkData = json_decode($request->classTestMarkData, true);
        $presentationMarkData = json_decode($request->presentationMarkData, true);
        $courseMarkMarkData = json_decode($request->courseMarkMarkData, true);

        $this->markInput($assignmentMarkData,$request,"assignment",'assignment_mark');
        $this->markInput($classTestMarkData,$request,"class_test",'class_test_mark');
        $this->markInput($presentationMarkData,$request,"presentation",'presentation_mark');
        $this->markInput($courseMarkMarkData,$request,"course_mark",'course_mark');
        return response()->json( ['status' => 'success'] );
    }

    public function view(Request $request)
    {
        $marksheet = DB::table('marksheets')
            ->where('batch',$request->batch)
            ->where('course',$request->course)->get();

        return response()->json($marksheet);
    }

    public function update(Request $request)
    {
        $assignmentMarkData = json_decode($request->assignmentMarkData, true);
        $classTestMarkData = json_decode($request->classTestMarkData, true);
        $presentationMarkData = json_decode($request->presentationMarkData, true);
        $courseMarkMarkData = json_decode($request->courseMarkMarkData, true);

        $this->markInput($assignmentMarkData,$request,"assignment",'assignment_mark');
        $this->markInput($classTestMarkData,$request,"class_test",'class_test_mark');
        $this->markInput($presentationMarkData,$request,"presentation",'presentation_mark');
        $this->markInput($courseMarkMarkData,$request,"course_mark",'course_mark');
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

    public function markInput($marks,$request,$dataType,$value)
    {
        foreach ($marks as $key => $data){
            $marksheet = Marksheet::where('student_id',$data['student_id'])
                ->where('course',$request->course_name)
                ->where('term',$request->term)
                ->first();
            if ($marksheet){
                $marksheet->$dataType = $data[$value];
                $marksheet->save();
            }else{
                $marksheet = new Marksheet();
                $marksheet->student_id = $data['student_id'];
                $marksheet->batch = $request->batch;
                $marksheet->term = $request->term;
                $marksheet->course = $request->course_name;
                $marksheet->$dataType = $data[$value];
                $marksheet->save();
            }

        }

        return response()->json( ['status' => 'success'] );
    }
}
