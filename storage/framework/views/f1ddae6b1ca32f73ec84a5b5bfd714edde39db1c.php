<div class="aside-item col-sm-6 col-md-5 col-lg-12">
    <h6 class="aside-title"><?php echo e(__( 'common.sections' )); ?></h6>
    <ul class="list-categories">
        <?php $__currentLoopData = $nav_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cfg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a
                    class="<?php echo e($current_category != $cfg[0] ? '' : "active"); ?>"
                    filter="category"
                    value="<?php echo e($cfg[0]); ?>"
                    href = "<?php echo e(route( 'common.blog', [ 'category' => $cfg[0] ] )); ?>"
                >
                    <?php echo e(trans_fb("blog.categories.$cfg[0]", 'common.all')); ?>

                </a>
                <span class="list-categories-number">(<?php echo e($cfg[1]); ?>)</span>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/components/common/blog/aside-navbar.blade.php ENDPATH**/ ?>