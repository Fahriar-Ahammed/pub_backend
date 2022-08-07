<?php

namespace App\Http\Controllers;

use App\Models\assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    public function all()
    {
        $assignment = DB::table('assignments')->get();

        return response()->json($assignment);
    }

    public function create(Request $request)
    {
        $assignment = new assignment();
        $assignment->batch = $request->batch;
        $assignment->course_name = $request->course_name;
        $assignment->assignment_details = $request->assignment_details;
        $assignment->submission_date = $request->submission_date;
        $assignment->save();

        return response()->json( ['status' => 'success'] );
    }

    public function view($id)
    {
        $assignment = assignment::find($id);

        return response()->json($assignment);
    }

    public function update(Request $request,$id)
    {
        $assignment = assignment::find($id);
        $assignment->assignment_details = $request->assignment_details;
        $assignment->submission_date = $request->submission_date;
        $assignment->save();

        return response()->json( ['status' => 'success'] );
    }

    public function delete($id)
    {
        $assignment = assignment::find($id);
        if($assignment){
            $assignment->delete();
        }
        return response()->json( ['status' => 'success'] );
    }
}
