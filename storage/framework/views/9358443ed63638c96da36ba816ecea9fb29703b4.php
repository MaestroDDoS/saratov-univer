<section class="parallax-container" data-parallax-img="/images/parallax/parallax-2.jpg">
    <div class="parallax-content section-xxl context-dark">
        <div class="container">
            <div class="row row-30 justify-content-center">
                <?php $__currentLoopData = $counter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-8 col-sm-4">
                        <div class="counter-modern">
                            <h2 class="counter-modern-number"><span class="counter"><?php echo e($count[1]); ?></span></h2>
                            <div class="counter-modern-decor"></div>
                            <h5 class="counter-modern-title"><?php echo e(__( "common.counter." . $count[0] )); ?></h5>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/components/common/about-us/counter.blade.php ENDPATH**/ ?>