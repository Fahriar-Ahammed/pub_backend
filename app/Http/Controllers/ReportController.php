<?php

namespace App\Http\Controllers;


use App\Models\Marksheet;
use App\Models\MidAttendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $markSheet = DB::table('marksheets')
            ->select('student_id', 'assignment', 'class_test', 'presentation', 'course_mark')
            ->where('batch', $request->batch)
            ->where('term', $request->term)
            ->where('course', $request->course)
            ->get();

        return response()->json($markSheet);
    }
}
