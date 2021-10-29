<div class="breadcrumbs-custom-footer">
    <div class="container">
        <ul class="breadcrumbs-custom-path">
            <li><a href="<?php echo e(route('common')); ?>"><?php echo e(__( 'navigation.common.index' )); ?></a></li>
            <?php if(isset($breadcrumbs)): ?>
                <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cfg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route( $cfg[0], $cfg[1] ?? null )); ?>"><?php echo e(__nav( $cfg[0], $cfg[1] ?? null )); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <li class="active"><?php echo e(__( "navigation.$page" )); ?></a></li>
        </ul>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/layouts/common/breadcrumbs.blade.php ENDPATH**/ ?>