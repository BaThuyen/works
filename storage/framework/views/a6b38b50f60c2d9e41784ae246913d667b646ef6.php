<?php if( ! $sites_categories->isEmpty() ): ?>
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'><?php echo e(trans('site::site_admin.order')); ?></td>
            <th style='width:45%'>Category name</th>
            <th style='width:45%'>Map category</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nav = $sites_categories->toArray();

        $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        <?php $__currentLoopData = $sites_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site_category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td>
                <?php echo $counter;
                $counter++ ?>
            </td>
            <td><?php echo $site_category->site_category_name; ?></td>
            <td>
                <!--<div class="form-group">
                    <select id="map_categories" name="map_categories[]" class="form-control" multiple></select>
                </div>-->
                <?php echo $__env->make('site::site.elements.select2', ['id' => $site_category->site_category_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
    <?php echo $sites_categories->appends($request->except(['page']) )->render(); ?>

</div>