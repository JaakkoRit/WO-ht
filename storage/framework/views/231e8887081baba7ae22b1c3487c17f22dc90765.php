<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <?php if(auth()->user()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/all-courses">All courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/my-courses">My courses</a>
                </li>
                <?php if(auth()->user()->roles->pluck('name')->contains('admin')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Administrate users</a>
                    </li>
                <?php endif; ?>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/">Course Calendar</a>
                </li>
            <?php endif; ?>
        </ul>

        <div class="nav-bar nav-bar-right">
            <ul class="navbar-nav mr-auto">
                <?php if(auth()->user()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/edit"><?php echo e(auth()->user()->name); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>