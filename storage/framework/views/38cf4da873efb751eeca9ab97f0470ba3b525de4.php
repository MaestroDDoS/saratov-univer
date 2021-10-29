<?php $__env->startSection('content'); ?>
<section class="breadcrumbs-custom">
	<?php echo $__env->make( 'layouts.common.breadcrumbs', [ 'breadcrumbs' => [ [ 'common.shop' ] ] ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<section class="section section-sm bg-default">
	<div class="container">
		<div class="row row-30">
			<div class="col-lg-6 d-flex justify-content-center">
				<img class="single-product-img" src="<?php echo e(asset( "images/products/{$id}/full.png" )); ?>"/>
			</div>
			<div class="col-lg-6">
				<div class="single-product" product-id="<?php echo e($id); ?>">
					<h3 class="font-weight-medium"><?php echo e($name); ?></h3>
					<div class="group-md group-middle">
						<div class="single-product-price"><?php echo e($cost); ?> ₽</div>
					</div>
					<hr class="hr-gray-100">
					<div class="group-md group-middle">
						<ul class="list list-description">
							<li><span><?php echo e(__('product.characteristic.partner')); ?>:</span><a href="<?php echo e(route( 'common.shop', [ 'partner' => $partner ] )); ?>"><?php echo e($partner_name); ?></a></li>
							<li><span><?php echo e(__('product.characteristic.type')); ?>:</span><a href="<?php echo e(route( 'common.shop', [ 'type' => $type ] )); ?>"><?php echo e(__("product.type.$type")); ?></a></li>
							<li><span><?php echo e(__('product.characteristic.fat')); ?>:</span><span><span><?php echo e($fat); ?></span>%</span></li>
							<li><span><?php echo e(__('product.characteristic.weight')); ?>:</span><span><span><?php echo e($weight); ?></span><?php echo e(__( 'notation.g' )); ?></span></li>
							<li><span><?php echo e(__('product.characteristic.group')); ?>:</span><span><span><?php echo e($group); ?></span><?php echo e(__( 'notation.count' )); ?></span></li>
							<li><span><?php echo e(__('product.characteristic.pack')); ?>:</span><span><span><?php echo e($pack); ?></span></span></li>
							<li><span><?php echo e(__('product.characteristic.temperature')); ?>:</span><span><span><?php echo e($temperature); ?>±2</span>°С</span></li>
							<li><span><?php echo e(__('product.characteristic.life_time')); ?>:</span><span><span><?php echo e($life_time); ?></span><?php echo e(__( 'notation.days' )); ?></span></li>
						</ul>
					</div>
					<hr class="hr-gray-100">
					<div class="group-xs group-middle">
						<div class="product-stepper">
							<div class="stepper">
								<input class="form-input stepper-input" type="number" value="1" step="1" min="1" max="<?php echo e($limit); ?>">
								<span class="stepper-arrow up"></span>
								<span class="stepper-arrow down"></span>
							</div>
						</div>
						<div>
							<button id="btn-add2card" class="button button-lg button-primary button-zakaria"><?php echo e(__('common.add2cart')); ?></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'js' ); ?>
	<script src="<?php echo e(asset('js/cookie.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/common/shopcart-controller.js')); ?>"></script>
	<script src="<?php echo e(asset('js/common/single-product.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('pages.common.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/common/shop/product/content.blade.php ENDPATH**/ ?>