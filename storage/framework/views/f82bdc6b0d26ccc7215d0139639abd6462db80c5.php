<?php $__env->startSection('title'); ?>
    Admin area: permission list
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        
        <?php $message = Session::get('message'); ?>
        <?php if( isset($message) ): ?>
        <div class="alert alert-success"><?php echo e($message); ?></div>
        <?php endif; ?>
        
        <?php if($errors && ! $errors->isEmpty() ): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="alert alert-danger"><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title bariol-thin"><i class="fa fa-lock"></i> Permissions</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('laravel-authentication-acl::admin.permission.permission-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
    <script>
        $(".delete").click(function(){
            return confirm("Are you sure to delete this item?");
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('laravel-authentication-acl::admin.layouts.base-2cols', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>