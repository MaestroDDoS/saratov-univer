<?php $__env->startSection( 'head' ); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset( 'css/datepicker.css' )); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'content' ); ?>
<template id="item-ajax-template">
    <?php echo $__env->make( "templates.$template", $template_params , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</template>
<div class="dashboard-table">
    <div class="dashboard-table-title">
        <h4>Список статей</h4>
        <div class="dashboard-table-buttons-field">
            <a href="<?php echo e(route( "dashboard.admin.articles.create" )); ?>"><i class="fl-bigmug-line-wrench66"></i><span>Создать новую статью</span></a>
            <button filter-update type="button">
                <i class="fl-bigmug-line-two311"></i><span><?php echo e(__( 'dashboard.filter.update' )); ?></span>
            </button>
        </div>
    </div>
    <form action="<?php echo e(url()->current()); ?>" class="dashboard-table-filter">
        <span class="filter-icon"><i class="fa fa-filter"></i></span>
        <div class="filter-group">
            <?php ( $cur = request()->query('category') ); ?>
            <label>Раздел</label>
            <select filter="category" class="form-control">
                <option value=""><?php echo e(__( 'dashboard.filter.any_m' )); ?></option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e($cur != $category->name ?: 'selected'); ?> value="<?php echo e($category->name); ?>">
                            <?php echo e(__( "blog.categories.{$category->name}" )); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="filter-group">
            <label><?php echo e(__( "dashboard.filter.date" )); ?></label>
            <input filter="datetime" datepicker class="form-control" value="<?php echo e(request()->query('datetime')); ?>" type="text">
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
                <?php echo $__env->make( 'layouts.search_result', ['type' => 'articles'] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </p>
        </div>
        <?php echo e($paginator->links( 'layouts.dashboard.pagination' )); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset( 'js/datepicker.js' )); ?>"></script>
    <script src="<?php echo e(asset( 'js/datepicker-ru.js' )); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('pages.dashboard.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/dashboard/admin/articles/index/content.blade.php ENDPATH**/ ?>