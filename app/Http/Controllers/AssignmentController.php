<?php

namespace App\Http\Controllers;

use App\Models\assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    public function all(Request $request)
    {
        $assignment = DB::table('assignments')
            ->where('batch_id',$request->batch_id)
            ->where('term',$request->term)
            ->where('course_name',$request->course_name)
            ->get();

        return response()->json($assignment);
    }

    public function create(Request $request)
    {
        $assignment = new assignment();
        $assignment->batch_id = $request->batch_id;
        $assignment->term = $request->term;
        $assignment->course_name = $request->course_name;
        $assignment->assignment_details = $request->assignment_details;
        $assignment->submission_date = $request->submission_date;
        $assignment->save();

        return response()->json(['status' => 'success']);
    }

    public function view($id)
    {
        $assignment = assignment::find($id);

        return response()->json($assignment);
    }

    public function update(Request $request)
    {
        $assignment = assignment::find($request->id);
        $assignment->assignment_details = $request->assignment_details;
        $assignment->submission_date = $request->submission_date;
        $assignment->save();

        return response()->json(['status' => 'success']);
    }

    public function delete($id)
    {
        $assignment = assignment::find($id);
        if ($assignment) {
            $assignment->delete();
        }
        return response()->json(['status' => 'success']);
    }
}
