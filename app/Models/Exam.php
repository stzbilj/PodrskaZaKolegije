<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function type()
    {
        return $this->belongsTo(ExamType::class, 'type_id');
    }
}
