
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('site::work_category_admin.search') ?></h3>
    </div>
    <div class="panel-body">

        <?php echo Form::open(['route' => 'admin_work_category','method' => 'get']); ?>


        <!--TITLE-->
		<div class="form-group">
            <?php echo Form::label('category_name',trans('site::work_category_admin.category_name')); ?>

            <?php echo Form::text('category_name', @$params['sample_category_name'], ['class' => 'form-control', 'placeholder' => trans('site::work_category_admin.category_name')]); ?>

        </div>

        <?php echo Form::submit(trans('site::work_category_admin.search').'', ["class" => "btn btn-info pull-right"]); ?>

        <?php echo Form::close(); ?>

    </div>
</div>




