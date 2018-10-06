<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultsInfo extends Model
{
    //
    protected $fillable = [ 
        'course_id', 'type_id', 'header', 'comment'
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function examType()
    {
        return $this->belongsTo(ExamType::class, 'type_id');
    }
    
    public function results()
    {
        return $this->hasMany(Results::class, 'info_id');
    }

    public function saveResults($csv_data)
    {
        $data = [];
        foreach ($csv_data as $row) {
            $row_data = [];
            foreach ($row as $key => $value) {
                if(strtoupper($key) === 'JMBAG') {
                    $r_data = $row;
                    unset($r_data[$key]);
                    $row_data = [
                        'user_id' => $value,
                        'data' => json_encode($r_data)
                    ];
                    break;
                }
            }
            array_push($data, $row_data);
        }
        return $this->results()->createMany($data);
    }
}
