<?php $__env->startSection('title'); ?>
Admin area: <?php echo e(trans('site::work_admin.page_edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        <?php echo !empty($work->work_id) ? '<i class="fa fa-pencil"></i>'.trans('site::work_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('site::work_admin.form_add'); ?>

                    </h3>
                </div>

                
                <?php if($errors->has('work_name') ): ?>
                <div class="alert alert-danger"><?php echo $errors->first('work_name'); ?></div>
                <?php endif; ?>

                <?php if($errors->has('name_unvalid_length') ): ?>
                <div class="alert alert-danger"><?php echo $errors->first('name_unvalid_length'); ?></div>
                <?php endif; ?>

                
                <?php $message = Session::get('message'); ?>
                <?php if( isset($message) ): ?>
                <div class="alert alert-success"><?php echo e($message); ?></div>
                <?php endif; ?>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h4><?php echo trans('site::work_admin.form_heading'); ?></h4>
                            <?php echo Form::open(['route'=>['admin_work.post', 'id' => @$work->work_id],  'files'=>true, 'method' => 'post']); ?>




                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#home">
                                        <?php echo trans('site::work_admin.tab_overview'); ?>

                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#menu1">
                                        <?php echo trans('site::work_admin.tab_attributes'); ?>

                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <!--TEMPLATE OVERVIEW-->
                                <div id="home" class="tab-pane fade in active">
                                    <!-- work NAME TEXT-->
                                    <?php echo $__env->make('site::work.elements.text', ['name' => 'work_name'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php echo $__env->make('site::work.elements.select', ['name' => 'work_category'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php echo $__env->make('site::work.elements.text', ['name' => 'work_description'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php echo $__env->make('site::work.elements.text', ['name' => 'work_salary'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <!-- /END work NAME TEXT -->
                                </div>

                                <!--TEMPLATE ATTRIBUTES-->
                                <div id="menu1" class="tab-pane fade">
                                    <!-- work CATEGORIES TEXT-->
                                    <!-- /END work CATEGORIES TEXT-->
                                </div>

                            </div>





                            <?php echo Form::hidden('id',@$work->work_id); ?>


                            <!-- DELETE BUTTON -->
                            <a href="<?php echo URL::route('admin_work.delete',['id' => @$work->work_id, '_token' => csrf_token()]); ?>"
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
            <?php echo $__env->make('site::work.admin.work_search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('laravel-authentication-acl::admin.layouts.base-2cols', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>