<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function courseBatchWise(Request $request)
    {
        $semester = Student::where('batch_id', $request->batch_id)
            ->first();

        $course = DB::table('courses')
            ->where('semester', $semester->semester)
            ->where('teacher_id', $request->teacher_id)
            ->get();

        return response()->json($course);
    }

    public function all()
    {
        $course = DB::table('courses')->get();

        return response()->json($course);
    }

    public function create(Request $request)
    {
        $course = new Course();
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

    public function update(Request $request, $id)
    {
        $course = Course::find($id);
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
