@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Edit your course</h1>

        <hr>

        <form action="http://www.sis.uta.fi/~jr415601/laravel/index.php/my-courses/update/{{$course->id}}" method="POST">

            {{ csrf_field() }}

            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label for="name">Course name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $course->name }}">
            </div>
            <div class="form-group">
                <label for="abbreviation">Abbreviation</label>
                <input type="text" name="abbreviation" class="form-control" id="abbreviation" value="{{ $course->abbreviation }}">
            </div>
            <div class="form-group">
                <label for="Teacher's name">Teacher's name</label>
                <input type="text" name="teacherName" class="form-control" id="Teacher's name" value="{{ $course->teacherName }}">
            </div>
            <div class="form-group">
                <label for="description">Course description</label>
                <textarea class="form-control" name="description" id="description" rows="5">{{ $course->description }}</textarea>
            </div>
            <div class="form-group">
                @if($course->public === 1)
                    <input type="radio" class="radio" name="public" value="1" id="public" checked> Public
                    <br>
                    <input type="radio" class="radio" name="public" value="0" id="public"> Private
                @else
                    <input type="radio" class="radio" name="public" value="1" id="public"> Public
                    <br>
                    <input type="radio" class="radio" name="public" value="0" id="public" checked> Private
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection