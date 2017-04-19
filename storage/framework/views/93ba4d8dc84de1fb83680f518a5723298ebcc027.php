
<?php if( ! $sites->isEmpty() ): ?>
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'><?php echo e(trans('site::site_admin.order')); ?></td>
            <th style='width:20%'></th>
            <th style='width:45%'><?php echo e(trans('site::site_admin.site_name')); ?></th>
            <th style='width:45%'><?php echo e(trans('site::site_admin.site_url')); ?></th>
            <th style='width:20%'><?php echo e(trans('site::site_admin.operations')); ?></th>
            <th style='width:20%'><?php echo e(trans('site::site_admin.site_categories')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $sites->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        <?php $__currentLoopData = $sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td><img src="<?php echo e($site->site_image); ?>" width="150"></td>
            <td><?php echo $site->site_name; ?></td>
            <td><a href="<?php echo $site->site_url; ?>"><?php echo $site->site_url; ?></a></td>
            <td>
                <a href="<?php echo URL::route('admin_site.edit', ['id' => $site->site_id]); ?>"><i class="fa fa-edit fa-2x"></i></a>
                <a href="<?php echo URL::route('admin_site.delete',['id' =>  $site->site_id, '_token' => csrf_token()]); ?>" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
            <td>
                <a href="<?php echo URL::route('admin_site.categories', ['site_id' => $site->site_id]); ?>"><i class="fa fa-tags fa-2x"></i></a>
                
                <span class="clearfix"></span>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>
<?php else: ?>
 <span class="text-warning">
	<h5>
		<?php echo e(trans('site::site_admin.message_find_failed')); ?>

	</h5>
 </span>
<?php endif; ?>
<div class="paginator">
    <?php echo $sites->appends($request->except(['page']) )->render(); ?>

</div>