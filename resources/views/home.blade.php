@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Course Calendar</h1>
    <hr>
    <div class="row d-flex justify-content-around">
        <div class="card col-md-5">
            <h3 class="card-header">All courses</h3>
            <div class="card-block">
                <h4 class="card-title">Browse all courses available</h4>
                <p class="card-text">
                    In the "All courses" section you're free to browse all the courses made public.
                    These can be "official" courses made by teachers or simply created by your fellow
                    students to help keep track of your courses.
                </p>
                <a href="http://www.sis.uta.fi/~jr415601/laravel/index.php/all-courses" class="btn btn-primary">All courses</a>
            </div>
        </div>
        <div class="card col-md-5">
            <h3 class="card-header">My courses</h3>
            <div class="card-block">
                <h4 class="card-title">Never lose track of your courses</h4>
                <p class="card-text">
                    "My courses" provides an easy way to keep track of your schedule. Simply pick
                    from the public ones or create entirely your own courses and edit them however you
                    like.
                </p>
                <a href="http://www.sis.uta.fi/~jr415601/laravel/index.php/my-courses" class="btn btn-primary">My courses</a>
            </div>
        </div>
    </div>
    @include('layouts.status')
</div>
@endsection