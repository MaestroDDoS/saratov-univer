<div class="dashboard-product-card">
    <div class="product-info-line-wrap">
        <div class="d-sm-flex align-items-center">
            <h6 class="dashboard-product-title">Заказ №<?php echo e($id); ?></h6>
            <p class="status">
                <span class="<?php echo e($status); ?>">&bull;</span>
                <span><?php echo e($status_text); ?></span>
            </p>
        </div>
        <div class="dashboard-product-info-line flex-column flex-sm-row">
            <div class="col-sm-4 mt-2 mt-sm-0">
                <p>Стоимость: <span><?php echo e($weight); ?> <?php echo e(__( 'notation.kg' )); ?></span></p>
                <p>Вес: <span><?php echo e($cost); ?> ₽</span></p>
            </div>
            <div class="col-sm d-flex mt-2 mt-sm-0">
                <div class="ml-sm-auto text-sm-right">
                    <p><span><?php echo e($city); ?></span></p>
                    <p><span><?php echo e($address); ?></span></p>
                </div>
            </div>
            <a class="dashboard-btn-edit" href="<?php echo e(route_url( 'dashboard.admin.orders.show', [ 'id' => $id ] )); ?>">
                <i class="fl-bigmug-line-gear30"></i>
            </a>
        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/templates/dashboard/admin/orders.blade.php ENDPATH**/ ?>