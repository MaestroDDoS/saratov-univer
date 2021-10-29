<?php ( $access_type = \App\Helpers\Utilities::access_type() ); ?>
<header class="section page-header">
	<nav class="dashboard-navbar-fixed">
		<button class="rd-navbar-toggle"><span></span></button>
		<div class="rd-navbar-brand">
			<a class="brand" href="<?php echo e(route( 'common' )); ?>">
				<img class="brand-logo-dark" src="<?php echo e(asset( 'images/saratovs_milk.svg' )); ?>" alt=""/>
			</a>
		</div>
		<div class="dashboard-navbar-buttons-field">
			<a
                class="rd-navbar-basket fl-bigmug-line-notification4 mr-2"
                href="<?php echo e(route( "dashboard.$access_type.notifications" )); ?>"
            >
                <?php if( $count = App\Helpers\Utilities::getUncheckedNotifications( $access_type ) ): ?>
                    <span><?php echo e($count); ?></span>
                <?php endif; ?>
            </a>
			<a class="rd-navbar-basket fl-bigmug-line-login12" href="<?php echo e(route( 'auth.logout' )); ?>"></a>
		</div>
	</nav>
	<div class="dashboard-title-area">
		<h5 class="page-title"><?php echo $__env->yieldContent('header-title', __( "navigation.$page") ); ?></h5>
	</div>
</header>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/layouts/dashboard/header.blade.php ENDPATH**/ ?>