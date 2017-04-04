

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card" style="">
            <div class="card-block">
                <h4 class="card-title"><?php echo e($course->name); ?></h4>
                <p class="card-text"><?php echo e($course->description); ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo e($course->abbreviation); ?></li>
                <li class="list-group-item"><?php echo e($course->teacherName); ?></li>
            </ul>
        </div>
        <hr>

        <!-- Comments section -->
        <h3>Comments</h3>
        <comment-list courseid="<?php echo e((int)$course->id); ?>" userid="<?php echo e(auth()->id()); ?>"
                      :candelete="<?php echo e(var_export(Gate::allows('removal'), true)); ?>"></comment-list>
        <hr>
        <comment-form courseid="<?php echo e((int)$course->id); ?>"></comment-form>
        <?php echo $__env->make('layouts.status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>