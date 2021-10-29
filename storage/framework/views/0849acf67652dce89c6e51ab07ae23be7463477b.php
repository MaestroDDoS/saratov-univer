<?php $__env->startSection('content'); ?>
<section class="breadcrumbs-custom">
	<div class="parallax-container" data-parallax-img="<?php echo e(asset('images/backgrounds/bg-blog.jpg')); ?>">
		<div class="breadcrumbs-custom-body parallax-content context-dark">
			<div class="container">
				<h2 class="breadcrumbs-custom-title"><?php echo e(__( "navigation.$page" )); ?></h2>
			</div>
		</div>
	</div>
	<?php if (! empty(trim($__env->yieldContent('breadcrumbs')))): ?>
		<?php echo $__env->yieldContent( 'breadcrumbs' ); ?>
	<?php else: ?>
		<?php echo $__env->make( 'layouts.common.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>
</section>
<section class="section section-xl bg-default text-md-left">
	<div class="container">
		<?php echo $__env->yieldContent( 'article-header' ); ?>
		<div class="row row-50 row-md-60">
			<div class="col-lg-8 col-xl-9">
				<?php echo $__env->yieldContent( 'article-info' ); ?>
			</div>
			<div class="col-lg-4 col-xl-3">
				<form action="<?php echo e(url()->current()); ?>" class="d-none" hidden><button class="" type="filter"><span></span></button></form>
				<div class="aside row row-30 row-md-50 justify-content-md-between">
					<?php if (isset($component)) { $__componentOriginal230920799d4622d7564c10fcfb1836bd37615c94 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Common\Blog\AsideNavbar::class, []); ?>
<?php $component->withName('common.blog.aside-navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal230920799d4622d7564c10fcfb1836bd37615c94)): ?>
<?php $component = $__componentOriginal230920799d4622d7564c10fcfb1836bd37615c94; ?>
<?php unset($__componentOriginal230920799d4622d7564c10fcfb1836bd37615c94); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginal2defb023ac41b99786e4e8d14c360fefb589b9c4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Common\LatestNews::class, []); ?>
<?php $component->withName('common.latest-news'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal2defb023ac41b99786e4e8d14c360fefb589b9c4)): ?>
<?php $component = $__componentOriginal2defb023ac41b99786e4e8d14c360fefb589b9c4; ?>
<?php unset($__componentOriginal2defb023ac41b99786e4e8d14c360fefb589b9c4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.common.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/common/blog/main-frame.blade.php ENDPATH**/ ?>