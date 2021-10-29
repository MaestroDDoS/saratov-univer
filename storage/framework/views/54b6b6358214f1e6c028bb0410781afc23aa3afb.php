<footer class="section footer-modern">
    <div class="footer-modern-body section-xl">
        <div class="container">
            <div class="row row-40 row-md-50 justify-content-xl-between">
                <div class="col-md-10 col-lg-3 col-xl-4 wow fadeInRight">
                    <div class="inset-xl-right-70 block-1">
                        <h5 class="footer-modern-title"><a href="<?php echo e(route('common.gallery')); ?>"><?php echo e(__('navigation.common.gallery')); ?></a></h5>
                        <div class="row row-10 gutters-10" data-lightgallery="group">
                            <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-4 col-sm-2 col-lg-4">
                                    <a class="thumbnail-minimal" href="<?php echo e($image[0]); ?>" data-lightgallery="item">
                                        <img data-src="<?php echo e($image[1]); ?>" alt="" width="93" height="93"/>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-7 col-lg-5 wow fadeInRight" data-wow-delay=".1s">
                    <h5 class="footer-modern-title"><?php echo e(__('navigation.navigation' )); ?></h5>
                    <ul class="footer-modern-list footer-modern-list-2 d-sm-inline-block d-md-block">
                        <?php $__currentLoopData = $nav_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cfg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e($cfg[0]); ?>"><?php echo e(__("navigation.$cfg[1]")); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay=".2s">
                    <h5 class="footer-modern-title"><?php echo e(__('navigation.contact_info')); ?></h5>
                    <ul class="contacts-creative">
                        <li>
                            <div class="unit unit-spacing-sm flex-column flex-md-row">
                                <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                                <div class="unit-body"><a href="#">410080, Россия, Саратов<br/>Сокурский тракт, 1</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="unit unit-spacing-sm flex-column flex-md-row">
                                <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                                <div class="unit-body"><a href="tel:<?php echo e(config('saratov.phone_main')); ?>"><?php echo e(config('saratov.phone_main')); ?></a></div>
                            </div>
                        </li>
                        <li>
                            <div class="unit unit-spacing-sm flex-column flex-md-row">
                                <div class="unit-left"><span class="icon mdi mdi-email-outline"></span></div>
                                <div class="unit-body"><a href="mailto:<?php echo e(config('saratov.mail_main')); ?>"><?php echo e(config('saratov.mail_main')); ?></a></div>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-inline list-social-3 list-inline-sm">
                        <?php $__currentLoopData = config('saratov.official_links'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a class="icon mdi mdi-<?php echo e($type); ?> icon-xxs" href="<?php echo e($link); ?>"></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</footer>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/components/common/footer.blade.php ENDPATH**/ ?>