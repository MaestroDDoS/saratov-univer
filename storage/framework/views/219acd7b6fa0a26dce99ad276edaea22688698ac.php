
<?php $__env->startSection('content'); ?>
<section class="h-100 d-flex">
<?php echo $__env->make( 'captcha' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container m-auto">
    <div class="row justify-content-center">
        <div class="col-md-8 col-xl-6">
            <div class="card">
                <div class="card-header"><?php echo e(__('Reset Password')); ?>: <?php echo e($email); ?></div>
                <div class="card-body">
                    <form action="<?php echo e(route('password.update')); ?>">
						<input type="hidden" name="token" value="<?php echo e($token); ?>">
						<input type="hidden" name="email" value="<?php echo e($email); ?>">
                        <div class="rd-form-auth-fields">
							<div class="form-wrap">
								<input class="form-input" id="register-password" name="password" type="password" autocomplete="new-password" validate="password" password-confirm="register-password-confirm"/>
								<label class="form-label" for="register-password"><?php echo e(__('auth.password')); ?></label>
							</div>
							<div class="form-wrap">
								<input class="form-input" id="register-password-confirm" name="password-confirm" type="password" autocomplete="new-password" validate="confirm-password" password-input="register-password"/>
								<label class="form-label" for="register-password-confirm"><?php echo e(__('auth.password_confirm')); ?></label>
							</div>
						</div>
                        <div class="form-group row mx-auto col col-md-9 mb-0">
							<button type="submit" class="button button-auth button-primary button-zakaria">
								<?php echo e(__('Reset Password')); ?>

							</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'js' ); ?>
	<script src="<?php echo e(asset('js/auth/reset-password.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.auth.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/auth/reset/content.blade.php ENDPATH**/ ?>