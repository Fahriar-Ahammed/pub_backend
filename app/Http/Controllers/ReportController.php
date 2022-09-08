<?php

namespace App\Http\Controllers;


use App\Models\MidAttendance;
use App\Models\Student;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $attendance = MidAttendance::where('batch',$request->batch)
            ->where('course_name',$request->course_name)
            ->distinct('created_at')
            ->count();

        return response()->json($attendance);
    }
}
