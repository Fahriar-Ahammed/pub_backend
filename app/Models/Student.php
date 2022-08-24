<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function midAttendance()
    {
        return $this->hasMany(MidAttendance::class,'student_id','pub_id');
    }

    public function finalAttendance()
    {
        return $this->hasMany(FinalAttendance::class,'student_id','pub_id');
    }
}
