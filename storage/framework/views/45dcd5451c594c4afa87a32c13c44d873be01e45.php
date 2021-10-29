<?php $__env->startSection('content'); ?>
<section class="h-100 d-flex">
<?php echo $__env->make( 'captcha' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container m-auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('auth.verify.title')); ?></div>
                <div class="card-body">
                    <?php echo e(__('auth.verify.email_check')); ?>

                    <?php echo e(__('auth.verify.not_receive')); ?>,
                    <form class="d-inline" action="<?php echo e(route('verification.resend')); ?>">
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline"><span><?php echo e(__('auth.verify.resend')); ?></span></button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'js' ); ?>
	<script src="<?php echo e(asset('js/auth/verification.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.auth.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/auth/verify/content.blade.php ENDPATH**/ ?>