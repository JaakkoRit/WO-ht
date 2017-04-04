

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card" style="">
            <div class="card-block">
                <h4 class="card-title"><?php echo e($course->name); ?></h4>
                <p class="card-text"><?php echo $course->description; ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo e($course->abbreviation); ?></li>
                <li class="list-group-item"><?php echo e($course->teacherName); ?></li>
                <li class="list-group-item">
                    Lecture(s):
                    <ul>
                        <?php foreach($course->lectures as $lecture): ?>
                            <li style="list-style: none">
                                <?php echo e($lecture->day); ?> at <?php echo e($lecture->time); ?>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo e($course->id); ?>/edit" class="btn btn-secondary">
                        Edit your course
                    </a>
                    <hr>
                    <form method="POST" action="/all-courses/delete/<?php echo e($course->id); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete your course</button>
                    </form>
                </li>
            </ul>
        </div>

        <hr>

        <div class="col-md-3">
            <h4>Add a new lecture</h4>
            <form action="<?php echo e(url('/my-courses/lecture/store')); ?>" method="post" id="lecture">

                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <label for="days">Time and day</label>
                    <br>

                    <select id="days" name="day" form="lecture">
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>

                    <input id="time" type="time" name="time" class="form-control">
                    <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>