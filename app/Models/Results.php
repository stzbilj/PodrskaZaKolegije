<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    //
    private $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function info()
    {
        return $this->belongsTo(ResultsInfo::class, 'info_id');
    }
}
