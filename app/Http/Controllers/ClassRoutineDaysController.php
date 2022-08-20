<?php

namespace App\Http\Controllers;

use App\Models\ClassRoutineDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassRoutineDaysController extends Controller
{
    public function index(Request $request)
    {
        $routine = ClassRoutineDay::where('batch',$request->batch)
            ->where('department',$request->department)
            ->with(['nineAm' => function($query){
                return $query->select('course_code','course_title');
            }])
            ->get();

        return response()->json($routine);
    }

    public function create(Request $request)
    {
        $routineData = $request->routine;
        foreach ($routineData as $key => $data){
            $routine = new ClassRoutineDay();
            $routine->batch = $request->batch;
            $routine->department = $request->department;
            $routine->day = $data['day'];
            $routine->nine_am = $data['nine_am'];
            $routine->ten_am = $data['ten_am'];
            $routine->twelve_pm = $data['twelve_pm'];
            $routine->two_pm = $data['two_pm'];
            $routine->three_pm = $data['three_pm'];
            $routine->save();
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ClassRoutineDay $classRoutineDay)
    {
        //
    }

    public function edit(ClassRoutineDay $classRoutineDay)
    {
        //
    }

    public function update(Request $request, ClassRoutineDay $classRoutineDay)
    {
        //
    }

    public function destroy(ClassRoutineDay $classRoutineDay)
    {
        //
    }
}
