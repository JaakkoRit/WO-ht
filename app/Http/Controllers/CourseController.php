<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all()->where('public', 1);

        $emptySlots = Course::getEmptySlotsOnARow(count($courses));

        return view('course.index', compact('courses', 'emptySlots'));
    }

    public function create()
    {
        return view('course.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'abbreviation' => 'required',
            'teacherName' => 'required',
            'description' => 'required',
            'public' => 'required'
        ]);

        Course::create([
            'user_id' => auth()->id(),
            'name' => request('name'),
            'abbreviation' => request('abbreviation'),
            'teacherName' => request('teacherName'),
            'description' => request('description'),
            'public' => request('public')
        ]);

        return redirect()->route('all-courses');
    }

    public function show(Course $course)
    {
        return view('course.show', compact('course'));
    }

    public function delete(Course $course)
    {
        Course::destroy($course->id);
        $message = 'Course deleted';

        return redirect('all-courses')->with('status', $message);
    }
}
