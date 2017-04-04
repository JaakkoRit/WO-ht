

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit users</h1>
        <hr>
        <ul class="list-group">
            <?php foreach($users as $user): ?>
                <?php if($user->name != 'admin'): ?>
                    <li class="list-group-item">
                        <a href="admin/<?php echo e($user->id); ?>">
                            <?php echo e($user->name); ?>

                        </a>
                        <hr>
                        <form method="post" action="admin/<?php echo e($user->id); ?>/delete">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">
                                Delete user
                            </button>
                        </form>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <?php echo $__env->make('layouts.status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>