@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card" style="">
            <div class="card-block">
                <h4 class="card-title">{{ $course->name }}</h4>
                <p class="card-text">{!! $course->description  !!}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $course->abbreviation }}</li>
                <li class="list-group-item">{{ $course->teacherName }}</li>
                <li class="list-group-item">
                    Lecture(s):
                    <ul>
                        @foreach($course->lectures as $lecture)
                            <li style="list-style: none">
                                {{ $lecture->day }} at {{ $lecture->time }}
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="list-group-item">
                    <a href="http://www.sis.uta.fi/~jr415601/laravel/index.php/my-courses/{{$course->id}}/edit" class="btn btn-secondary">
                        Edit your course
                    </a>
                    <hr>
                    <form method="POST" action="http://www.sis.uta.fi/~jr415601/laravel/index.php/all-courses/delete/{{$course->id}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete your course</button>
                    </form>
                </li>
            </ul>
        </div>

        <hr>

        <div class="col-md-3">
            <h4>Add a new lecture</h4>
            <form action="http://www.sis.uta.fi/~jr415601/laravel/index.php/my-courses/lecture/store" method="post" id="lecture">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="days">Time and day</label>
                    <br>

                    <select id="days" name="day" form="lecture">
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>

                    <input id="time" type="time" name="time" class="form-control">
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection