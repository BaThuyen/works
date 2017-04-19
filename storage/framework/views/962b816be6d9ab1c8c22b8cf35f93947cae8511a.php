<div class="row">
    <div class="col-md-6">
        <h4><i class="fa fa-picture-o"></i> Avatar</h4>
        <div class="profile-avatar">
            <img src="<?php echo $user_profile->presenter()->avatar; ?>">
        </div>
    </div>
    <div class="col-md-6">
        <?php echo Form::open(['route' => 'users.profile.changeavatar', 'method' => 'POST', 'files' => true]); ?>

        <?php echo Form::label('avatar',$user_profile->avatar ? 'Change avatar: ' : 'Upload avatar: '); ?>

        <div class="form-group">
            <?php echo Form::file('avatar', ['class' => 'form-control']); ?>

            <span class="text-danger"><?php echo $errors->first('avatar'); ?></span>
        </div>
        <?php echo Form::hidden('user_id', $user_profile->user_id); ?>

        <?php echo Form::hidden('user_profile_id', $user_profile->id); ?>

        <div class="form-group">
            <?php echo Form::submit('Update avatar', ['class' => 'btn btn-info']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div>
</div>