

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit user</h1>

        <hr>

        <div class="col-md-6">
            <form method="POST" action="<?php echo e(url('admin')); ?>">

                <?php echo e(csrf_field()); ?>


                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo e($user->name); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo e($user->email); ?>">
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo e($user->id); ?>">
                <div class="form-group">
                    <label for="role">Role:</label><br>
                    <?php if($user->roles->pluck('name')->contains('user')): ?>
                        <input type="radio" class="radio" name="role" value="user" id="role" checked> Regular user
                        <br>
                        <input type="radio" class="radio" name="role" value="moderator" id="role"> Moderator
                    <?php else: ?>
                        <input type="radio" class="radio" name="role" value="user" id="role"> Regular user
                        <br>
                        <input type="radio" class="radio" name="role" value="moderator" id="role" checked> Moderator
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Submit changes
                    </button>
                </div>

                <?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>