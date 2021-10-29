<div class="modal fade" id="modal-accept" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-left font-weight-normal">Подтвердите действие</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $__env->yieldContent( 'modal-body' ); ?>
            </div>
            <form action="" class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Отмена</button>
                <a href="" type="button" class="btn btn-primary warning" data-dismiss="modal">Удалить</a>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/layouts/dashboard/modal-window.blade.php ENDPATH**/ ?>