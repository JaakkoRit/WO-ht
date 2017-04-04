@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>My courses</h1>
        <hr>
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Instructions</h4>
                <p class="card-text">
                    Here are all your courses BOTH private and public. Editing any of the public ones
                    means that everyone can see the changes you made. "My course" section utilizes the
                    Markdown text format which allows you to stylize your course descriptions.
                    <br>
                    NOTE: Stylized descriptions will show incorrectly on the "All courses" section due
                    to privacy concerns.
                </p>
            </div>
        </div>
        <hr>
        <ul class="list-group">
            @foreach($courses as $course)
                <li class="list-group-item">
                    <a href="http://www.sis.uta.fi/~jr415601/laravel/index.php/my-courses/{{$course->id}}">{{ $course->abbreviation }}
                        - {{ $course->name }}</a>
                </li>
            @endforeach
        </ul>
        <hr>
        <a class="btn btn-primary" href="http://www.sis.uta.fi/~jr415601/laravel/index.php/all-courses/create">Create a new course</a>
        @include('layouts.status')
    </div>
@endsection