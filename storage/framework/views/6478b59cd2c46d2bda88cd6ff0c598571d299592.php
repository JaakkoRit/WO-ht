

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>All courses</h1>
        <hr>
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Instructions</h4>
                <p class="card-text">
                    Here are all the courses made public. You can add any of the to your "My course"
                    section by clicking "Add to your courses." This copies the course to your own
                    private collection where you are free to customize it. You can also make your
                    courses public for everyone else to see and comment on.
                </p>
                <p class="card-text">
                    By clicking the "Create a new course" button at the bottom allows you to create a
                    completely new course.
                    <br>
                    NOTE: Creating a new course automatically adds it to your private course collection.
                </p>
            </div>
        </div>
        <hr>
        <div class="row justify-content-between">
            <?php foreach($courses as $course): ?>
                <div class="card" style="width: 30%; margin-bottom: 3%">
                    <div class="card-block">
                        <h4 class="card-title">
                            <a href="<?php echo e(url("/all-courses/$course->id")); ?>">
                                <?php echo e($course->name); ?>

                            </a>
                        </h4>
                        <p class="card-text"><?php echo e($course->description); ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo e($course->abbreviation); ?></li>
                        <li class="list-group-item"><?php echo e($course->teacherName); ?></li>
                    </ul>
                    <div class="card-block btn-group-justified">
                        <form method="post" action="<?php echo e(url('/my-courses')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($course->id); ?>">
                            <button class="btn btn-secondary" type="submit">Add to your courses</button>
                        </form>
                        <br>
                        <?php if(Gate::allows('removal')): ?>
                            <form method="post" action="/all-courses/delete/<?php echo e($course->id); ?>">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete the course</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php foreach($emptySlots as $slot): ?>
                <div class="card" style="width: 30%; margin-bottom: 3%">
                    <div class="card-block">
                        <h4 class="card-title">
                        </h4>
                        <p class="card-text"></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> -</li>
                        <li class="list-group-item"> -</li>
                    </ul>
                    <div class="card-block btn-group-justified">
                        <form>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <hr>
        <a class="btn btn-primary" href="/all-courses/create">Create a new course</a>
        <?php echo $__env->make('layouts.status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>