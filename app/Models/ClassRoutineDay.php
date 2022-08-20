<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoutineDay extends Model
{
    public function nineAm()
    {
        return $this->belongsTo(Course::class,'nine_am','id');
    }
    public function tenAm()
    {
        return $this->belongsTo(Course::class,'ten_am','id');
    }
}
