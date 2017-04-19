<div class="row margin-bottom-12">
    <div class="col-md-12">
        <a href="<?php echo URL::route('admin_work_category.edit'); ?>" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i><?php echo e(trans('work::work_category_admin.work_category_add_button')); ?>

        </a>
    </div>
</div>

<ul class="tree">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <li>
        <p><?php echo e($category->category_name); ?>

            <?php if(count($category->childs)): ?>
            <span>
                <a href="<?php echo URL::route('admin_work_category.edit', ['id' => $category->category_id]); ?>">
                    <i class="fa fa-pencil"></i>
                </a>
            </span>
            </p>
        <?php echo $__env->make('work::work_category.admin.work_category_child',['childs' => $category->childs], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php else: ?>
            <span>
                <a href="<?php echo URL::route('admin_work_category.edit', ['id' => $category->category_id]); ?>">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="<?php echo URL::route('admin_work_category.delete',['id' =>  $category->category_id, '_token' => csrf_token()]); ?>"
                   class="margin-left-5 delete">
                    <i class="fa fa-trash-o"></i>
                </a>
            </span>
            </p>
        <?php endif; ?>

    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>