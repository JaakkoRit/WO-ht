@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Edit user</h1>

        <hr>

        <div class="col-md-6">
            <form method="POST" action="http://www.sis.uta.fi/~jr415601/laravel/index.php/admin">

                {{ csrf_field() }}

                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                </div>
                <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                <div class="form-group">
                    <label for="role">Role:</label><br>
                    @if($user->roles->pluck('name')->contains('user'))
                        <input type="radio" class="radio" name="role" value="user" id="role" checked> Regular user
                        <br>
                        <input type="radio" class="radio" name="role" value="moderator" id="role"> Moderator
                    @else
                        <input type="radio" class="radio" name="role" value="user" id="role"> Regular user
                        <br>
                        <input type="radio" class="radio" name="role" value="moderator" id="role" checked> Moderator
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Submit changes
                    </button>
                </div>

                @include('layouts.errors')

            </form>
        </div>
    </div>
@endsection