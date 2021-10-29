<!DOCTYPE html>
<html class="wide wow-animation" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <title><?php echo $__env->yieldContent('title', __( "navigation.$page") ); ?></title>
    <?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('head'); ?>
</head>
<body>
    <?php echo $__env->make('preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if (isset($component)) { $__componentOriginal5d62fd0f0f0c106f77018cb371e13437d97970c6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Dashboard\AsideNavbar::class, ['page' => $page]); ?>
<?php $component->withName('dashboard.aside-navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal5d62fd0f0f0c106f77018cb371e13437d97970c6)): ?>
<?php $component = $__componentOriginal5d62fd0f0f0c106f77018cb371e13437d97970c6; ?>
<?php unset($__componentOriginal5d62fd0f0f0c106f77018cb371e13437d97970c6); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
	<div class="page page-dashboard">
		<?php echo $__env->make( 'layouts.dashboard.header' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<section class="section text-md-left">
			<div class="main-content-inner">
                <?php echo $__env->yieldContent('content'); ?>
			</div>
		</section>
        <footer class="section footer-modern">
		    <?php echo $__env->make( 'footer' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </footer>
	</div>
    <?php echo $__env->make('js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<script src="<?php echo e(asset('js/dashboard/main.js')); ?>"></script>
	<?php echo $__env->yieldContent('js'); ?>
    <script src="https://hcaptcha.com/1/api.js?recaptchacompat=off" async defer></script>
</body>
</html>

<?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/dashboard/main-frame.blade.php ENDPATH**/ ?>