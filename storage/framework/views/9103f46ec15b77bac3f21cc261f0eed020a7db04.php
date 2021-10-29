<?php $__env->startSection( 'head' ); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/fias.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make( 'captcha' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="breadcrumbs-custom">
	<?php echo $__env->make('layouts.common.breadcrumbs', [ 'breadcrumbs' => [ [ 'common.shop' ] ] ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
	<section class="section section-sm bg-gray-14 text-md-left">
		<div class="container">
			<div class="row row-50">
				<div class="col-lg-8 pr-lg-4">
					<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="shopcart-product-card" product-id="<?php echo e($item['id']); ?>">
							<div class="product-figure-card">
								<a href="<?php echo e(route( 'common.shop.product', $item['id'] )); ?>">
									<img src="<?php echo e(asset( "images/products/{$item['id']}/small.png" )); ?>" alt="" width="128" height="128"/>
								</a>
							</div>
							<div class="shopcart-info-product">
								<h6 class="product-title"><a href="<?php echo e(route( 'common.shop.product', $item['id'] )); ?>"><?php echo e($item['name']); ?></a></h6>
								<div class="input-number">
									<button class="fl-bigmug-line-left148" type="button"></button>
									<input type="number" value="<?php echo e($item['count']); ?>" step="1" min="1" max="<?php echo e($item['limit']); ?>"/>
									<button  class="fl-bigmug-line-right154" type="button"></button>
								</div>
								<div class="shopcart-info-footer">
									<div class="shopcart-info-wrap">
										<p><?php echo e(__( 'common.count_all' )); ?>: <span group="<?php echo e($item['group']); ?>"></span> <?php echo e(__( 'notation.count' )); ?>.</p>
										<p><?php echo e(__( 'common.total_weight' )); ?>: <span weight="<?php echo e($item['weight'] * 0.001); ?>"></span> <?php echo e(__( 'notation.kg' )); ?>.</p>
									</div>
									<p><span price="<?php echo e($item['cost']); ?>"></span> ₽</p>
								</div>
							</div>
							<button class="shopcart-btn-remove"></button>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div class="col-lg-4 shopcart-aside-panel">
					<div class="aside row-30 row-md-50 justify-content-md-between">
						<div class="shopcart-info">
							<h4 class="font-weight-medium"><?php echo e(__( 'common.new_order' )); ?></h4>
							<hr class="hr-gray-100">
							<div class="shopcart-empty-title">
								<h5 class="font-weight-medium text-transform-uppercase"><?php echo e(__( 'common.empty_cart' )); ?></h5>
								<a class="button button-lg button-primary button-zakaria" href="<?php echo e(route( 'common.shop' )); ?>"><?php echo e(__( 'common.go2shop' )); ?></a>
							</div>
							<?php if( count( $items ) != 0 ): ?>
								<div class="group-md group-middle">
									<ul class="list list-shopcart-info">
										<li><span><?php echo e(__( 'common.total' )); ?>: </span><span><span id="shopcart-totalcount"></span> <?php echo e(__( 'common.products' )); ?> <span id="shopcart-totalprice"></span> ₽</span></li>
										<li><span><?php echo e(__( 'common.total_weight' )); ?>: </span><span><span id="shopcart-totalweight"></span> <?php echo e(__( 'notation.kg' )); ?></span></li>
									</ul>
								</div>
								<div id="shopcart-aside-form">
									<small class="mt-30"><?php echo e(__( 'common.min_weight' )); ?> <?php echo e(config( 'saratov.min_weight' )); ?> <?php echo e(__( 'notation.kg' )); ?>.</small>
									<hr class="hr-gray-100 mb-30">
									<h5 class="font-weight-light"><?php echo e(__( 'common.address_delivery' )); ?></h5>
									<form action="<?php echo e(url()->current()); ?>" class="rd-form mt-20" id="order-form">
										<div class="rd-form-fields">
											<div class="d-flex flex-column mb-30">
												<label class="radio-inline"><input name="registry-accept" checked value="" collapse="hide" type="radio"><?php echo e(__( 'common.pickup' )); ?></label>
												<label class="radio-inline"><input name="registry-accept" value="delivery" collapse="show" type="radio"><?php echo e(__( 'common.delivery' )); ?></label>
											</div>
											<div class="form-wrap shopcart-address-inputs" id="address-inputs">
												<div>
													<div class="form-group">
														<input type="text" class="form-control shadow-sm" id="aside-shopcart-input-region" 	 placeholder="<?php echo e(__( 'common.address.region' )); ?>">
														<input type="text" class="form-control shadow-sm" id="aside-shopcart-input-city" 	 placeholder="<?php echo e(__( 'common.address.city' )); ?>">
														<input type="text" class="form-control shadow-sm" id="aside-shopcart-input-street" 	 placeholder="<?php echo e(__( 'common.address.street' )); ?>">
														<input type="text" class="form-control shadow-sm" id="aside-shopcart-input-building" placeholder="<?php echo e(__( 'common.address.building' )); ?>">
													</div>
													<p id="address-title" class="mb-3"></p>
												</div>
											</div>
										</div>
										<div class="d-flex">
											<button class="button button-lg button-primary w-100 button-zakaria" type="submit"><span><?php echo e(__( 'common.send_request' )); ?></span></button>
										</div>
									</form>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'js' ); ?>
	<script src="<?php echo e(asset('js/cookie.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/fias.js')); ?>"></script>
	<script src="<?php echo e(asset('js/common/shopcart-controller.js')); ?>"></script>
	<script src="<?php echo e(asset('js/common/shop-cart.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.common.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/common/shop/cart/content.blade.php ENDPATH**/ ?>