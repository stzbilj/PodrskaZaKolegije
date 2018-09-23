<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentsInfo extends Model
{

    protected $fillable = [
        'user_id', 'JMBAG'
    ];

    public $timestamps = false;
    
    //

    public function student()
    {
        return $this->belongsTo( User::class, 'user_id', 'id');
    }
}
