<?php $__env->startSection('title'); ?>
Admin area: <?php echo e(trans('work::work_admin.page_list')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">

            <div class="panel panel-info">

                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin"><i class="fa fa-group"></i> <?php echo $request->all() ? trans('work::work_admin.page_search') : trans('work::work_admin.page_list'); ?></h3>
                </div>
                
                <!--MESSAGE-->
                <?php $message = Session::get('message'); ?>
                <?php if( isset($message) ): ?>
                <div class="alert alert-success flash-message"><?php echo $message; ?></div>
                <?php endif; ?>
                <!--MESSAGE-->

                <!--ERRORS-->
                <?php if($errors && ! $errors->isEmpty() ): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="alert alert-danger flash-message"><?php echo $error; ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?> 
                <!--ERRORS-->
                <div class="panel-body">
                    <?php echo $__env->make('work::work.admin.work_item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <?php echo $__env->make('work::work.admin.work_search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<script>
    $(".delete").click(function () {
        return confirm("Are you sure to delete this item?");
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('laravel-authentication-acl::admin.layouts.base-2cols', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>