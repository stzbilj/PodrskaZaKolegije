<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [ 
        'user_id', 'data'
    ];
    
    public function user()
    {
        return $this->belongsTo(StudentsInfo::class, 'user_id', 'JMBAG');
    }

    public function info()
    {
        return $this->belongsTo(ResultsInfo::class, 'info_id');
    }

    public static function deleteByInfo(int $id )
    {
        return self::where('info_id', $id)->delete();
    }

    public static function getResultsForUserByCourse(User $user, Courses $course)
    {
        return self::join('results_infos', 'results_infos.id', '=', 'results.info_id')
            ->where('results_infos.course_id', $course->id)
            ->whereHas('user', function ($query) use ($user) {
                $query->where('JMBAG', $user->info->JMBAG);
            })->orderBy('results_infos.created_at','desc')->get();
    }

    public static function getResultsForUser(User $user)
    {
        return self::join('results_infos', 'results_infos.id', '=', 'results.info_id')
            ->whereHas('user', function ($query) use ($user) {
                $query->where('JMBAG', $user->info->JMBAG);
            })->orderBy('results_infos.created_at','desc')->paginate(10);
    }
}
