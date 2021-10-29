<?php $__env->startSection( 'head' ); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset( 'css/cropper.css' )); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'content' ); ?>
<?php if (isset($component)) { $__componentOriginalaa9fd98cd3f203eb962f42af33b0212e80f0f180 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Dashboard\ModalWindow::class, ['name' => 'partner','id' => $item->id]); ?>
<?php $component->withName('dashboard.modal-window'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalaa9fd98cd3f203eb962f42af33b0212e80f0f180)): ?>
<?php $component = $__componentOriginalaa9fd98cd3f203eb962f42af33b0212e80f0f180; ?>
<?php unset($__componentOriginalaa9fd98cd3f203eb962f42af33b0212e80f0f180); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<form action="<?php echo e(route( "dashboard.admin.partners.update", $item->id )); ?>" class="product-table mx-auto text-left">
    <div class="dashboard-table-title">
        <h4>Партнер #<?php echo e($item->id); ?></h4>
        <div class="dashboard-table-buttons-field">
            <button type="button" data-toggle="modal" data-target="#modal-accept"><i class="fl-bigmug-line-cross83"></i><span>Удалить</span></button>
        </div>
    </div>
    <div class="d-flex row m-4">
        <div class="d-flex flex-column cropper-img-partner-logo mr-4">
            <div class="partner-img-cropper mx-auto">
                <img
                    id="img-cropper"
                    class="img-fluid mx-auto mx-md-0 img-thumbnail"
                    src="<?php echo e(asset( "images/partners/{$item->name}.png" )); ?>"
                    height="300"
                    width="500"
                />
            </div>
            <label class="btn mx-auto mx-sm-0 mt-2 btn-primary" for="inputImage" title="Загрузить изображение">
                <input type="file" class="sr-only" id="inputImage" name="file" accept=".png, .jpg, .jpeg">
                <i class="fl-bigmug-line-upload92 mr-2"></i>Загрузить
            </label>
        </div>
        <div class="col-sm col-md-5 col-lg-3 d-flex p-0 mt-4 mt-sm-0 flex-column">
            <div class="form-group mb-4">
                <label for="name">Название</label>
                <input type="text" class="custom-form-control" name="company_name" value="<?php echo e($item->company_name); ?>" validate="text" text-min-len="2" text-max-len="32">
            </div>
            <div class="form-group mb-4">
                <label for="name">Database name</label>
                <input type="text" class="custom-form-control" name="name" value="<?php echo e($item->name); ?>" validate="text" text-min-len="2" text-max-len="5">
            </div>
            <div class="form-group mb-4">
                <label for="name">Слоган</label>
                <input type="text" class="custom-form-control" name="slogan" value="<?php echo e($item->slogan); ?>" validate="text" text-min-len="2" text-max-len="128">
            </div>
        </div>
        <div class="col-md-12 col-lg ml-0 ml-lg-4 mt-2 mt-sm-4 mt-lg-0 px-0 col-no-padding text-main-dark">
            <div class="form-group h-100">
                <textarea
                    class="custom-form-control h-100"
                    name="info"
                    id="parnter-text-area"
                    rows="3"
                    validate="text"
                    text-min-len="2"
                    text-max-len="255"
                ><?php echo e($item->info); ?></textarea>
                <label for="parnter-text-area">Описание компании</label>
            </div>
        </div>
    </div>
    <div class="order-single-footer p-4 d-flex">
        <button type="submit" class="btn btn-primary ml-auto"><i class="fl-bigmug-line-save15"></i><span>Сохранить</span></button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset( 'js/cropper.js' )); ?>"></script>
    <script src="<?php echo e(asset( 'js/dashboard/modal-window.js' )); ?>"></script>
    <script src="<?php echo e(asset( 'js/dashboard/admin/creator.js' )); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.dashboard.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/dashboard/admin/partners/show/content.blade.php ENDPATH**/ ?>