<?php $__env->startSection('content'); ?>
<template id="item-ajax-template">
    <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">
        <?php echo $__env->make( "templates.$template", $template_params , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</template>
<section class="breadcrumbs-custom">
	<div class="parallax-container" data-parallax-img="<?php echo e(asset('images/backgrounds/bg-shop.jpg')); ?>">
		<div class="breadcrumbs-custom-body parallax-content context-dark">
			<div class="container">
				<h2 class="breadcrumbs-custom-title"><?php echo e(__("navigation.$page")); ?></h2>
			</div>
		</div>
	</div>
	<?php echo $__env->make('layouts.common.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<section class="section section-xxl bg-default text-md-left">
	<div class="shop-container px-sm-4 px-xxl-0">
		<div class="row row-50">
			<div class="col-lg-4 col-xl-3">
				<div class="aside row row-30 row-md-50 justify-content-md-between">
					<div class="aside-item col-sm-6 col-md-5 col-lg-12 mb-0">
						<div>
							<h6 class="aside-title"><?php echo e(__( 'common.cost' )); ?></h6>
							<div class="rd-range" data-min="<?php echo e($cost[0]); ?>" data-max="<?php echo e($cost[1]); ?>" data-min-diff="0" data-start="<?php echo e("[".($cost[2]??$cost[0]).",".($cost[3]??$cost[1])."]"); ?>" data-step="1" data-tooltip="false" data-input=".rd-range-input-value-1" data-input-2=".rd-range-input-value-2"></div>
							<div class="group-xs group-justify">
								<div>
									<div class="rd-range-wrap">
										<div class="rd-range-title"><?php echo e(__( 'common.cost' )); ?>:</div>
										<div class="rd-range-form-wrap">
											<input class="rd-range-input rd-range-input-value-1" filter="cost" filter-idx="0" type="text">
											<span>₽</span>
										</div>
										<div class="rd-range-divider"></div>
										<div class="rd-range-form-wrap">
											<input class="rd-range-input rd-range-input-value-2" filter="cost" filter-idx="1" type="text">
											<span>₽</span>
										</div>
									</div>
								</div>
							</div>
							<h6 class="aside-title"><?php echo e(__( 'common.weight' )); ?></h6>
							<div class="rd-range" data-min="<?php echo e($weight[0]); ?>" data-max="<?php echo e($weight[1]); ?>" data-min-diff="0" data-start="<?php echo e("[".($weight[2]??$weight[0]).",".($weight[3]??$weight[1])."]"); ?>" data-step="50" data-tooltip="false" data-input=".rd-range-input-value-3" data-input-2=".rd-range-input-value-4"></div>
							<div class="group-xs group-justify">
								<div>
									<div class="rd-range-wrap">
										<div class="rd-range-title"><?php echo e(__( 'common.weight' )); ?>:</div>
										<div class="rd-range-form-wrap">
											<input class="rd-range-input rd-range-input-value-3" filter="weight" filter-idx="0" type="text">
											<span>г</span>
										</div>
										<div class="rd-range-divider"></div>
										<div class="rd-range-form-wrap">
											<input class="rd-range-input rd-range-input-value-4" filter="weight" filter-idx="1" type="text">
											<span>г</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="rd-aside-shop-filter">
							<h6 class="aside-title"><?php echo e(__( 'product.partner' )); ?></h6>
							<ul class="list-shop-filter">
                                <?php ( $query_filter = $query_params[ 'partner' ] ?? [null] ); ?>
                                <?php $__currentLoopData = $filter[ 'partner' ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $cfg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php ( $type = $cfg[ 'name' ] ?? null ); ?>
                                    <li>
                                        <label class="checkbox-inline">
                                            <input
                                                filter="partner"
                                                filter-idx="<?php echo e($idx); ?>"
                                                value="<?php echo e($type); ?>"
                                                <?php echo e(in_array( $type, $query_filter ) ? 'checked' : ''); ?>

                                                type="checkbox"
                                            >
                                            <?php echo e($cfg['company_name']); ?>

                                        </label>
                                        <span class="list-shop-filter-number">(<?php echo e($cfg['products_count']); ?>)</span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
					<div class="aside-item col-sm-6 col-lg-12">
						<div class="rd-aside-shop-filter">
							<h6 class="aside-title"><?php echo e(__( 'common.categories' )); ?></h6>
							<ul class="list-shop-filter">
                                <?php ( $query_filter = $query_params[ 'type' ] ?? [null] ); ?>
                                <?php $__currentLoopData = $filter[ 'type' ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $cfg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php ( $type = $cfg[ 'name' ] ?? null ); ?>
                                    <li>
                                        <label class="checkbox-inline">
                                            <input
                                                filter="type"
                                                filter-idx="<?php echo e($idx); ?>"
                                                value="<?php echo e($type); ?>"
                                                <?php echo e(in_array( $type, $query_filter ) ? 'checked' : ''); ?>

                                                type="checkbox"
                                            >
                                            <?php echo e(trans_fb( "product.type.$type", 'common.all' )); ?>

                                        </label>
                                        <span class="list-shop-filter-number">(<?php echo e($cfg['products_count']); ?>)</span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
						<form action=<?php echo e(url()->current()); ?>>
							<button class="button button-shop-filter button-primary button-zakaria w-100" type="filter"><span><?php echo e(__( 'common.accept' )); ?></span></button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xl-9">
				<div class="product-top-panel group-md">
					<p class="product-top-panel-title" id="item-list-title">
                        <?php echo $__env->make( 'layouts.search_result', ['type' => 'products'] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</p>
					<div>
						<div class="group-sm group-middle">
							<div class="product-top-panel-sorting">
								<select filter="sort" ajax-reload class="select2">
									<option value="cost"><?php echo e(__( 'common.sorting.cost' )); ?></option>
									<option selected value="title"><?php echo e(__( 'common.sorting.a-z' )); ?></option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="shop-products-list row row-30 row-lg-50" id="items-list-page">
                    <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">
                            <?php echo $__env->make( "templates.$template", $item , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<?php echo e($paginator->links( 'layouts.common.pagination' )); ?>

			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'js' ); ?>
	<script src="<?php echo e(asset('js/cookie.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/common/shopcart-controller.js')); ?>"></script>
	<script src="<?php echo e(asset('js/common/shop.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.common.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/common/shop/index/content.blade.php ENDPATH**/ ?>