<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function teacher()
    {
        return $this->hasMany(Users::class,'department_id');
    }

    public function course()
    {
        return $this->hasMany(Course::class,'department_id');
    }


}
