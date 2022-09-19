<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function courseSemesterWise(Request $request)
    {
        $course = DB::table('courses')
            ->where('department_id',$request->id)
            ->where('semester',$request->semester)
            ->select('course_code','course_title')
            ->get();

        return response()->json($course);
    }

    public function all($id)
    {
        $course = DB::table('courses')
            ->where('department_id',$id)
            ->get();

        return response()->json($course);
    }

    public function create(Request $request)
    {
        $course = new Course();
        $course->department_id = $request->department_id;
        $course->semester = $request->semester;
        $course->course_code = $request->course_code;
        $course->course_title = $request->course_title;
        $course->save();

        return response()->json(['status' => 'success']);
    }

    public function view($id)
    {
        $course = Course::find($id);

        return response()->json($course);
    }

    public function update(Request $request)
    {
        $course = Course::find($request->id);
        $course->semester = $request->semester;
        $course->course_code = $request->course_code;
        $course->course_title = $request->course_title;
        $course->save();

        return response()->json(['status' => 'success']);
    }

    public function delete($id)
    {
        $course = Course::find($id);
        if ($course) {
            $course->delete();
        }
        return response()->json(['status' => 'success']);
    }
}
