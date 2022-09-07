<?php

namespace App\Http\Controllers;

use App\Models\FinalAttendance;
use App\Models\MidAttendance;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function todayAttendance(Request $request)
    {
        $attendance = MidAttendance::where('batch',$request->batch)
            ->where('course_name',$request->course_name)
            ->whereDate('created_at',date('Y-m-d'))
            ->get();

        return response()->json($attendance);
    }

    public function dateWise(Request $request)
    {
        if ($request->term == 'Mid'){
            $attendance = DB::table('mid_attendances')
                ->select('created_at')
                ->where('batch',$request->batch)
                ->where('course_name',$request->course)
                ->distinct()
                ->get();
        }else{
            $attendance = DB::table('final_attendances')
                ->select('created_at')
                ->where('batch',$request->batch)
                ->where('course_name',$request->course)
                ->distinct()
                ->get();
        }

        return response()->json($attendance);
    }

    public function create(Request $request)
    {
        $attendanceData = json_decode($request->attendance, true);
        if ($request->term == 'Mid'){
            foreach ($attendanceData as $key => $data){
                $attendance = new MidAttendance();
                $attendance->student_id = $data['student_id'];
                $attendance->batch = $request->batch;
                $attendance->course_name = $request->course_name;
                $attendance->attendance = $data['attendance'];
                $attendance->save();
            }
        }else{
            foreach ($attendanceData as $key => $data){
                $attendance = new FinalAttendance();
                $attendance->student_id = $data['student_id'];
                $attendance->batch = $request->batch;
                $attendance->course_name = $request->course_name;
                $attendance->attendance = $data['attendance'];
                $attendance->save();
            }
        }

        return response()->json( ['status' => 'success'] );
    }

    public function view(Request $request)
    {
        if ($request->term == 'Mid'){
            $attendance = Student::select('pub_id')
                ->where('batch_id',$request->batch_id)
                ->with(['midAttendance' => function($query) use ($request) {
                    $query->where('course_name',$request->course);
                }])
                ->get();
        }else{
            $attendance = Student::select('pub_id')
                ->where('batch_id',$request->batch_id)
                ->with(['finalAttendance' => function($query) use ($request) {
                    $query->where('course_name',$request->course);
                }])
                ->get();
        }

        return response()->json($attendance);
    }

    public function update(Request $request)
    {
        if ($request->term == 'Mid'){
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
        if ($request->term == 'Mid'){
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
