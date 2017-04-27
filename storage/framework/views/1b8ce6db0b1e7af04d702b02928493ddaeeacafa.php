
<?php if( ! $locations->isEmpty() ): ?>
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'><?php echo e(trans('company::location_admin.order')); ?></td>
            <th style='width:45%'>Location name</th>
         
            <th style='width:20%'><?php echo e(trans('company::location_admin.operations')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $locations->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td><?php echo $location->location_name; ?></td>
            <td>
                <a href="<?php echo URL::route('admin_location.edit', ['id' => $location->location_id]); ?>"><i class="fa fa-edit fa-2x"></i></a>
                <a href="<?php echo URL::route('admin_location.delete',['id' =>  $location->location_id, '_token' => csrf_token()]); ?>" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>
<?php else: ?>
 <span class="text-warning">
	<h5>
		<?php echo e(trans('company::location_admin.message_find_failed')); ?>

	</h5>
 </span>
<?php endif; ?>
<div class="paginator">
    <?php echo $locations->appends($request->except(['page']) )->render(); ?>

</div>