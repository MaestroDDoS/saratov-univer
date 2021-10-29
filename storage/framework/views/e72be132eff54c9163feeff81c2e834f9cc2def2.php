<!DOCTYPE html>
<html class="wide wow-animation" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <title><?php echo $__env->yieldContent('title', __( "navigation.$page") ); ?></title>
    <?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('head'); ?>
</head>
<body>
    <?php echo $__env->make('preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page d-flex flex-column" style="height: 100vh;">
		<section class="breadcrumbs-custom">
			<?php echo $__env->make('layouts.common.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</section>
        <?php echo $__env->yieldContent('content'); ?>
		<footer class="section footer-modern">
			<?php echo $__env->make( 'footer' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</footer>
    </div>
    <?php echo $__env->make('js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('js'); ?>
    <script src="https://hcaptcha.com/1/api.js?recaptchacompat=off" async defer></script>
</body>
</html>

<?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/auth/main-frame.blade.php ENDPATH**/ ?>