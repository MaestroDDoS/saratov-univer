<?php $__env->startSection( 'content' ); ?>
<div class="order-single-panel" id="order-form">
    <div class="dashboard-table-title-white">
        <h4><?php echo e(__( "dashboard.info_order" )); ?></h4>
        <span>№<?php echo e($order->id); ?></span>
    </div>
    <div class="order-single-info">
        <div class="col-md-6 mb-3 mb-md-0">
            <p><?php echo e(__( "common.total" )); ?>: <span id="shopcart-totalcount"></span> <?php echo e(__( "common.products" )); ?> <span id="shopcart-totalprice"><?php echo e(number_format($order->cost, 0, ',', ' ')); ?></span> ₽</p>
            <p><?php echo e(__( "common.total_weight" )); ?>: <span id="shopcart-totalweight"><?php echo e(number_format($order->weight, 1, ',', ' ')); ?></span> <?php echo e(__( "notation.kg" )); ?></p>
            <h5><?php echo e(__( "common.address_delivery" )); ?></h5>
            <?php if( $delivery = $order->delivery ): ?>
                <p>регион/обл. <?php echo e($delivery["region"]); ?></p>
                <p>г. <?php echo e($delivery["city"]); ?></p>
                <p>ул. <?php echo e($delivery["street"]); ?> д. <?php echo e($delivery["building"]); ?></p>
                <p class="mt-3">
                    <?php echo e(__( "dashboard.delivery_cost" )); ?>:
                    <span>
                        <?php echo e(isset( $delivery[ "cost" ] ) ? number_format($delivery[ "cost" ], 1, ',', ' ')." ₽" : __( "dashboard.specified" )); ?>

                    </span>
                </p>
            <?php else: ?>
                <p><?php echo e(__( "common.pickup" )); ?></p>
            <?php endif; ?>
        </div>
        <div class="col-md-6 text-md-right">
            <p class="status">
                <span class="<?php echo e($order->order_status->name); ?>">&bull;</span>
                <?php echo e(__( "order.status.{$order->order_status->name}" )); ?>

            </p>
        </div>
    </div>
    <div class="order-single-products-list">
        <?php ( $total_count = 0 ); ?>
        <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php ( $cost   = $product->info->cost ); ?>
            <?php ( $weight = $product->weight * 0.001 ); ?>
            <?php ( $group  = $product->group ); ?>
            <?php ( $count  = $product->info->count ); ?>
            <?php ( $total_count += $count * $group ); ?>
            <div class="dashboard-product-card">
                <div class="product-img-wrap">
                    <img src="<?php echo e(asset( "images/products/{$product->id}/small.png" )); ?>" alt="" width="96" height="96">
                </div>
                <div class="product-info-line-wrap">
                    <div class="d-sm-flex align-items-center">
                        <h6 class="dashboard-product-title">
                            <a href="<?php echo e(route( "common.shop.product", $product->id )); ?>">
                                <?php echo e($product->title); ?>

                            </a>
                        </h6>
                        <p class="ml-sm-auto">[ x <?php echo e($count); ?> ]</p>
                    </div>
                    <div class="dashboard-product-info-line flex-column flex-sm-row">
                        <div class="col-sm-5">
                            <p><?php echo e(__( "product.characteristic.group" )); ?>: <span><?php echo e($group); ?> <?php echo e(__( "notation.count" )); ?></span></p>
                            <p><?php echo e(__( "common.count_all" )); ?>: <span><?php echo e($count * $group); ?> <?php echo e(__( "notation.count" )); ?></span></p>
                        </div>
                        <div class="col-sm-3 mt-2 mt-sm-0">
                            <p><?php echo e(__( "product.characteristic.weight" )); ?> <?php echo e(__( "notation.item" )); ?>: <span><?php echo e($weight * 1000); ?> <?php echo e(__( "notation.g" )); ?></span></p>
                            <p><?php echo e(__( "common.cost" )); ?>: <span><?php echo e($cost); ?> ₽</span></p>
                        </div>
                        <div class="col-sm d-flex mt-2 mt-sm-0">
                            <div class="ml-sm-auto">
                                <p><?php echo e(__( "common.total_weight" )); ?>: <span><?php echo e(number_format($count * $group * $weight, 1, ',', ' ')); ?> <?php echo e(__( "notation.kg" )); ?></span></p>
                                <p><?php echo e(__( "dashboard.cost" )); ?>: <span><?php echo e(number_format($count * $group * $cost, 1, ',', ' ')); ?> ₽</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div total-count="<?php echo e($total_count); ?>"></div>
    </div>
    <div class="order-single-footer d-flex">
        <?php if( $order->canRemove() ): ?>
            <?php if (isset($component)) { $__componentOriginalaa9fd98cd3f203eb962f42af33b0212e80f0f180 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Dashboard\ModalWindow::class, ['name' => 'order','id' => $order->id]); ?>
<?php $component->withName('dashboard.modal-window'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalaa9fd98cd3f203eb962f42af33b0212e80f0f180)): ?>
<?php $component = $__componentOriginalaa9fd98cd3f203eb962f42af33b0212e80f0f180; ?>
<?php unset($__componentOriginalaa9fd98cd3f203eb962f42af33b0212e80f0f180); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            <button type="button" class="btn btn-primary ml-0" data-toggle="modal" data-target="#modal-accept">
                <i class="fl-bigmug-line-cross81"></i><span><?php echo e(__( "dashboard.remove" )); ?></span>
            </button>
        <?php endif; ?>
        <?php if( $order->needPayment() ): ?>
            <button type="button" class="btn btn-primary ml-auto">
                <i class="fl-bigmug-line-wallet26"></i><span><?php echo e(__( "dashboard.pay" )); ?></span>
            </button>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('js/dashboard/user/order.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dashboard/modal-window.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.dashboard.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/dashboard/user/orders/show/content.blade.php ENDPATH**/ ?>