<?php $__env->startSection('container'); ?>
    <div class="row-fluid">
        <div class="col-sm-3 col-md-2 col-xs-12 sidebar">
            <?php echo $__env->make('laravel-authentication-acl::admin.layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 col-xs-12 main">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('laravel-authentication-acl::admin.layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>