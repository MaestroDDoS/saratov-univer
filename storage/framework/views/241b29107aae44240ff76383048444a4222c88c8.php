<div class="user-table-line">
    <div class="col-sm"><?php echo e($name); ?></div>
    <div class="col-sm"><?php echo e($surname); ?></div>
    <div class="col-sm"><a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a></div>
    <div class="col-sm"><?php echo e($phone); ?></div>
    <a class="dashboard-btn-edit" href="<?php echo e(route_url( "dashboard.admin.users.show", [ "id" => $id ] )); ?>">
        <i class="fl-bigmug-line-gear30"></i>
    </a>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/templates/dashboard/admin/users.blade.php ENDPATH**/ ?>