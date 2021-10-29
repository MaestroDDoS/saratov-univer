<div class="modal fade" id="modal-accept" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-left font-weight-normal"><?php echo e(__( "dashboard.accept_action" )); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <?php echo e(__( "dashboard.attempt2delete" )); ?> <?php echo e(__( "dashboard.$name" )); ?> <span class="contacts-classic">№<?php echo e($id); ?></span>.
                    <?php echo __( "dashboard.warning" ); ?>

                </p>
            </div>
            <form action="<?php echo e(route( "dashboard.".\App\Helpers\Utilities::access_type().".".Str::plural($name).".delete", $id )); ?>" class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(__( "dashboard.cancel" )); ?></button>
                <button type="submit" class="btn btn-primary warning"><?php echo e(__( "dashboard.remove" )); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/components/dashboard/modal-window.blade.php ENDPATH**/ ?>