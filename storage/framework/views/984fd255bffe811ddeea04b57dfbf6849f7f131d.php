<?php $__env->startSection('content'); ?>
<section class="breadcrumbs-custom">
	<div class="parallax-container" data-parallax-img="<?php echo e(asset( 'images/backgrounds/bg-info.jpg' )); ?>">
		<div class="breadcrumbs-custom-body parallax-content context-dark">
			<div class="container">
				<h2 class="breadcrumbs-custom-title"><?php echo e(__( "navigation.$page" )); ?></h2>
			</div>
		</div>
	</div>
	<?php echo $__env->make('layouts.common.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<section class="section section-lg bg-default text-md-left">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-xl-9">
				<dl class="list-terms list-terms-1">
					<?php echo $__env->yieldContent( 'article-info' ); ?>
				</dl>
			</div>
			<?php if (isset($component)) { $__componentOriginal7eef7429e8ed15feed2b4cd14569798a985f4465 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Common\Info\AsideNavbar::class, ['page' => $page]); ?>
<?php $component->withName('common.info.aside-navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal7eef7429e8ed15feed2b4cd14569798a985f4465)): ?>
<?php $component = $__componentOriginal7eef7429e8ed15feed2b4cd14569798a985f4465; ?>
<?php unset($__componentOriginal7eef7429e8ed15feed2b4cd14569798a985f4465); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.common.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/common/info/main-frame.blade.php ENDPATH**/ ?>