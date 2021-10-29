<?php $__env->startSection('article-info'); ?>
<template id="item-ajax-template">
    <?php echo $__env->make( "templates.$template", $template_params , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</template>
<div class="inset-xl-right-70 h-100">
	<div class="row row-50 row-md-60 row-lg-80 row-xl-100 h-100" id="items-list-page">
        <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make( "templates.$template", $item , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
    <?php echo e($paginator->links( 'layouts.common.pagination' )); ?>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'js' ); ?>
	<script src="<?php echo e(asset('js/common/blog.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.common.blog.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/common/blog/index/content.blade.php ENDPATH**/ ?>