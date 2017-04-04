

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>My courses</h1>
        <hr>
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Instructions</h4>
                <p class="card-text">
                    Here are all your courses BOTH private and public. Editing any of the public ones
                    means that everyone can see the changes you made. "My course" section utilizes the
                    Markdown text format which allows you to stylize your course descriptions.
                    <br>
                    NOTE: Stylized descriptions will show incorrectly on the "All courses" section due
                    to privacy concerns.
                </p>
            </div>
        </div>
        <hr>
        <ul class="list-group">
            <?php foreach($courses as $course): ?>
                <li class="list-group-item">
                    <a href="/my-courses/<?php echo e($course->id); ?>"><?php echo e($course->abbreviation); ?>

                        - <?php echo e($course->name); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <hr>
        <a class="btn btn-primary" href="all-courses/create">Create a new course</a>
        <?php echo $__env->make('layouts.status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>