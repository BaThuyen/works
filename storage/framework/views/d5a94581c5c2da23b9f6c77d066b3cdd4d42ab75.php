<div class="form-group">
    <?php 
        if(!isset($work->work_category)){
            $current_category = 0;
        } else {
            $current_category = $work->work_category;
        }
    ?>
    <?php echo Form::label($name, trans('site::work_admin.'.$name).':'); ?>

    <?php echo Form::select($name, $category_parent, $current_category, ['class' => 'form-control']);; ?>

</div>