<?php $__env->startSection( 'content' ); ?>
<?php echo $__env->make('captcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="personal-info-panel">
    <div class="dashboard-table-title">
        <h4><?php echo e(__( 'dashboard.user_profile' )); ?></h4>
    </div>
    <form action="<?php echo e(url()->current()); ?>" class="personal-info-form">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="input-name"><?php echo e(__('auth.name')); ?></label>
                <input type="text" name="name" class="form-control shadow-sm" id="input-name" value="<?php echo e($user->name); ?>" validate="name">
            </div>
            <div class="form-group col-md-6">
                <label for="input-surname"><?php echo e(__('auth.surname')); ?></label>
                <input type="text" name="surname" class="form-control shadow-sm" id="input-surname" value="<?php echo e($user->surname); ?>" validate="surname">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="input-email">E-mail</label>
                <input type="email" class="form-control shadow-sm" id="input-email" name="email" value="<?php echo e($user->email); ?>" validate="email">
            </div>
            <div class="form-group col-md-6">
                <label for="input-phone"><?php echo e(__('auth.phone')); ?></label>
                <input name="phone" type="text" class="form-control shadow-sm" id="input-phone" value="<?php echo e($user->phone); ?>" validate="phone">
            </div>
        </div>
        <div class="mt-2">
            <div class="form-group col-md-6 mt-3 p-0">
                <label for="input-inn"><?php echo e(__( 'dashboard.inn' )); ?><small class="ml-2"><?php echo e(__( 'dashboard.desirable' )); ?></small></label>
                <input type="text" class="form-control shadow-sm" id="input-inn" value="<?php echo e($user->inn); ?>" validate="user-inn">
            </div>
            <div class="form-group col-md-6 mb-4 p-0">
                <label class="checkbox-inline mt-2">
                    <input name ="send_notifies" value="accept-notify" <?php echo e($user->send_notifies ? 'checked' : ''); ?> type="checkbox">
                    <?php echo e(__( 'dashboard.get_notify' )); ?>

                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="mb-2">
                <a href="#submenu-password-change" class="mr-auto pr-2" data-toggle="collapse">
                    <i class="fl-bigmug-line-note35 mr-2"></i><?php echo e(__( 'dashboard.change_password' )); ?>

                </a>
            </div>
            <div class="collapse" id="submenu-password-change">
                <div class="change-password">
                    <div class="form-group col-md-6">
                        <label for="input-change-password"><?php echo e(__( 'dashboard.new-password' )); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend shadow-sm">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control shadow-sm" id="input-change-password" name="password" type="password" autocomplete="new-password" validate="password" password-confirm="input-change-password2">
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-0">
                        <label for="input-change-password2"><?php echo e(__( 'dashboard.new-password-confirm' )); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend shadow-sm">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control shadow-sm" id="input-change-password2" name="password-confirm" type="password" autocomplete="new-password" validate="confirm-password" password-input="input-change-password">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex mt-4 mb-3">
            <button type="submit" class="btn btn-primary ml-auto"><i class="fl-bigmug-line-save15"></i><span><?php echo e(__( 'dashboard.save' )); ?></span></button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('js/dashboard/user/profile.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.dashboard.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/dashboard/user/profile/content.blade.php ENDPATH**/ ?>