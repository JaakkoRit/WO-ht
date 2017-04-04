

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Create a new course</h1>

        <hr>

        <form action="<?php echo e(url('/all-courses')); ?>" method="post">

            <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <label for="name">Course name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter course name">
            </div>
            <div class="form-group">
                <label for="abbreviation">Abbreviation</label>
                <input type="text" name="abbreviation" class="form-control" id="abbreviation" placeholder="Enter course abbreviation (for example ABC10)">
            </div>
            <div class="form-group">
                <label for="Teacher's name">Teacher's name</label>
                <input type="text" name="teacherName" class="form-control" id="Teacher's name" placeholder="Enter teacher's name">
            </div>
            <div class="form-group">
                <label for="description">Course description</label>
                <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter your course description"></textarea>
            </div>
            <div class="form-group">
                <input type="radio" class="radio" name="public" value="1" id="public" checked> Public
                <br>
                <input type="radio" class="radio" name="public" value="0" id="public"> Private
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>