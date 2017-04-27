<?php $__env->startSection('title'); ?>
Admin area: <?php echo e(trans('site::site_admin.page_category')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-info">

            <div class="panel-heading">
                <h3 class="panel-title bariol-thin"><i class="fa fa-group"></i> <?php echo trans('site::site_admin.site_name_label').$site_name; ?></h3>
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
                <?php echo Form::open(['route'=>['admin_site.categories.post'], 'method' => 'post']); ?>

                <?php echo Form::hidden('site_id',@$site_id); ?>

                <?php echo $__env->make('site::site.admin.site_category_item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::submit('Save', array("class"=>"btn btn-info pull-right ")); ?>

                <?php echo Form::close(); ?>

            </div>
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