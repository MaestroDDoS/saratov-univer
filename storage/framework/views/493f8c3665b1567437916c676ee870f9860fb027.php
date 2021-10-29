<div class="order-table-line">
    <div></div>
    <div class="col-5 col-sm-3 col-lg-2">№ <?php echo e($id); ?></div>
    <div class="col-2 d-none d-lg-block"><?php echo e($city); ?></div>
    <div class="col col-sm col-md-3 status">
        <span class="<?php echo e($status); ?>">&bull;</span>
        <span><?php echo e($status_text); ?></span><i class="fl-bigmug-line-nine16"></i>
    </div>
    <div class="col d-none d-md-block"><?php echo e($weight); ?> <?php echo e(__( 'notation.kg' )); ?></div>
    <div class="col-2 d-none d-sm-block"><?php echo e($cost); ?> ₽</div>
    <div>
        <a class="btn" href="<?php echo e(route_url( 'dashboard.user.orders.show', [ 'id' => $id ] )); ?>">
            <i class="fl-bigmug-line-double98"></i>
        </a>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/templates/dashboard/user/orders.blade.php ENDPATH**/ ?>