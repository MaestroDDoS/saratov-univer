<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
	<?php echo $__env->make( 'layouts.common.breadcrumbs', [ 'breadcrumbs' => [ [ 'common.blog' ] ] ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'article-header' ); ?>
	<div class="article-header">
		<span><?php echo e($datetime); ?></span>
		<span><?php echo e(__("blog.categories.$category")); ?></span>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('article-info'); ?>
	<div class="article-body">
        <h4 class="font-weight-medium"><?php echo e($title); ?></h4>
        <?php echo $tinymce_data; ?>

    </div>
	<div class="article-slider">
		<div class="slick-slider-1">
			<div class="slick-slider carousel-parent slick-nav-1 slick-nav-2" id="carousel-parent" data-items="1" data-autoplay="false" data-slide-effect="true" data-arrows="true">
				<?php for( $idx = 1; $idx <= $img_count; $idx++ ): ?>
                    <div class="item"><img src="<?php echo e(asset( "images/articles/$id/blog/$idx.jpg" )); ?>" alt="" width="830" height="449"/></div>
                <?php endfor; ?>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.common.blog.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/common/blog/article/content.blade.php ENDPATH**/ ?>