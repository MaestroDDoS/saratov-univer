<div class="aside-item col-sm-6 col-lg-12">
    <h6 class="aside-title">Последние новости</h6>
    <div class="row row-20 row-lg-30 gutters-10">
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-lg-12">
                <article class="post post-minimal">
                    <div class="unit unit-spacing-sm flex-column flex-lg-row align-items-lg-center">
                        <div class="unit-left">
                            <a class="post-minimal-figure" href="<?php echo e(route( 'common.blog.article', $article->id )); ?>">
                                <img
                                   data-src="<?php echo e(asset( "images/articles/{$article->id}/minimal/1.jpg" )); ?>"
                                    alt=""
                                    width="106"
                                    height="104"
                                />
                            </a>
                        </div>
                        <div class="unit-body">
                            <p class="post-minimal-title">
                                <a href="<?php echo e(route( 'common.blog.article', $article->id )); ?>">
                                    <?php echo e($article->title); ?>

                                </a>
                            </p>
                            <div class="post-minimal-time">
                                <time><?php echo e($article->created_at->formatLocalized('%B %d, %Y')); ?></time>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<div class="aside-item col-sm-6 col-lg-12">
    <h6 class="aside-title"><?php echo e(__( "common.archive" )); ?></h6>
    <ul class="list-marked list-archives d-inline-block d-md-block">
        <?php $__currentLoopData = $latest_months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a
                    filter="datetime"
                    value="<?php echo e($month[0]); ?>"
                    href="<?php echo e(route( 'common.blog', [ 'datetime' => $month[0] ] )); ?>"
                >
                    <?php echo e($month[1]); ?>

                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/components/common/latest-news.blade.php ENDPATH**/ ?>