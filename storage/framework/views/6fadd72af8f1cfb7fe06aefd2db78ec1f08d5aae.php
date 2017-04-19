<?php $__env->startSection('title'); ?>
Admin area: <?php echo e(trans('company::location_admin.page_edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        <?php echo !empty($location->location_id) ? '<i class="fa fa-pencil"></i>'.trans('company::location_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('company::location_admin.form_add'); ?>

                    </h3>
                </div>
                
                <?php if($errors->has('location_name') ): ?>
                <div class="alert alert-danger"><?php echo $errors->first('location_name'); ?></div>
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
                            <h4><?php echo trans('company::location_admin.form_heading'); ?></h4>
                            <?php echo Form::open(['route'=>['admin_location.post', 'id' => @$location->location_id],  'files'=>true, 'method' => 'post']); ?>




                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#home">
                                        <?php echo trans('company::location_admin.tab_overview'); ?>

                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#menu1">
                                        <?php echo trans('company::location_admin.tab_attributes'); ?>

                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <!--TEMPLATE OVERVIEW-->
                                <div id="home" class="tab-pane fade in active">
                                    <!-- SAMPLE NAME TEXT-->
                                    <!-- LOCATION NAME TEXT-->
                                    <?php echo $__env->make('company::location.elements.text', ['name' => 'location_name'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <!-- /END LOCATION NAME TEXT -->
                                    <!-- /END SAMPLE NAME TEXT -->
                                </div>

                                <!--TEMPLATE ATTRIBUTES-->
                                <div id="menu1" class="tab-pane fade">
                                    <!-- SAMPLE CATEGORIES TEXT-->
									<!-- ATTRIBUTES TEXT-->
                                    <?php echo $__env->make('company::location.elements.text', ['name' => 'attributes'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<!-- /END ATTRIBUTES TEXT-->
                                    <!-- /END SAMPLE CATEGORIES TEXT-->
                                </div>

                            </div>





                            <?php echo Form::hidden('id',@$location->location_id); ?>


                            <!-- DELETE BUTTON -->
                            <a href="<?php echo URL::route('admin_location.delete',['id' => @$location->location_id, '_token' => csrf_token()]); ?>"
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
            <?php echo $__env->make('company::location.admin.location_search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('laravel-authentication-acl::admin.layouts.base-2cols', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>