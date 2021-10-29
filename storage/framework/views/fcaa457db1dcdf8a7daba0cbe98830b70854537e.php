<?php $__env->startSection('content'); ?>
<section class="breadcrumbs-custom">
	<?php echo $__env->make('layouts.common.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<section class="section section-sm bg-default text-md-left">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 d-flex flex-column pb-4">
				<div id="phones_block" class="contact_block">
					<span></span>
					<h4><?php echo e(__('common.contacts.phones')); ?> (<span><?php echo e(config('saratov.contacts_phones.prefix')); ?></span>)</h4>
					<ul class="list-categories">
						<?php $__currentLoopData = config('saratov.contacts_phones.list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li>
								<a href="tel:<?php echo e(config('saratov.contacts_phones.prefix') . " $phone"); ?>"><?php echo e(__( "common.contacts.$type" )); ?></a>
								<span class="list-categories-number"><?php echo e($phone); ?></span>
							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
				<div class="contact_block">
					<span></span>
					<h4>E-mail</h4>
					<p><a href="mailto:<?php echo e(config('saratov.mail_main')); ?>"><?php echo e(config('saratov.mail_main')); ?></a></p>
					<p><a href="mailto:<?php echo e(config('saratov.mail_second')); ?>"><?php echo e(config('saratov.mail_second')); ?></a></p>
				</div>
			</div>
			<div class="col-lg-5 pb-4">
				<div class="contact_block h-100">
					<span></span>
					<h4><?php echo e(__('common.contacts.work_hours')); ?></h4>
					<ul class="list-categories">
					<?php $__currentLoopData = config('saratov.work_hours'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><span><?php echo e(jddayofweek( $idx, 1 )); ?></span><span class="list-categories-number"><?php echo e($time ?: __('common.contacts.weekend')); ?></span></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					<div class="tollfree_block">
						<h4><?php echo e(__('common.contacts.hot_link')); ?></h4>
						<p><?php echo e(config('saratov.phone_main')); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection( 'js' ); ?>
	<script src="<?php echo e(asset('js/common/contacts.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.common.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/common/contacts/content.blade.php ENDPATH**/ ?>