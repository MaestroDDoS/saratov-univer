 <article class="product">
    <div class="ribbon ribbon-top-right ribbon-<?php echo e($status); ?>"><span><?php echo e($status_title); ?></span></div>
    <div class="product-body">
        <h5 class="product-title"><a href="<?php echo e(route_url( 'common.shop.product', $id )); ?>"><?php echo e($name); ?></a></h5>
        <div class="product-figure">
            <a href="<?php echo e(route_url( 'common.shop.product', $id )); ?>">
                <img data-src="<?php echo e(asset( "images/products/{$id}/medium.png" )); ?>" alt="" width="173" height="172"/>
            </a>
        </div>
        <div class="product-price-wrap">
            <div class="product-price product-price-old"><?php echo e($cost); ?> <span price="<?php echo e($cost); ?>" class="product-currency">₽</span></div>
            <div class="product-price"><?php echo e($new_cost); ?> ₽</div>
        </div>
        <div class="product-info-wrap">
            <p><?php echo e(__( 'product.partner' )); ?> - <span class="link-primary"><?php echo e($partner_name); ?></span></p>
            <p><?php echo e(__( 'product.group' )); ?> - <?php echo e($group); ?> <?php echo e(__( 'notation.count' )); ?>.</p>
            <p><?php echo e(__( 'product.weight' )); ?> - <?php echo e($weight); ?> <?php echo e(__( 'notation.g' )); ?>.</p>
        </div>
    </div>
    <div class="product-button-wrap">
        <div class="product-button">
            <a class="button button-primary button-zakaria fl-bigmug-line-search74" href="<?php echo e(route_url( 'common.shop.product', $id )); ?>"></a>
        </div>
        <div class="product-button">
            <button type="button" product-id="<?php echo e($id); ?>" class="button button-primary button-zakaria fl-bigmug-line-shopping202"></button>
        </div>
    </div>
</article>


<?php /**PATH C:\OpenServer\domains\saratov\resources\views/templates/common/product.blade.php ENDPATH**/ ?>