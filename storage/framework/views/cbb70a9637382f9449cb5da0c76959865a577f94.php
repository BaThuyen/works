<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $location_name = $request->get($name) ? $request->get('$name') : @$location->$name ?>
    <?php echo Form::label($name, trans('company::location_admin.'.$name).':'); ?>

    <?php echo Form::text($name, $location_name, ['class' => 'form-control', 'placeholder' => trans('company::location_admin.'.$name).'']); ?>

</div>
<!-- /SAMPLE NAME -->