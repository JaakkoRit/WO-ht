<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use League\CommonMark\CommonMarkConverter;

class MyCourseController extends Controller
{
    public function index()
    {
        $courses = auth()->user()->courses;
        return view('my-courses.index', compact('courses'));
    }

    public function store()
    {
        $course = Course::find(\request('id'));

        Course::create([
            'user_id' => auth()->id(),
            'name' => $course->name,
            'abbreviation' => $course->abbreviation,
            'teacherName' => $course->teacherName,
            'description' => $course->description,
            'public' => 0
        ]);

        return redirect()->route('my-courses')->with('status', 'Course added!');
    }

    public function show(Course $course)
    {
        return view('my-courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('my-courses.edit', compact('course'));
    }

    public function update(Course $course, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'abbreviation' => 'required',
            'teacherName' => 'required',
            'description' => 'required',
            'public' => 'required'
        ]);

        $converter = new CommonMarkConverter();

        $course->update([
            'name' => \request('name'),
            'abbreviation' => \request('abbreviation'),
            'teacherName' => \request('teacherName'),
            'description' => $converter->convertToHtml(\request('description')),
            'public' => \request('public')
        ]);

        return redirect()->route('my-courses');
    }

}
