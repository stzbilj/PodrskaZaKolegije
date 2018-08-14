<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programm extends Model
{
    //
    public $timestamps = false;

    public function courses()
    {
        return $this->belongsToMany(Courses::class, 'course_programm', 'programm_id', 'course_id')->withPivot('year');
    }
}
