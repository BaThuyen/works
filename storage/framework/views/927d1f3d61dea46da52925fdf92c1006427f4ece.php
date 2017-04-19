
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('work::work_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        <?php echo Form::open(['route' => 'admin_work','method' => 'get']); ?>


        <!--TITLE-->
        <div class="form-group">
            <?php echo Form::label('work_name', trans('work::work_admin.work_name_label')); ?>

            <?php echo Form::text('work_name', @$params['work_name'], ['class' => 'form-control', 'placeholder' => trans('work::work_admin.work_name_placeholder')]); ?>

        </div>
        <!--/END TITLE-->

        <?php echo Form::submit(trans('work::work_admin.search').'', ["class" => "btn btn-info pull-right"]); ?>

        <?php echo Form::close(); ?>

    </div>
</div>


