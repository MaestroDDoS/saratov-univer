<section class="section section-xl bg-image-1">
    <div class="container">
        <h2 class="section-title-font">Наш коллектив</h2>
        <div class="owl-carousel" data-items="1" data-sm-items="2" data-md-items="3" data-margin="30" data-dots="true" data-autoplay="true">
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="team-classic box-md"><a class="team-classic-figure"><img src="<?php echo e(asset($image)); ?>" alt="" height="350"/></a></article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/components/common/about-us/our-team.blade.php ENDPATH**/ ?>