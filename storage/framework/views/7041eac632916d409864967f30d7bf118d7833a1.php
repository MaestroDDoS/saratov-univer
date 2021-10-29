<?php $__env->startSection( 'content' ); ?>
<template id="item-ajax-template">
    <?php echo $__env->make( "templates.$template", $template_params , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</template>
<div class="dashboard-table">
    <div class="dashboard-table-title">
        <h4><?php echo e(__( 'order.list' )); ?></h4>
        <div class="dashboard-table-buttons-field">
            <button type="button">
                <i class="fl-bigmug-line-file69"></i><span><?php echo e(__( 'dashboard.filter.save2pdf' )); ?></span>
            </button>
            <button filter-update type="button">
                <i class="fl-bigmug-line-two311"></i><span><?php echo e(__( 'dashboard.filter.update' )); ?></span>
            </button>
        </div>
    </div>
    <form action="<?php echo e(url()->current()); ?>" class="dashboard-table-filter">
        <span class="filter-icon"><i class="fa fa-filter"></i></span>
        <div class="filter-group">
            <?php ( $status = request()->query('status') ); ?>
            <label><?php echo e(__( 'dashboard.filter.status' )); ?></label>
            <select filter="status" class="form-control">
                <option value=""><?php echo e(__( 'dashboard.filter.any_m' )); ?></option>
                <?php $__currentLoopData = $order_status_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($status != $name ?: 'selected'); ?> value="<?php echo e($name); ?>"><?php echo e(__( "order.status.$name" )); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="filter-group">
            <?php ( $delivery = request()->query('delivery') ); ?>
            <label><?php echo e(__( 'dashboard.filter.delivery' )); ?></label>
            <select filter="delivery" class="form-control">
                <option value=""><?php echo e(__( 'dashboard.filter.any_f' )); ?></option>
                <option <?php echo e($delivery != "true"  ?: 'selected'); ?> value="true"><?php echo e(__( 'common.delivery' )); ?></option>
                <option <?php echo e($delivery != "false" ?: 'selected'); ?> value="false"><?php echo e(__( 'common.pickup' )); ?></option>
            </select>
        </div>
        <div class="filter-group">
            <label for="filter-order-id"><?php echo e(__( 'dashboard.filter.id' )); ?></label>
            <input filter="id" value="<?php echo e(request()->query('id')); ?>" class="form-control" type="text">
        </div>
        <button type="filter" class="btn">
            <i class="fl-bigmug-line-search74"></i><span><?php echo e(__( 'dashboard.filter.find' )); ?></span>
        </button>
    </form>
    <div class="order-table-list">
        <div class="order-table-list-header">
            <div></div>
            <div class="col-5 col-sm-3 col-lg-2"><?php echo e(__( 'dashboard.filter.id' )); ?></div>
            <div class="col-2 d-none  d-lg-block"><?php echo e(__( 'common.address.city' )); ?></div>
            <div class="col   col-sm  col-md-3"><?php echo e(__( 'dashboard.filter.status' )); ?></div>
            <div class="col   d-none d-md-block"><?php echo e(__( 'common.weight' )); ?></div>
            <div class="col-2 d-none d-sm-block"><?php echo e(__( 'common.cost' )); ?></div>
            <div></div>
        </div>
        <div id="items-list-page">
            <div class="order-table-lines-wrap">
                <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make( "templates.$template", $item , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="dashboard-table-footer">
            <div>
                <p id="item-list-title">
                    <?php echo $__env->make( 'layouts.search_result', ['type' => 'orders'] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </p>
            </div>
            <?php echo e($paginator->links( 'layouts.dashboard.pagination' )); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('pages.dashboard.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/dashboard/user/orders/index/content.blade.php ENDPATH**/ ?>