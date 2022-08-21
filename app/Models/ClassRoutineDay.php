<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoutineDay extends Model
{
    public function nineAm()
    {
        return $this->belongsTo(Course::class, 'nine_am', 'id')
            ->select('id','course_title','course_code','teacher_id')
            ->with(['teacher' => function($query){
                $query->select('id','name');
            }]);
    }

    public function tenAm()
    {
        return $this->belongsTo(Course::class, 'ten_am', 'id')
            ->select('id','course_title','course_code','teacher_id')
            ->with(['teacher' => function($query){
                $query->select('id','name');
            }]);
    }

    public function twelvePm()
    {
        return $this->belongsTo(Course::class, 'twelve_pm', 'id')
            ->select('id','course_title','course_code','teacher_id')
            ->with(['teacher' => function($query){
                $query->select('id','name');
            }]);
    }

    public function twoPm()
    {
        return $this->belongsTo(Course::class, 'two_pm', 'id')
            ->select('id','course_title','course_code','teacher_id')
            ->with(['teacher' => function($query){
                $query->select('id','name');
            }]);
    }

    public function threePm()
    {
        return $this->belongsTo(Course::class, 'three_pm', 'id')
            ->select('id','course_title','course_code','teacher_id')
            ->with(['teacher' => function($query){
                $query->select('id','name');
            }]);
    }
}
