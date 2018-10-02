<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    protected $fillable = [
        'course_id', 'type_id', 'path', 'year'
    ];
    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function type()
    {
        return $this->belongsTo(ExamType::class, 'type_id');
    }
}
