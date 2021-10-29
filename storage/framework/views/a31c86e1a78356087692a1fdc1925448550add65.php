<div class="dashboard-product-card">
    <div class="product-img-wrap">
        <img src="<?php echo e(asset( "images/products/{$id}/small.png" )); ?>" alt="" width="96" height="96">
    </div>
    <div class="product-info-line-wrap">
        <h6 class="dashboard-product-title">
            <a href="<?php echo e(route_url( "common.shop.product", [ "id" => $id ] )); ?>">
                <?php echo e($title); ?>

            </a>
        </h6>
        <div class="dashboard-product-info-line flex-column flex-sm-row">
            <div class="col-sm-5">
                <p class="link-primary"><?php echo e($partner); ?></p>
                <p><?php echo e(__( "product.characteristic.group" )); ?>: <span><?php echo e($group); ?></span> <?php echo e(__( "notation.count" )); ?></p>
            </div>
            <div class="col-sm-3 mt-2 mt-sm-0">
                <p><?php echo e(__( "common.weight" )); ?>: <span><?php echo e($weight); ?> <?php echo e(__( "notation.g" )); ?>.</span></p>
                <p><?php echo e(__( "common.cost" )); ?>: <span><?php echo e($cost); ?> ₽</span></p>
            </div>
            <div class="col-sm d-flex mt-2 mt-sm-0">
                <div class="ml-sm-auto">
                    <p><?php echo e(__("common.total_weight" )); ?>: <span><?php echo e($total_weight); ?> <?php echo e(__( "notation.kg" )); ?>.</span></p>
                    <p><?php echo e(__( "dashboard.cost" )); ?>: <span><?php echo e($total_cost); ?> ₽</span></p>
                </div>
            </div>
            <a href="<?php echo e(route_url( "dashboard.admin.products.show", [ "id" => $id ] )); ?>" class="dashboard-btn-edit"><i class="fl-bigmug-line-gear30"></i></a>
        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/templates/dashboard/admin/products.blade.php ENDPATH**/ ?>