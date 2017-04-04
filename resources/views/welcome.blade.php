@extends('layouts.master')

@section('content')
        <div class="container">
            <h1>Welcome to Course Calendar!</h1>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Be sure to log in...</p>
                    <a class="btn btn-primary" href="http://www.sis.uta.fi/~jr415601/laravel/index.php/login">Login</a>
                </div>

                <div class="col-md-4">
                    <h1 style="text-align: center">OR</h1>
                </div>

                <div class="col-md-4">
                    <p>if you haven't already, register!</p>
                    <a class="btn btn-primary" href="http://www.sis.uta.fi/~jr415601/laravel/index.php/login">Register</a>
                </div>
            </div>
        </div>
        @include('layouts.status')
@endsection