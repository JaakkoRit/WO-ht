<?php $__env->startSection('content'); ?>
        <div class="container">
            <h1>Welcome to Course Calendar!</h1>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Be sure to log in...</p>
                    <a class="btn btn-primary" href="/login">Login</a>
                </div>

                <div class="col-md-4">
                    <h1 style="text-align: center">OR</h1>
                </div>

                <div class="col-md-4">
                    <p>if you haven't already, register!</p>
                    <a class="btn btn-primary" href="/register">Register</a>
                </div>
            </div>
        </div>
        <?php echo $__env->make('layouts.status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>