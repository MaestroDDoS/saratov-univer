<?php $__env->startSection( 'head' ); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset( 'css/datepicker.css' )); ?>">
    <meta notify-0="<?php echo e(__( "dashboard.notifications.0" )); ?>" notify-1="<?php echo e(__( "dashboard.notifications.1" )); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'content' ); ?>
<template id="item-ajax-template">
    <?php echo $__env->make( "templates.$template", $template_params , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</template>
<div class="dashboard-table">
	<div class="dashboard-table-title">
		<h4><?php echo e(__( "common.notifications" )); ?></h4>
		<div class="dashboard-table-buttons-field">
			<button filter-update type="button">
                <i class="fl-bigmug-line-two311"></i><span><?php echo e(__( 'dashboard.filter.update' )); ?></span>
            </button>
		</div>
	</div>
	<form action="<?php echo e(url()->current()); ?>" class="dashboard-table-filter">
		<span class="filter-icon"><i class="fa fa-filter"></i></span>
		<div class="filter-group">
			<label><?php echo e(__( "dashboard.filter.date" )); ?></label>
            <input filter="datetime" datepicker class="form-control" value="<?php echo e(request()->query('datetime')); ?>" type="text">
		</div>
		<button type="filter" class="btn"><i class="fl-bigmug-line-search74"></i><span>Найти</span></button>
	</form>
	<div class="notify-table" id="items-list-page">
        <?php ( $curtype = null ); ?>
        <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if( $curtype != $item[ "checked" ] ): ?>
                <?php ( $curtype = $item[ "checked" ] ); ?>
                <div class="notify-table-header">
                    <h6 class="dashboard-product-title m-0"><?php echo e(__( "dashboard.notifications.{$curtype}" )); ?></h6>
                </div>
            <?php endif; ?>
            <?php echo $__env->make( "templates.$template", $item , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
    <div class="dashboard-table-footer">
        <div>
            <p id="item-list-title">
                <?php echo $__env->make( 'layouts.search_result', ['type' => 'notifications'] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </p>
        </div>
        <?php echo e($paginator->links( 'layouts.dashboard.pagination' )); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset( 'js/datepicker.js' )); ?>"></script>
    <script src="<?php echo e(asset( 'js/datepicker-ru.js' )); ?>"></script>
    <script src="<?php echo e(asset( 'js/dashboard/notifications.js' )); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.dashboard.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/dashboard/user/notifications/index/content.blade.php ENDPATH**/ ?>