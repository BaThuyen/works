<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $category_name = $request->get($name) ? $request->get($name) : @$category->$name ?>
    <?php echo Form::label($name, trans('site::work_category_admin.'.$name).':'); ?>

    <?php echo Form::text($name, $category_name, ['class' => 'form-control', 'placeholder' => trans('site::work_category_admin.'.$name).'']); ?>

</div>
<!-- /SAMPLE NAME -->