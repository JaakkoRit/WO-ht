

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit your course</h1>

        <hr>

        <form action="<?php echo e(url("/my-courses/update/$course->id")); ?>" method="POST">

            <?php echo e(csrf_field()); ?>


            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label for="name">Course name</label>
                <input type="text" name="name" class="form-control" id="name" value="<?php echo e($course->name); ?>">
            </div>
            <div class="form-group">
                <label for="abbreviation">Abbreviation</label>
                <input type="text" name="abbreviation" class="form-control" id="abbreviation" value="<?php echo e($course->abbreviation); ?>">
            </div>
            <div class="form-group">
                <label for="Teacher's name">Teacher's name</label>
                <input type="text" name="teacherName" class="form-control" id="Teacher's name" value="<?php echo e($course->teacherName); ?>">
            </div>
            <div class="form-group">
                <label for="description">Course description</label>
                <textarea class="form-control" name="description" id="description" rows="5"><?php echo e($course->description); ?></textarea>
            </div>
            <div class="form-group">
                <?php if($course->public === 1): ?>
                    <input type="radio" class="radio" name="public" value="1" id="public" checked> Public
                    <br>
                    <input type="radio" class="radio" name="public" value="0" id="public"> Private
                <?php else: ?>
                    <input type="radio" class="radio" name="public" value="1" id="public"> Public
                    <br>
                    <input type="radio" class="radio" name="public" value="0" id="public" checked> Private
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>