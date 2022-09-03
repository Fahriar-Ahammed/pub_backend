<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function all()
    {
        $teacher = DB::table('teachers')->get();

        return response()->json($teacher);
    }

    public function create(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = 'Active';
        $user->save();

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->department = $request->department;
        $teacher->email = $request->email;
        $teacher->contact_number = $request->contact_number;
        $teacher->save();

        return response()->json( ['status' => 'success'] );
    }

    public function view($id)
    {
        $teacher = Teacher::find($id);

        return response()->json($teacher);
    }

    public function update(Request $request,$id)
    {
        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->department = $request->department;
        $teacher->email = $request->email;
        $teacher->contact_number = $request->contact_number;
        $teacher->save();

        return response()->json( ['status' => 'success'] );
    }

    public function delete($id)
    {
        $teacher = Teacher::find($id);
        if($teacher){
            $teacher->delete();
        }
        return response()->json( ['status' => 'success'] );
    }
}
