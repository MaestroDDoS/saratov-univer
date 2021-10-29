
<?php $__env->startSection('content'); ?>
<section class="section auth-form section-sm">
	<?php echo $__env->make( 'layouts.auth-form' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'js' ); ?>
	<script src="<?php echo e(asset('js/auth-form.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.auth.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/auth/index/content.blade.php ENDPATH**/ ?>