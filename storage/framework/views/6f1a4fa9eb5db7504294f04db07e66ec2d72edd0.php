<?php $__env->startSection( 'head' ); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset( 'css/datepicker.css' )); ?>">
    <meta notify-0="<?php echo e(__( "dashboard.notifications.0" )); ?>" notify-1="<?php echo e(__( "dashboard.notifications.1" )); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'content' ); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset( 'js/datepicker.js' )); ?>"></script>
    <script src="<?php echo e(asset( 'js/datepicker-ru.js' )); ?>"></script>
    <script src="<?php echo e(asset( 'js/dashboard/notifications.js' )); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.dashboard.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/dashboard/admin/notifications/index/content.blade.php ENDPATH**/ ?>