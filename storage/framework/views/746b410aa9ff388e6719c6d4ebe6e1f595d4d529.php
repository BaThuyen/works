<?php $__env->startSection('title'); ?>
Admin area: Edit user profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        
        <?php $message = Session::get('message'); ?>
        <?php if( isset($message) ): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>
        <?php if( $errors->has('model') ): ?>
        <div class="alert alert-danger"><?php echo $errors->first('model'); ?></div>
        <?php endif; ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="panel-title bariol-thin"><i class="fa fa-user"></i> User profile</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo URL::route('users.edit',['id' => $user_profile->user_id]); ?>" class="btn btn-info pull-right"><i class="fa fa-pencil-square-o"></i> Edit user</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php if(! $use_gravatar): ?>
                            <?php echo $__env->make('laravel-authentication-acl::admin.user.partials.avatar_upload', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('laravel-authentication-acl::admin.user.partials.show_gravatar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>
                        <h4><i class="fa fa-cubes"></i> User data</h4>
                        <?php echo Form::model($user_profile,['route'=>'users.profile.edit', 'method' => 'post']); ?>

                        <!-- code text field -->
                        <div class="form-group">
                            <?php echo Form::label('code','User code:'); ?>

                            <?php echo Form::text('code', null, ['class' => 'form-control', 'placeholder' => '']); ?>

                        </div>
                        <span class="text-danger"><?php echo $errors->first('code'); ?></span>
                        <!-- first_name text field -->
                        <div class="form-group">
                            <?php echo Form::label('first_name','First name:'); ?>

                            <?php echo Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => '']); ?>

                        </div>
                        <span class="text-danger"><?php echo $errors->first('first_name'); ?></span>
                        <!-- last_name text field -->
                        <div class="form-group">
                            <?php echo Form::label('last_name','Last name: '); ?>

                            <?php echo Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => '']); ?>

                        </div>
                        <span class="text-danger"><?php echo $errors->first('last_name'); ?></span>
                        <!-- phone text field -->
                        <div class="form-group">
                            <?php echo Form::label('phone','Phone: '); ?>

                            <?php echo Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '']); ?>

                        </div>
                        <span class="text-danger"><?php echo $errors->first('phone'); ?></span>
                        <!-- state text field -->
                        <div class="form-group">
                            <?php echo Form::label('state','State: '); ?>

                            <?php echo Form::text('state', null, ['class' => 'form-control', 'placeholder' => '']); ?>

                        </div>
                        <span class="text-danger"><?php echo $errors->first('state'); ?></span>
                        <!-- var text field -->
                        <div class="form-group">
                            <?php echo Form::label('var','Vat: '); ?>

                            <?php echo Form::text('var', null, ['class' => 'form-control', 'placeholder' => '']); ?>

                        </div>
                        <span class="text-danger"><?php echo $errors->first('vat'); ?></span>
                        <!-- city text field -->
                        <div class="form-group">
                            <?php echo Form::label('city','City: '); ?>

                            <?php echo Form::text('city', null, ['class' => 'form-control', 'placeholder' => '']); ?>

                        </div>
                        <span class="text-danger"><?php echo $errors->first('city'); ?></span>
                        <!-- country text field -->
                        <div class="form-group">
                            <?php echo Form::label('country','Country: '); ?>

                            <?php echo Form::text('country', null, ['class' => 'form-control', 'placeholder' => '']); ?>

                        </div>
                        <span class="text-danger"><?php echo $errors->first('country'); ?></span>
                        <!-- zip text field -->
                        <div class="form-group">
                            <?php echo Form::label('zip','Zip: '); ?>

                            <?php echo Form::text('zip', null, ['class' => 'form-control', 'placeholder' => '']); ?>

                        </div>
                        <span class="text-danger"><?php echo $errors->first('zip'); ?></span>
                        <!-- address text field -->
                        <div class="form-group">
                            <?php echo Form::label('address','Address: '); ?>

                            <?php echo Form::text('address', null, ['class' => 'form-control', 'placeholder' => '']); ?>

                        </div>
                        <span class="text-danger"><?php echo $errors->first('address'); ?></span>
                        
                        <?php $__currentLoopData = $custom_profile->getAllTypesWithValues(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile_data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="form-group">
                            <?php echo Form::label($profile_data->description); ?>

                            <?php echo Form::text("custom_profile_{$profile_data->id}", $profile_data->value, ["class" => "form-control"]); ?>

                            
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        <?php echo Form::hidden('user_id', $user_profile->user_id); ?>

                        <?php echo Form::hidden('id', $user_profile->id); ?>

                        <?php echo Form::submit('Save',['class' =>'btn btn-info pull-right margin-bottom-30']); ?>

                        <?php echo Form::close(); ?>

                    </div>
                    <div class="col-md-6 col-xs-12">
                        <?php if($can_add_fields): ?>
                        <?php echo $__env->make('laravel-authentication-acl::admin.user.custom-profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('laravel-authentication-acl::admin.layouts.base-2cols', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>