<div class="pagination-wrap">
    <nav aria-label="Page navigation">
        <ul class="pagination" id="filter-pagination">
            <li page="prev" class="page-item page-item-control <?php echo e(!$paginator->onFirstPage() && $paginator->lastPage() != 1 ? '' : 'disabled'); ?>">
                <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>"><span class="icon"></span></a>
            </li>
                <?php for(
                    $i = 0,
                    $curpage = $paginator->currentPage(),
                    $half 	 = ceil( ( 9 - 1 ) * 0.5 ),
                    $idx 	 = max( $curpage - $half, 1 ) - ( $half - min( $half, $paginator->lastPage() - $curpage ) ),
                    $list 	 = $elements[0];
                    $i < 9;
                    $i++,
                    $idx++
                ): ?>
                    <li class="page-item <?php echo e(isset($list[$idx]) ? '' : 'disabled'); ?>">
                        <a class="page-link <?php echo e($idx == $curpage ? 'active' : ''); ?>" href="<?php echo e($list[$idx] ?? null); ?>"><?php echo e($idx); ?></a>
                    </li>
                <?php endfor; ?>
            <li page="next" class="page-item page-item-control <?php echo e($paginator->hasMorePages() ? '' : 'disabled'); ?>">
                <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>"><span class="icon"></span></a>
            </li>
        </ul>
    </nav>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/layouts/common/pagination.blade.php ENDPATH**/ ?>