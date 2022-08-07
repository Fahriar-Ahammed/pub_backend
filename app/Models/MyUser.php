<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyUser extends Model
{
    public function address()
    {
        return $this->hasOne(MyUserAddress::class,'user_id');
    }
}
