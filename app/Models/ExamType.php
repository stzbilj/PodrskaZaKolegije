<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    //
    public $timestamps = false;

    public static function examTypes()
    {
        return static::all();
    }

    public function courses()
    {
        return $this->belongsToMany(Courses::class, 'course_exams', 'type_id', 'course_id');
    }
}
