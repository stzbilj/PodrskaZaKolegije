<?php

namespace App\Models;

use App\Models\Courses;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isStudent()
    {        
        return $this->role === 1;
    }

    public function isProfessor()
    {        
        return $this->role === 0;
    }

    public function isAdmin( $course )
    {
        if( $course instanceof Courses) {
            return in_array( $course->id, $this->coursesAdmin->pluck('id')->toArray());
        }
        return in_array( $course, $this->coursesAdmin->pluck('id')->toArray());
    }

    public static function getAllProfessors()
    {
        return self::where('role', 0)->orderBy('surname')->get();
    }

    public function info()
    {
        return $this->hasOne(StudentsInfo::class);
    }

    public function coursesAdmin()
    {
        return $this->belongsToMany(Courses::class, 'admin_course', 'user_id', 'course_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function publish(Post $post)
    {
        return $this->posts()->save($post);
    }

    public function results()
    {
        return $this->info->results();
    }
}
