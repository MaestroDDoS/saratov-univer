<div class="rd-navbar-nav-wrap">
    <ul class="rd-navbar-nav">
        <?php $__currentLoopData = $nav_links["main"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cfg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="rd-nav-item <?php echo e($page != $cfg[1] ? '' : 'active'); ?>">
                <a class="rd-nav-link" href="<?php echo e($cfg[0]); ?>">
                    <?php echo e(__("navigation.$cfg[1]")); ?>

                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <li class="rd-nav-item"><a class="rd-nav-link" href="#"><?php echo e(__('navigation.navigation')); ?></a>
            <ul class="rd-menu rd-navbar-dropdown">
                <?php $__currentLoopData = $nav_links["dropdown"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cfg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="<?php echo e($cfg[0]); ?>"><?php echo e(__("navigation.$cfg[1]")); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
    </ul>
</div>
<div class="rd-navbar-main-element">
    <div class="rd-navbar-search rd-navbar-search-2">
        <button class="rd-navbar-search-toggle rd-navbar-fixed-element-3" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
        <form class="rd-search" action="">
            <div class="form-wrap">
                <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text"/>
                <label class="form-label" for="rd-navbar-search-form-input"><?php echo e(__('common.search')); ?>...</label>
                <div class="rd-search-results-live" id="rd-search-results-live"></div>
                <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
            </div>
        </form>
    </div>
    <div class="rd-navbar-basket-wrap rd-navbar-fixed-element-cardwrap">
        <button class="rd-navbar-basket rd-navbar-fixed-element-2 fl-bigmug-line-shopping202" data-rd-navbar-toggle=".cart-inline">
            <span><?php echo e($shopcart_items_count); ?></span>
        </button>
        <div class="cart-inline shopcart">
            <div id="basket-goto" class="<?php echo e($shopcart_items_count ? '' : 'd-none'); ?>">
                <div class="cart-inline-header">
                    <h5 class="cart-inline-title m-0 text-center"><?php echo e(__('common.items_added')); ?>: <span><?php echo e($shopcart_items_count); ?></span></h5>
                </div>
                <div class="cart-inline-footer">
                    <div class="d-flex justify-content-center">
                        <a class="button button-primary button-zakaria" href="<?php echo e(route('common.shop.cart')); ?>"><?php echo e(__('common.go2cart')); ?></a>
                    </div>
                </div>
            </div>
            <div id="basket-empty" class="<?php echo e($shopcart_items_count ? 'd-none' : ''); ?>">
                <div class="cart-inline-header">
                    <h5 class="cart-inline-title text-center m-0"><?php echo e(__('common.empty_cart')); ?></h5>
                </div>
            </div>
        </div>
    </div>
    <?php if(auth()->guard()->check()): ?>
        <a class="rd-navbar-basket fl-bigmug-line-user144 rd-navbar-fixed-element-4" href="<?php echo e(route('dashboard.user.orders')); ?>"></a>
    <?php else: ?>
        <button class="rd-navbar-basket fl-bigmug-line-user144 rd-navbar-fixed-element-4" type="button" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate"></button>
    <?php endif; ?>
</div>
<?php if(auth()->guard()->guest()): ?>
    <?php echo $__env->make('layouts.auth-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/components/common/navbar-links.blade.php ENDPATH**/ ?>