<?php $__env->startSection( 'content' ); ?>
<template id="item-ajax-template">
    <?php echo $__env->make( "templates.$template", $template_params , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</template>
<div class="dashboard-table">
    <div class="dashboard-table-title">
        <h4>Список пользователей</h4>
        <div class="dashboard-table-buttons-field">
            <button type="button"><i class="fl-bigmug-line-file69"></i><span>Сохранить в PDF</span></button>
            <button filter-update type="button"><i class="fl-bigmug-line-two311"></i><span>Обновить</span></button>
        </div>
    </div>
    <form action="<?php echo e(url()->current()); ?>" class="dashboard-table-subfilters">
        <div class= "dashboard-table-filter p-0 border-0">
            <a href="#submenu-filters" class="mr-auto pr-2 mb-3 mb-sm-0" data-toggle="collapse"><i class="fa fa-filter mr-2"></i>Фильтры поиска</a>
            <button type="filter" class="btn"><i class="fl-bigmug-line-search74"></i><span>Найти</span></button>
        </div>
        <div class="collapse" id="submenu-filters">
            <div class="py-3 col-no-padding">
                <div class="form-group mb-0 col-sm-8 col-md-6">
                    <input filter="name"    type="text" class="custom-form-control" value="<?php echo e(request()->query( "name" )); ?>" placeholder="Имя">
                    <input filter="surname" type="text" class="custom-form-control" value="<?php echo e(request()->query( "surname" )); ?>" placeholder="Фамилия">
                    <input filter="email"   type="text" class="custom-form-control" value="<?php echo e(request()->query( "email" )); ?>" placeholder="E-mail">
                    <input filter="phone"   type="text" class="custom-form-control" value="<?php echo e(request()->query( "phone" )); ?>" placeholder="Мобильный телефон">
                    <div><label class="checkbox-inline mt-3"><input filter="is_admin" value="true" <?php echo e(!request()->has( "is_admin" ) ?: 'checked'); ?> type="checkbox">Администратор</label></div>
                </div>
            </div>
        </div>
    </form>
    <div>
        <div class="user-table-list-header d-none d-sm-flex">
            <div class="col-sm">Имя</div>
            <div class="col-sm">Фамилия</div>
            <div class="col-sm">E-mail</div>
            <div class="col-sm">Телефон</div>
        </div>
        <div class="order-table-lines-wrap" id="items-list-page">
            <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make( "templates.$template", $item , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="dashboard-table-footer">
            <div>
                <p id="item-list-title">
                    <?php echo $__env->make( 'layouts.search_result', ['type' => 'partners'] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </p>
            </div>
            <?php echo e($paginator->links( 'layouts.dashboard.pagination' )); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('pages.dashboard.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/dashboard/admin/users/index/content.blade.php ENDPATH**/ ?>