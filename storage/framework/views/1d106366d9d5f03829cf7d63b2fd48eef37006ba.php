<aside class="sidebar-menu h-100">
    <div class="sidebar-header">
        <h4><a href="<?php echo e(route( 'common' )); ?>">Sarmol</a></h4>
    </div>
    <div class="sidebar-menu-inner h-100">
        <div>
            <ul>
                <?php $__currentLoopData = $nav_links[ 'list' ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="<?php echo e($page != $list[1] ? '' : 'active'); ?>">
                        <a href="<?php echo e($list[0]); ?>">
                            <i class="fl-bigmug-line-<?php echo e($list[2]); ?>">
                                <?php if( $count = $list[3] ?? null ): ?>
                                    <span><?php echo e($count); ?></span>
                                <?php endif; ?>
                            </i>
                            <span><?php echo e(__( "navigation.{$list[1]}" )); ?></span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php if(isset( $nav_links[ 'alts' ] )): ?>
            <div class="mt-4 dashboard-aside-other">
                <ul>
                    <?php $__currentLoopData = $nav_links[ 'alts' ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?php echo e($page != $list[1] ? '' : 'active'); ?>">
                            <a href="<?php echo e($list[0]); ?>">
                                <i class="fl-bigmug-line-<?php echo e($list[2]); ?>">
                                    <?php if( $count = $list[3] ?? null ): ?>
                                        <span><?php echo e($count); ?></span>
                                    <?php endif; ?>
                                </i>
                                <span><?php echo e(__( "navigation.{$list[1]}" )); ?></span>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</aside>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/components/dashboard/aside-navbar.blade.php ENDPATH**/ ?>