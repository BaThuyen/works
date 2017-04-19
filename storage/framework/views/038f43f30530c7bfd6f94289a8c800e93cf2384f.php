<?php $__env->startSection('title'); ?>
Admin area: <?php echo e(trans('site:work_category_admin.page_edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        <?php echo !empty($category->category_id) ? '<i class="fa fa-pencil"></i>'.trans('site:work_category_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('site:work_category_admin.form_add'); ?>

                    </h3>
                </div>
                <!-- ERRORS NAME  -->
                
                <?php if($errors->has('category_name') ): ?>
                    <div class="alert alert-danger"><?php echo $errors->first('category_name'); ?></div>
                <?php endif; ?>
                <!-- /END ERROR NAME -->
                
                <!-- LENGTH NAME  -->
                <?php if($errors->has('name_unvalid_length') ): ?>
                <div class="alert alert-danger"><?php echo $errors->first('name_unvalid_length'); ?></div>
                <?php endif; ?>
                <!-- /END LENGTH NAME -->

                
                <?php $message = Session::get('message'); ?>
                <?php if( isset($message) ): ?>
                <div class="alert alert-success"><?php echo e($message); ?></div>
                <?php endif; ?>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <!-- SAMPLE CATEGORIES ID -->
                            <h4><?php echo trans('site::site_admin.form_heading'); ?></h4>
                            <?php echo Form::open(['route'=>['admin_work_category.post', 'id' => @$category->category_id],  'files'=>true, 'method' => 'post']); ?>


                            <!--END SAMPLE CATEGORIES ID  -->

                            <!-- SAMPLE NAME TEXT-->
                            <?php echo $__env->make('site::work_category.elements.text', ['name' => 'category_name'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('site::work_category.elements.select', ['name' => 'category_parent'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('site::work_category.elements.text', ['name' => 'category_description'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <!-- /END SAMPLE NAME TEXT -->
                            
                            <?php echo Form::hidden('id',@$category->category_id); ?>


                            <!-- DELETE BUTTON -->
                            <a href="<?php echo URL::route('admin_work_category.delete',['id' => @$category->id, '_token' => csrf_token()]); ?>"
                               class="btn btn-danger pull-right margin-left-5 delete">
                                Delete
                            </a>
                            <!-- DELETE BUTTON -->

                            <!-- SAVE BUTTON -->
                            <?php echo Form::submit('Save', array("class"=>"btn btn-info pull-right ")); ?>

                            <!-- /SAVE BUTTON -->

                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='col-md-4'>
            <?php echo $__env->make('site::work_category.admin.work_category_search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('laravel-authentication-acl::admin.layouts.base-2cols', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>