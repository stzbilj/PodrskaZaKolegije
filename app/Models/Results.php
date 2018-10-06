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
        return $this->belongsTo(StudentsInfo::class, 'JMBAG','user_id');
    }

    public function info()
    {
        return $this->belongsTo(ResultsInfo::class, 'info_id');
    }
}
