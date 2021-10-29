<div class="col-12">
	<article class="post post-modern box-xxl">
		<div class="post-modern-panel">
			<div><p class="post-modern-tag"><?php echo e($category); ?></p></div>
			<div>
				<time class="post-modern-time"><?php echo e($datetime); ?></time>
			</div>
		</div>
		<h3 class="post-modern-title">
			<a href="<?php echo e(route_url( 'common.blog.article', $id )); ?>"><?php echo e($title); ?></a>
		</h3>
		<a class="post-modern-figure" href="<?php echo e(route_url( 'common.blog.article', $id )); ?>">
			<img src="<?php echo e(asset( "images/articles/{$id}/preview/blog.jpg" )); ?>" alt="" width="800" height="394"/>
		</a>
		<p class="post-modern-text"><?php echo e($text); ?></p>
		<a class="post-modern-link" href="<?php echo e(route_url( 'common.blog.article', $id )); ?>"><?php echo e(__('common.read_more')); ?></a>
	</article>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/templates/common/blog.blade.php ENDPATH**/ ?>