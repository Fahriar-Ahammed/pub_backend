<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function all()
    {
        $teacher = DB::table('users')->get();

        return response()->json($teacher);
    }

    public function create(Request $request)
    {
        $user = new User;
        $user->department_id = $request->department_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact_number = $request->contact_number;
        $user->password = bcrypt($request->password);
        $user->status = 'Active';
        $user->save();

        return response()->json( ['status' => 'success'] );
    }

    public function view($id)
    {
        $teacher = Teacher::find($id);

        return response()->json($teacher);
    }

    public function update(Request $request)
    {
        $user = Users::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact_number = $request->contact_number;
        $user->password = bcrypt($request->password);
        $user->save();

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
