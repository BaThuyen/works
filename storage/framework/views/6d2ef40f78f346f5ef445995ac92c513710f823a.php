<?php $__env->startSection('title'); ?>
Admin area: edit permission
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        
        <?php if($errors->has('model') ): ?>
        <div class="alert alert-danger"><?php echo e($errors->first('model')); ?></div>
        <?php endif; ?>

        
        <?php $message = Session::get('message'); ?>
        <?php if( isset($message) ): ?>
        <div class="alert alert-success"><?php echo e($message); ?></div>
        <?php endif; ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title bariol-thin"><?php echo isset($permission->id) ? '<i class="fa fa-pencil"></i> Edit' : '<i class="fa fa-lock"></i> Create'; ?> permission</h3>
            </div>
            <div class="panel-body">
                <?php echo Form::model($permission, [ 'url' => [URL::route('permission.edit'), $permission->id], 'method' => 'post'] ); ?>

                <!-- description text field -->
                <div class="form-group">
                    <?php echo Form::label('description','Description: *'); ?>

                    <?php echo Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'permission description', 'id' => 'slugme']); ?>

                </div>
                <span class="text-danger"><?php echo $errors->first('description'); ?></span>
                <!-- permission text field -->
                <div class="form-group">
                    <?php echo Form::label('permission','Permission: *'); ?>

                    <?php echo Form::text('permission', null, ['class' => 'form-control', 'placeholder' => 'permission description', 'id' => 'slug']); ?>

                </div>
                <span class="text-danger"><?php echo $errors->first('permission'); ?></span>
                <?php echo Form::hidden('id'); ?>

                <a href="<?php echo URL::route('permission.delete',['id' => $permission->id, '_token' => csrf_token()]); ?>" class="btn btn-danger pull-right margin-left-5 delete">Delete</a>
                <?php echo Form::submit('Save', array("class"=>"btn btn-info pull-right ")); ?>

                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<?php echo HTML::script('packages/jacopo/laravel-authentication-acl/js/vendor/slugit.js'); ?>

<script>
    $(".delete").click(function(){
        return confirm("Are you sure to delete this item?");
    });
    $(function(){
        $('#slugme').slugIt();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('laravel-authentication-acl::admin.layouts.base-2cols', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>