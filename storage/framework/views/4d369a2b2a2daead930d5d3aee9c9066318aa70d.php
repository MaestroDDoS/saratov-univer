<div class="user-table-line">
    <div class="col-sm table-line-id pl-md-0"># <?php echo e($id); ?></div>
    <div class="col-sm"><?php echo e($title); ?></div>
    <div class="col-sm"><?php echo e($category); ?></div>
    <div class="col-sm"><?php echo e($datetime); ?></div>
    <a href="<?php echo e(route_url( "dashboard.admin.articles.show", [ "id" => $id ] )); ?>" class="dashboard-btn-edit">
        <i class="fl-bigmug-line-gear30"></i>
    </a>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/templates/dashboard/admin/articles.blade.php ENDPATH**/ ?>