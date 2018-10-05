<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //
    protected $fillable = [ 
        'course_id', 'link_text', 'additional', 'path'
    ];
}
