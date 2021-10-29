<?php $__env->startSection( 'content' ); ?>
<template id="item-ajax-template">
    <?php echo $__env->make( "templates.$template", $template_params , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</template>
<div class="dashboard-table">
    <div class="dashboard-table-title">
        <h4>Список товаров</h4>
        <div class="dashboard-table-buttons-field">
            <a href="<?php echo e(route( "dashboard.admin.products.create" )); ?>"><i class="fl-bigmug-line-wrench66"></i><span>Создать новый товар</span></a>
            <button filter-update type="button">
                <i class="fl-bigmug-line-two311"></i><span><?php echo e(__( 'dashboard.filter.update' )); ?></span>
            </button>
        </div>
    </div>
    <form action="<?php echo e(url()->current()); ?>" class="dashboard-table-filter">
        <span class="filter-icon"><i class="fa fa-filter"></i></span>
        <div class="filter-group">
            <?php ( $curpartner = request()->query('partner') ); ?>
            <label>Производитель</label>
            <select filter="partner" class="form-control">
                <option value=""><?php echo e(__( 'dashboard.filter.any_m' )); ?></option>
                <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($curpartner != $partner->name ?: 'selected'); ?> value="<?php echo e($partner->name); ?>"><?php echo e($partner->company_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="filter-group">
            <label>Категория</label>
            <?php ( $curtype = request()->query('type') ); ?>
            <select filter="type" class="form-control">
                <option value=""><?php echo e(__( 'dashboard.filter.any_f' )); ?></option>
                <?php $__currentLoopData = $product_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($curtype != $type->name ?: 'selected'); ?> value="<?php echo e($type->name); ?>"><?php echo e(__( "product.type.{$type->name}" )); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="filter-group">
            <label>Название</label>
            <input filter="title" class="form-control" value="<?php echo e(request()->query('title')); ?>" type="text">
        </div>
        <button type="filter" class="btn">
            <i class="fl-bigmug-line-search74"></i><span><?php echo e(__( 'dashboard.filter.find' )); ?></span>
        </button>
    </form>
    <div id="items-list-page">
        <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make( "templates.$template", $item , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="dashboard-table-footer">
        <div>
            <p id="item-list-title">
                <?php echo $__env->make( 'layouts.search_result', ['type' => 'products'] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </p>
        </div>
        <?php echo e($paginator->links( 'layouts.dashboard.pagination' )); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('pages.dashboard.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/dashboard/admin/products/index/content.blade.php ENDPATH**/ ?>