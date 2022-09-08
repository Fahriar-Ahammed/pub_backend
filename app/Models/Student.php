<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function midAttendance()
{
    return $this->hasMany(MidAttendance::class,'student_id','pub_id')
        ->select('student_id','attendance');
}

    public function finalAttendance()
    {
        return $this->hasMany(FinalAttendance::class,'student_id','pub_id')
            ->select('student_id','attendance');
    }

    public function midAttendanceCount()
    {
        return $this->hasMany(MidAttendance::class,'student_id','pub_id')
            ;
    }

    public function finalAttendanceCount()
    {
        return $this->hasMany(FinalAttendance::class,'student_id','pub_id')
            ;
    }
}
