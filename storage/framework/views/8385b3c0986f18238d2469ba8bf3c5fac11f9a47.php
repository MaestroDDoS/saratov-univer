<div class="dashboard-product-card">
    <div class="product-img-wrap">
        <img src="<?php echo e(asset( "images/partners/{$name}.png" )); ?>" alt="" width="125" height="75">
    </div>
    <div class="product-info-line-wrap">
        <h6 class="dashboard-product-title link-primary"><?php echo e($company_name); ?></h6>
        <div class="dashboard-product-info-line flex-column flex-sm-row">
            <div class="col-sm-5">
                <p><?php echo e($slogan); ?></p>
            </div>
            <div class="col-sm d-flex mt-2 mt-sm-0">
                <div class="ml-sm-auto">

                </div>
            </div>
            <a class="dashboard-btn-edit" href="<?php echo e(route_url( "dashboard.admin.partners.show", [ 'id' =>$id ] )); ?>">
                <i class="fl-bigmug-line-gear30"></i>
            </a>
        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/templates/dashboard/admin/partners.blade.php ENDPATH**/ ?>