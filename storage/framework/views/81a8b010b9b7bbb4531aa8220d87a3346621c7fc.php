<?php $__env->startSection( 'head' ); ?>
    <script src="https://cdn.tiny.cloud/1/7wg9vz1rue2sxjbnkq8ekrd2kak2ehhkg7mgr3mr3011hhpz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection( 'content' ); ?>
    <form action="<?php echo e(route( "dashboard.admin.articles.update", $article->id )); ?>" class="dashboard-table article-editor mx-auto">
        <div class="dashboard-table-title row">
            <h4>Статья #<?php echo e($article->id); ?></h4>
        </div>
        <div class="form-group mb-4">
            <label for="name">Название</label>
            <input type="text" class="form-control shadow-sm" name="name" value="<?php echo e($article->title); ?>" validate="text" text-min-len="2" text-max-len="32">
        </div>
        <div class="form-group mb-2">
            <select name="category" class="custom-form-control" validate="select">
                <option value="" hidden>Выберите категорию</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($category->id != $article->article_category_id ?: "selected"); ?> value="<?php echo e($category->id); ?>">
                        <?php echo e(__( "blog.categories.{$category->name}" )); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <textarea id="article-mce">
                <?php echo $tinymce_data; ?>

            </textarea>
        </div>
        <div class="article-slider mx-0">
            <div class="slick-slider-1">
                <div class="slick-slider carousel-parent slick-nav-1 slick-nav-2" id="carousel-parent" data-items="1" data-autoplay="false" data-slide-effect="true" data-arrows="true">
                    <?php for( $idx = 1; $idx <= $img_count; $idx++ ): ?>
                        <div class="item">
                            <img
                                src="<?php echo e(asset( "images/articles/{$article->id}/src/$idx.jpg" )); ?>"
                                src_id="<?php echo e($idx); ?>"
                                alt=""
                                width="830"
                                height="449"
                            />
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        <div class="order-single-footer py-4 d-flex">
            <label class="btn btn-primary ml-0" for="inputImage" title="Загрузить изображение">
                <input type="file" class="sr-only" id="inputImage" name="file" accept=".png, .jpg, .jpeg">
                <i class="fl-bigmug-line-upload92 mr-2"></i>Фотография
            </label>
            <button type="submit" class="btn btn-primary ml-auto"><i class="fl-bigmug-line-save15"></i><span>Сохранить</span></button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset( "js/dashboard/admin/article.js" )); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.dashboard.main-frame', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\saratov\resources\views/pages/dashboard/admin/articles/show/content.blade.php ENDPATH**/ ?>