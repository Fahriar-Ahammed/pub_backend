<?php

namespace App\Http\Controllers;


use App\Models\MidAttendance;
use App\Models\Student;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $attendance = Student::with(['midAttendanceCount', function ($query) use ($request) {
            $query->where('course_name', $request->course_name)
                ->where('attendance', 'p')
                ->count();
        }])->get();

    }
}
