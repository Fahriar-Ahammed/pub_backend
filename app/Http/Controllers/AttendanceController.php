<?php

namespace App\Http\Controllers;

use App\Models\FinalAttendance;
use App\Models\MidAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{

    public function create(Request $request)
    {
        return response()->json($request);
//        if ($request->term == 'mid'){
//            foreach ($request->attendance as $key => $data){
//                $attendance = new MidAttendance();
//                $attendance->student_id = $data['student_id'];
//                $attendance->batch = $data['batch'];
//                $attendance->course_name = $data['course_name'];
//                $attendance->attendance = $data['attendance'];
//                $attendance->date = $data['date'];
//                $attendance->save();
//            }
//        }else{
//            foreach ($request->attendance as $key => $data){
//                $attendance = new FinalAttendance();
//                $attendance->student_id = $data['student_id'];
//                $attendance->batch = $data['batch'];
//                $attendance->course_name = $data['course_name'];
//                $attendance->attendance = $data['attendance'];
//                $attendance->date = $data['date'];
//                $attendance->save();
//            }
//        }
//
//        return response()->json( ['status' => 'success'] );
    }

    public function view(Request $request)
    {
        if ($request->term == 'mid'){
            $attendance = DB::table('mid_attendances')
                ->where('batch',$request->batch)
                ->where('course_name',$request->course)->get();
        }else{
            $attendance = DB::table('final_attendances')
                ->where('batch',$request->batch)
                ->where('course_name',$request->course)->get();
        }

        return response()->json($attendance);
    }

    public function update(Request $request)
    {
        if ($request->term == 'mid'){
            foreach ($request->attendance as $key => $data){
                $attendance = MidAttendance::find($request->id);
                $attendance->attendance = $data['attendance'];
                $attendance->date = $data['date'];
                $attendance->save();
            }
        }else{
            foreach ($request->attendance as $key => $data){
                $attendance = FinalAttendance::find($request->id);
                $attendance->attendance = $data['attendance'];
                $attendance->date = $data['date'];
                $attendance->save();
            }
        }

        return response()->json( ['status' => 'success'] );
    }

    public function delete(Request $request)
    {
        if ($request->term == 'mid'){
            $attendance = MidAttendance::find($request->id);
            if($attendance){
                $attendance->delete();
            }
        }else{
            $attendance = FinalAttendance::find($request->id);
            if($attendance){
                $attendance->delete();
            }
        }

        return response()->json( ['status' => 'success'] );
    }
}
