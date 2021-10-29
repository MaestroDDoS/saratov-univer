<div class="col-lg-4 col-xl-3">
    <div class="aside row row-30 row-md-50 justify-content-md-between">
        <div class="aside-item col-sm-6 col-md-5 col-lg-12">
            <h6 class="aside-title"><?php echo e(__( "common.sections" )); ?></h6>
            <ul class="list-categories list-categories-without-flex">
                <?php $__currentLoopData = $nav_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cfg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a class="<?php echo e($page != $cfg[1] ? '' : 'active'); ?>" href="<?php echo e($cfg[0]); ?>"><?php echo e(__("navigation.$cfg[1]")); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php if (isset($component)) { $__componentOriginal2defb023ac41b99786e4e8d14c360fefb589b9c4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Common\LatestNews::class, []); ?>
<?php $component->withName('common.latest-news'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal2defb023ac41b99786e4e8d14c360fefb589b9c4)): ?>
<?php $component = $__componentOriginal2defb023ac41b99786e4e8d14c360fefb589b9c4; ?>
<?php unset($__componentOriginal2defb023ac41b99786e4e8d14c360fefb589b9c4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/components/common/info/aside-navbar.blade.php ENDPATH**/ ?>