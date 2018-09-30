<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultsInfo extends Model
{
    //
    public function results()
    {
        return $this->hasMany(Results::class, 'info_id');
    }
}
