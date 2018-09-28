<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseView extends Model
{
    //
    protected $fillable = [
        'view', 'type'
    ];

    public static function getByCourseAndType($course_id, $type) {
        return static::where(['course_id' => $course_id, 'type' => $type])->first();
    }
}
