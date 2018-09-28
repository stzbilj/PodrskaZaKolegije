<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    //
    public static function examTypes()
    {
        return static::all();
    }
}
