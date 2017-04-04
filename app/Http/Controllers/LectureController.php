<?php

namespace App\Http\Controllers;

use App\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'day' => 'required',
            'time' => 'required'
        ]);

        Lecture::create([
            'course_id' => request('course_id'),
            'day' => request('day'),
            'time' => request('time'),
        ]);

        return back();
    }
}
