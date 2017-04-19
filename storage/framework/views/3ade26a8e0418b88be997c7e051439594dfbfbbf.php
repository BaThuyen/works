<!-- work NAME -->
<div class="form-group">
    <?php $work_name = $request->get($name) ? $request->get('$name') : @$work->$name ?>
    <?php echo Form::label($name, trans('site::work_admin.'.$name).':'); ?>

    <?php echo Form::text($name, $work_name, ['class' => 'form-control', 'placeholder' => trans('site::work_admin.'.$name).'']); ?>

</div>
<!-- /work NAME -->