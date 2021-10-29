<section class="section section-xxl bg-image-1">
    <div class="container">
        <h2 class="wow fadeScale section-title-font"><a href="<?php echo e(route('common.blog')); ?>"><?php echo e(__('navigation.common.blog.index')); ?></a></h2>
        <div class="row row-lg row-30 justify-content-center">
            <div class="col-sm-8 col-md-6 wow fadeInLeft">
                <?php if( $article = $news[ 0 ] ?? null ): ?>
                    <article class="post post-nikki post-nikki-2">
                        <div class="post-nikki-figure">
                            <img
                                data-src="<?php echo e(asset( "images/articles/{$article->id}/preview/latest-first.jpg" )); ?>"
                                alt=""
                                width="570"
                                height="461"
                            />
                        </div>
                        <div class="post-nikki-body">
                            <div>
                                <div class="post-nikki-time">
                                    <time><?php echo e($article->created_at->formatLocalized('%B %d, %Y')); ?></time>
                                </div>
                                <div class="post-nikki-title">
                                    <a href="<?php echo e(route( 'common.blog.article', $article->id )); ?>">
                                        <?php echo e($article->title); ?>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <div class="row row-30">
                    <?php for( $i = 1; $i < count( $news ); $i++ ): ?>
                        <?php if( $article = $news[ $i ] ?? null ): ?>
                            <div class="col-6 col-md-12 wow fadeInRight">
                                <article class="post post-nikki">
                                    <div class="unit unit-spacing-lg flex-column flex-md-row align-items-center">
                                        <div class="unit-left">
                                            <a class="post-nikki-figure" href="<?php echo e(route( 'common.blog.article', $article->id )); ?>">
                                                <img
                                                    data-src="<?php echo e(asset( "images/articles/{$article->id}/preview/latest-other.jpg" )); ?>"
                                                    alt=""
                                                    width="270"
                                                    height="215"
                                                />
                                            </a>
                                        </div>
                                        <div class="unit-body">
                                            <div class="post-nikki-time">
                                                <time><?php echo e($article->created_at->formatLocalized('%B %d, %Y')); ?></time>
                                            </div>
                                            <div class="post-nikki-title">
                                                <a href="<?php echo e(route( 'common.blog.article', $article->id )); ?>">
                                                    <?php echo e($article->title); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/components/common/index/latest-news.blade.php ENDPATH**/ ?>