<div class="col-sm-6 col-lg-4 isotope-item">
    <article class="thumbnail-classic block-1">
        <div class="thumbnail-classic-figure">
            <img data-src="<?php echo e(asset( "images/articles/{$id}/gallery/{$idx}.jpg" )); ?>" alt="" width="370" height="315"/>
        </div>
        <div class="thumbnail-classic-caption">
            <div>
                <h5 class="thumbnail-classic-title"><a href="<?php echo e(route_url( "common.blog.article", $id )); ?>"><?php echo e($title); ?></a></h5>
                <div class="thumbnail-classic-subtitle"><?php echo e($category); ?></div>
                <div class="thumbnail-classic-button-wrap">
                    <div class="thumbnail-classic-button">
                        <a class="button button-gray-6 button-zakaria fl-bigmug-line-search74" href="<?php echo e(asset( "images/articles/$id/src/$idx.jpg" )); ?>" data-lightgallery="item">
                            <img data-src="<?php echo e(asset( "images/articles/{$id}/gallery/{$idx}.jpg" )); ?>" alt="" width="370" height="315"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
<?php /**PATH C:\OpenServer\domains\saratov\resources\views/templates/common/gallery.blade.php ENDPATH**/ ?>