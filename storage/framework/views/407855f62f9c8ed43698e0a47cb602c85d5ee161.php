<h4><i class="fa fa-magic"></i> Custom fields:</h4>


<?php echo Form::open(["route" => 'users.profile.addfield', 'class' => 'form-add-profile-field', 'role' => 'form']); ?>

<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon form-button button-add-profile-field"><span class="glyphicon glyphicon-plus-sign add-input"></span></span>
        <?php echo Form::text('description','',['class' =>'form-control','placeholder' => 'Custom field name']); ?>

        <?php echo Form::hidden('user_id',$user_profile->user_id); ?>

    </div>
</div>
<?php echo Form::close(); ?>



<?php $__currentLoopData = $custom_profile->getAllTypesWithValues(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile_data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<?php echo Form::open(["route" => 'users.profile.deletefield', 'name' => $profile_data->id, 'role' => 'form']); ?>

<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon form-button button-del-profile-field" name="<?php echo $profile_data->id; ?>"><span
                    class="glyphicon glyphicon-minus-sign add-input"></span></span>
        <?php echo Form::text('profile_description', $profile_data->description, ['class' => 'form-control', 'readonly' => 'readonly']); ?>

        <?php echo Form::hidden('id', $profile_data->id); ?>

        <?php echo Form::hidden('user_id',$user_profile->user_id); ?>

    </div>
</div>
<?php echo Form::close(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

<?php $__env->startSection('footer_scripts'); ?>
@parent
<script>
    $(".button-add-profile-field").click(function () {
        $('.form-add-profile-field').submit();
    });
    $(".button-del-profile-field").click(function () {
        if (!confirm('Are you sure to delete this field?')) return;

        // submit the form with the same name
        name = $(this).attr('name');
        $('form[name=' + name + ']').submit();
    });
</script>
<?php $__env->stopSection(); ?>