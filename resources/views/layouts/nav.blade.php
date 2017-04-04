<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            @if(auth()->user())
                <li class="nav-item">
                    <a class="nav-link" href="http://www.sis.uta.fi/~jr415601/laravel/index.php/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.sis.uta.fi/~jr415601/laravel/index.php/all-courses">All courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.sis.uta.fi/~jr415601/laravel/index.php/my-courses">My courses</a>
                </li>
                @if(auth()->user()->roles->pluck('name')->contains('admin'))
                    <li class="nav-item">
                        <a class="nav-link" href="http://www.sis.uta.fi/~jr415601/laravel/index.php/admin">Administrate users</a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" href="http://www.sis.uta.fi/~jr415601/laravel/index.php/">Course Calendar</a>
                </li>
            @endif
        </ul>

        <div class="nav-bar nav-bar-right">
            <ul class="navbar-nav mr-auto">
                @if(auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" href="http://www.sis.uta.fi/~jr415601/laravel/index.php/edit">{{ auth()->user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://www.sis.uta.fi/~jr415601/laravel/index.php/logout">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>