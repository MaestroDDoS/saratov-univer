<?php $__env->startSection('content'); ?>
	<section class="breadcrumbs-custom">
		<?php echo $__env->make( 'layouts.common.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>
    <template id="item-ajax-template">
       <?php echo $__env->make( "templates.$template", $template_params , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </template>
    <section class="section section-xl bg-default">
        <div class="container isotope-wrap">
            <div class="row row-30 isotope" data-lightgallery="group" id="items-list-page">
                <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make( "templates.$template", $item , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <form action="<?php echo e(url()->current()); ?>" class="d-none" hidden><button class="" type="filter"><span></span></button></form>
        <?php echo e($paginator->links( 'layouts.common.pagination' )); ?>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'js' ); ?>
	<script src="<?php echo e(asset('js/common/gallery.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('pages.common.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/common/gallery/content.blade.php ENDPATH**/ ?>