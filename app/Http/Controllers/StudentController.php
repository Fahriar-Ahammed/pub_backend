<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function all(Request $request)
    {
        $student = DB::table('students')
            ->where('batch_id',$request->batch_id)
            ->get();

        return response()->json($student);
    }

    public function create(Request $request)
    {
        $student = new Student();
        $student->pub_id = $request->pub_id;
        $student->name = $request->name;
        $student->batch = $request->batch;
        $student->contact_number = $request->contact_number;
        $student->parents_number = $request->parents_number;
        $student->save();

        return response()->json( ['status' => 'success'] );
    }

    public function view($id)
    {
        $student = Student::find($id);

        return response()->json($student);
    }

    public function update(Request $request,$id)
    {
        $student = Student::find($id);
        $student->pub_id = $request->pub_id;
        $student->name = $request->name;
        $student->batch = $request->batch;
        $student->contact_number = $request->contact_number;
        $student->parents_number = $request->parents_number;
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
