@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Edit account</h1>

        <hr>

        <div class="col-md-6">
            <form method="POST" action="http://www.sis.uta.fi/~jr415601/laravel/index.php/edit">

                {{ csrf_field() }}

                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Submit changes
                    </button>
                </div>
                @include('layouts.errors')
            </form>

            <hr>

            @if(! auth()->user()->roles->pluck('name')->contains('admin'))
                <form method="post" action="http://www.sis.uta.fi/~jr415601/laravel/index.php/edit/{{auth()->id()}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type=submit class="btn btn-danger">
                        Delete user
                    </button>
                </form>
            @endif
        </div>
    </div>
@endsection