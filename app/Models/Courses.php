<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    public static function courses()
    {
        return static::select('name')->orderBy('name')->get()->toArray();
    }
}
