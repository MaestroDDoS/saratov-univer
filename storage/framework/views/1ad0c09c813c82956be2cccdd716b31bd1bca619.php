<!DOCTYPE html>
<html class="wide wow-animation" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <title><?php echo $__env->yieldContent('title', __( "navigation.$page") ); ?></title>
    <?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('head'); ?>
</head>
<body>
    <?php echo $__env->make('preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page">
        <header class="section page-header">
            <div class="rd-navbar-wrap">
                <?php echo $__env->first(["pages.$page.navbar","layouts.common.navbar-default"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </header>
        <?php echo $__env->yieldContent('content'); ?>
		<?php if (isset($component)) { $__componentOriginal2200adf6f70ffa52a984dbd5832df623a200487e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Common\Footer::class, []); ?>
<?php $component->withName('common.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal2200adf6f70ffa52a984dbd5832df623a200487e)): ?>
<?php $component = $__componentOriginal2200adf6f70ffa52a984dbd5832df623a200487e; ?>
<?php unset($__componentOriginal2200adf6f70ffa52a984dbd5832df623a200487e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    </div>
    <?php echo $__env->make('js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<script src="<?php echo e(asset('js/auth-form.js')); ?>"></script>
	<?php echo $__env->yieldContent('js'); ?>
    <script src="https://hcaptcha.com/1/api.js?recaptchacompat=off" async defer></script>
</body>
</html>

<?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/common/main-frame.blade.php ENDPATH**/ ?>