<section class="section section-xxl section-top-0 bg-default">
    <div class="container">
        <h4 class="wow fadeScale sub-section-title-font"><?php echo e(__( 'common.partners' )); ?></h4>
        <div class="owl-carousel owl-style-11" data-items="1" data-lg-items="2" data-margin="30" data-dots="true" data-autoplay="true">
            <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="quote-carly quote-carly-1">
                    <div class="quote-carly-text">
                        <div class="q"><?php echo e($partner->info); ?></div>
                    </div>
                    <div class="quote-carly-footer">
                        <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                            <div class="unit-left">
                                <div class="">
                                    <img src="<?php echo e(asset( "images/partners/{$partner->name}.png" )); ?>" alt="" width="128" height="128"/>
                                </div>
                            </div>
                            <div class="unit-body">
                                <div class="quote-carly-author"><?php echo e($partner->company_name); ?></div>
                                <div class="quote-carly-status"><?php echo e($partner->slogan); ?></div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/components/common/index/partners.blade.php ENDPATH**/ ?>