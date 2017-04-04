@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card" style="">
            <div class="card-block">
                <h4 class="card-title">{{ $course->name }}</h4>
                <p class="card-text">{{ $course->description  }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $course->abbreviation }}</li>
                <li class="list-group-item">{{ $course->teacherName }}</li>
            </ul>
        </div>
        <hr>

        <!-- Comments section -->
        <h3>Comments</h3>
        <comment-list courseid="{{(int)$course->id}}" userid="{{auth()->id()}}"
                      :candelete="{{var_export(Gate::allows('removal'), true)}}"></comment-list>
        <hr>
        <comment-form courseid="{{(int)$course->id}}"></comment-form>
        @include('layouts.status')
    </div>
@endsection