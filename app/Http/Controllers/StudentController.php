<?php

namespace App\Http\Controllers;

use App\Models\Marksheet;
use App\Models\MidAttendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //all student
    public function all(Request $request)
    {
        $student = DB::table('students')
            ->where('batch_id',$request->batch_id)
            ->select('batch_id','pub_id')
            ->get();
        $attendance = MidAttendance::where('batch',$request->batch)
            ->where('course_name',$request->course_name)
            ->whereDate('created_at',date('Y-m-d'))
            ->first();
        if ($attendance){
            $attendanceTaken ="yes";
        }else{
            $attendanceTaken ="no";
        }

        return response()->json([
            'student' => $student,
            'attendanceTaken' => $attendanceTaken
        ]);
    }

    public function batchWise($id)
    {
        $student = DB::table('students')
            ->where('batch_id',$id)
            ->select('batch_id','pub_id','name')
            ->get();

        return response()->json($student);
    }

    public function create(Request $request)
    {
        $student = new Student();
        $student->batch_id = $request->batch_id;
        $student->pub_id = $request->pub_id;
        $student->name = $request->name;
        $student->semester = "";
        $student->contact_number = "";
        $student->parents_number = "";
        $student->save();

        return response()->json( ['status' => 'success'] );
    }

    public function view($id)
    {
        $student = Student::find($id);

        return response()->json($student);
    }

    public function update(Request $request)
    {
        $student = Student::find($request->id);
        $student->pub_id = $request->pub_id;
        $student->name = $request->name;
        $student->save();

        return response()->json( ['status' => 'success'] );
    }

    public function delete($id)
    {
        $student = Student::find($id);
        if($student){
            $student->delete();
        }
        return response()->json( ['status' => 'success'] );
    }
}
