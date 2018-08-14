<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Courses;

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

    public function isProfessor()
    {        
        return $this->role === 0;
    }

    public function isAdmin( $course_id )
    {
        return in_array( $course_id, $this->coursesAdmin->pluck('id')->toArray());
    }

    public function info()
    {
        return $this->hasOne('App\Models\StudentsInfo');
    }

    public function coursesAdmin()
    {
        return $this->belongsToMany(Programm::class, 'admin_course', 'user_id', 'course_id');
    }
}
