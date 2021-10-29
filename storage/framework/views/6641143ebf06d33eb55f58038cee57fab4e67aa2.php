<?php $__env->startSection( 'head' ); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset( 'css/cropper.css' )); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'content' ); ?>
<form action="<?php echo e(route( "dashboard.admin.partners.create" )); ?>" class="product-table mx-auto text-left">
    <div class="dashboard-table-title">
        <h4>Партнер #23</h4>
        <div class="dashboard-table-buttons-field">
        </div>
    </div>
    <div class="d-flex row m-4">
        <div class="d-flex flex-column cropper-img-partner-logo mr-4">
            <div class="partner-img-cropper mx-auto">
                <img
                    id="img-cropper"
                    class="img-fluid mx-auto mx-md-0 img-thumbnail"
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
                <input type="text" class="custom-form-control" name="company_name" value="" validate="text" text-min-len="2" text-max-len="32">
            </div>
            <div class="form-group mb-4">
                <label for="name">Database name</label>
                <input type="text" class="custom-form-control" name="name" value="" validate="text" text-min-len="2" text-max-len="5">
            </div>
            <div class="form-group mb-4">
                <label for="name">Слоган</label>
                <input type="text" class="custom-form-control" name="slogan" value="" validate="text" text-min-len="2" text-max-len="128">
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
                ></textarea>
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

<?php echo $__env->make('pages.dashboard.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/dashboard/admin/partners/create/content.blade.php ENDPATH**/ ?>