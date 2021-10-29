<?php echo e(__( 'search_result.show' )); ?>

	<span><?php echo e(( $paginator->currentPage() - 1 ) * $paginator->perPage() + 1); ?></span>
	–
	<span><?php echo e(( $paginator->currentPage() - 1 ) * $paginator->perPage() + $paginator->count()); ?></span>
<?php echo e(__( "search_result.list.$type" )); ?> <?php echo e(__( 'search_result.from' )); ?>

	<span><?php echo e($paginator->total()); ?></span>
<?php echo e(__( 'search_result.founded' )); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/layouts/search_result.blade.php ENDPATH**/ ?>