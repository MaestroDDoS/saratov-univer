<div>
    <?php ( $last_page   = $paginator->lastPage() ); ?>
    <?php ( $prev_enable = !$paginator->onFirstPage() && $last_page != 1 ); ?>
    <ul class="dashboard-pagination" id="filter-pagination">
        <li page="first" class="<?php echo e($prev_enable ? '' : 'disabled'); ?>">
            <a class="fl-bigmug-line-two319" href="<?php echo e($paginator->url( 1 )); ?>"></a>
        </li>
        <li page="prev" class="<?php echo e($prev_enable ? '' : 'disabled'); ?>">
            <a class="fl-bigmug-line-left148" href="<?php echo e($paginator->previousPageUrl()); ?>"></a>
        </li>
            <?php for(
                $i = 0,
                $curpage = $paginator->currentPage(),
                $half 	 = ceil( ( 5 - 1 ) * 0.5 ),
                $idx 	 = max( $curpage - $half - ( $half - min( $half, $last_page - $curpage ) ), 1),
                $list 	 = $elements[0];
                $i < 5;
                $i++,
                $idx++
            ): ?>
                <li class="<?php echo e(isset($list[$idx]) ? '' : 'disabled'); ?>">
                    <a class="page-btn <?php echo e($idx != $curpage ? '' : 'active'); ?>" href="<?php echo e($list[$idx] ?? null); ?>"><?php echo e($idx); ?></a>
                </li>
            <?php endfor; ?>
        <li page="next" class="<?php echo e($curpage < $last_page ? '' : 'disabled'); ?>">
            <a class="fl-bigmug-line-right154" href="<?php echo e($paginator->nextPageUrl()); ?>"></a>
        </li>
        <li page="last" class="<?php echo e($last_page != 1 ? '' : 'disabled'); ?>">
            <a class="fl-bigmug-line-double98" href="<?php echo e($paginator->url( $last_page )); ?>"></a>
        </li>
    </ul>
</div>

<?php /**PATH C:\OpenServer\domains\saratov\resources\views/layouts/dashboard/pagination.blade.php ENDPATH**/ ?>