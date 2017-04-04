@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Edit users</h1>
        <hr>
        <ul class="list-group">
            @foreach($users as $user)
                @if($user->name != 'admin')
                    <li class="list-group-item">
                        <a href="http://www.sis.uta.fi/~jr415601/laravel/index.php/admin/{{$user->id}}">
                            {{ $user->name }}
                        </a>
                        <hr>
                        <form method="post" action="http://www.sis.uta.fi/~jr415601/laravel/index.php/admin/{{$user->id}}/delete">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">
                                Delete user
                            </button>
                        </form>
                    </li>
                @endif
            @endforeach
        </ul>
        @include('layouts.status')
    </div>
@endsection