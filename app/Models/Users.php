<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use SoftDeletes;

    /**
     * Get the notes for the users.
     */
    public function notes()
    {
        return $this->hasMany('App\Notes');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class,'user_id');
    }

    protected $dates = [
        'deleted_at'
    ];
}
