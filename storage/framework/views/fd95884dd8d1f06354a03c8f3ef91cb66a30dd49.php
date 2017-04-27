<!-- work NAME -->
<div class="form-group">
   <?php $description = empty($work->$name) ? null:$work->$name?>
    <?php echo Form::label($name, trans('work::work_admin.'.$name).':'); ?>

    <?php echo Form::textarea($name, $description, ['class' => 'form-control my-editor', 'id' => $name]); ?>

    
</div>
<!-- /work NAME -->