<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    public $timestamps = false;

    public static function courses()
    {
        return static::orderBy('name')->get();
    }

    public function programmes()
    {
        return $this->belongsToMany(Programm::class, 'course_programm', 'course_id', 'programm_id')->withPivot('year');
    }

    public function views()
    {
        return $this->hasMany(CourseView::class, 'course_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'course_id');
    }

    public function getOrderedPosts()
    {
        return $this->posts()->orderBy('created_at','desc')->paginate(10);
    }

    public function addView(CourseView $course_view) {
        return $this->views()->save($course_view);
    }

    public function examsTypes() {
        return $this->belongsToMany(ExamType::class, 'course_exams', 'course_id', 'type_id');
    }
}
