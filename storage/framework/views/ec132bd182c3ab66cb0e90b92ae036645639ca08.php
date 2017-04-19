<ul>
    <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <li>
        <p><?php echo e($child->category_name); ?>


            <?php if(count($child->childs)): ?>
            <span>
                <a href="<?php echo URL::route('admin_work_category.edit', ['id' => $child->category_id]); ?>">
                    <i class="fa fa-pencil"></i>
                </a>
            </span></p>
            <?php echo $__env->make('work::work_category.admin.work_category_child',['childs' => $child->childs], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
            <span>
                <a href="<?php echo URL::route('admin_work_category.edit', ['id' => $child->category_id]); ?>">
                    <i class="fa fa-pencil"></i>
                </a>

                <a href="<?php echo URL::route('admin_work_category.delete',['id' =>  $child->category_id, '_token' => csrf_token()]); ?>"
                   class="margin-left-5 delete">
                    <i class="fa fa-trash-o"></i>
                </a>
            </span></p>
            <?php endif; ?>

    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>