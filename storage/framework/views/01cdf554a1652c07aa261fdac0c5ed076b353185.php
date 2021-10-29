<?php $__env->startSection( 'content' ); ?>
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
<form action="<?php echo e(route( "dashboard.admin.orders.update", $order->id )); ?>" class="order-single-panel" id="order-form">
    <div class="dashboard-table-title-white">
        <h4>Информация о заказе</h4>
        <span>№<?php echo e($order->id); ?></span>
    </div>
    <div class="order-single-info">
        <div class="col-md-6 mb-3 mb-md-0">
            <p>Итого: <span id="shopcart-totalcount"></span> товаров на <span id="shopcart-totalprice"><?php echo e(number_format($order->cost, 0, ',', ' ')); ?></span> ₽</p>
            <p>Общий вес: <span id="shopcart-totalweight"><?php echo e(number_format($order->weight, 1, ',', ' ')); ?></span> кг</p>
            <small class="mt-3"><span>Требования к заказу: минимальный вес 3000 кг.</span></small>
        </div>
        <div class="col-md-6 text-md-right">
            <p class="status">
                <select name="order_status_id" class="custom-form-control-static-width">
                    <?php $__currentLoopData = $status_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e($order->order_status_id != $status->id ?: "selected"); ?> value="<?php echo e($status->id); ?>">
                            <?php echo e(__( "order.status.{$status->name}" )); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </p>
        </div>
        <div class="col px-0 d-md-flex mt-2 justify-content-md-between">
            <div class="col-md-6">
                <h5>Адрес доставки</h5>
                <?php if( $delivery = $order->delivery ): ?>
                    <p>регион/обл. <?php echo e($delivery["region"]); ?></p>
                    <p>г. <?php echo e($delivery["city"]); ?></p>
                    <p>ул. <?php echo e($delivery["street"]); ?> д. <?php echo e($delivery["building"]); ?></p>
                    <label class="delivery-cost">Стоимость доставки:
                        <input
                            name="delivery-cost"
                            class="custom-form-control simple-number-input form-slim"
                            type="number"
                            value="<?php echo e($delivery[ "cost" ] ?? null); ?>"
                            step="1"
                            min="500"
                            max="999999"/>
                        ₽
                    </label>
                <?php else: ?>
                    <p><?php echo e(__( "common.pickup" )); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-6 d-md-flex">
                <div class="ml-md-auto">
                    <h5>Контактная информация</h5>
                    <p>
                        <?php echo e($order->user->surname); ?>

                        <?php echo e($order->user->name); ?>

                        #<?php echo e($order->user->id); ?>

                    </p>
                    <p><a href="mailto:<?php echo e($order->user->email); ?>"><?php echo e($order->user->email); ?></a></p>
                    <p><?php echo e($order->user->phone); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="order-single-products-list">
        <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="dashboard-product-card pl-0">
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
                        <p class="order-product-count ml-sm-auto">
                            <input
                                name="<?php echo e("product:{$product->id}"); ?>"
                                class="custom-form-control simple-number-input form-slim"
                                type="number"
                                value="<?php echo e($product->info->count); ?>"
                                step="1"
                                min="1"
                                max="<?php echo e($product->limit); ?>"
                            />
                            <span group="<?php echo e($product->group); ?>"></span> шт.
                        </p>
                    </div>
                    <div class="dashboard-product-info-line flex-column flex-sm-row">
                        <div class="col-sm-5">
                            <p class="link-primary"><?php echo e($product->partner->company_name); ?></p>
                            <p>Кол-во в упаковке: <span><?php echo e($product->group); ?></span> шт.</p>
                        </div>
                        <div class="col-sm-3 mt-2 mt-sm-0">
                            <p>Масса: <span><?php echo e($product->weight); ?> г.</span></p>
                            <p>Цена: <span><?php echo e($product->info->cost); ?> ₽</span></p>
                        </div>
                        <div class="col-sm d-flex mt-2 mt-sm-0">
                            <div class="ml-sm-auto">
                                <p>Общий вес: <span weight="<?php echo e($product->weight * 0.001); ?>"></span> кг.</p>
                                <p>Стоимость: <span price="<?php echo e($product->info->cost); ?>"></span> ₽</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="order-single-footer d-flex">
        <?php if( $order->canRemove() ): ?>
            <button type="button" class="btn btn-primary ml-0" data-toggle="modal" data-target="#modal-accept">
                <i class="fl-bigmug-line-cross81"></i>
                <span>Удалить</span>
            </button>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary ml-auto">
            <i class="fl-bigmug-line-save15"></i>
            <span>Сохранить</span>
        </button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset( 'js/dashboard/admin/order.js' )); ?>"></script>
    <script src="<?php echo e(asset( 'js/dashboard/modal-window.js' )); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.dashboard.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/dashboard/admin/orders/show/content.blade.php ENDPATH**/ ?>