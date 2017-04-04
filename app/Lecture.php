<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = [
        'course_id', 'day', 'time'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
