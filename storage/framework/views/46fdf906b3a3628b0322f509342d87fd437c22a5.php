<section class="section section-xxl bg-image-1">
    <div class="container">
        <h2 class="wow fadeScale section-title-font"><?php echo e(__('common.new_products')); ?></h2>
        <div class="owl-carousel owl-style-9" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-margin="30" data-dots="true" data-autoplay="true">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make( "templates.$template", $product , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/components/common/index/new-products.blade.php ENDPATH**/ ?>