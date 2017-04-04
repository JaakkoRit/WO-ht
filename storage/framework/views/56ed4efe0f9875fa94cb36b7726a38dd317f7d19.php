

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit account</h1>

        <hr>

        <div class="col-md-6">
            <form method="POST" action="<?php echo e(url('edit')); ?>">

                <?php echo e(csrf_field()); ?>


                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo e(auth()->user()->name); ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo e(auth()->user()->email); ?>">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Submit changes
                    </button>
                </div>
                <?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </form>

            <hr>

            <?php if(! auth()->user()->roles->pluck('name')->contains('admin')): ?>
                <form method="post" action="/edit/<?php echo e(auth()->id()); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="DELETE">
                    <button type=submit class="btn btn-danger">
                        Delete user
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>