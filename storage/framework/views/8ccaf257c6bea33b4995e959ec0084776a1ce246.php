
<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo_search bravo_search_tour">
        <?php if($layout == 'normal'): ?>
            <section class="pt-40 pb-40 bg-light-2">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="text-30 fw-600"><?php echo e(setting_item_with_lang("tour_page_search_title")); ?></h1>
                            </div>
                            <?php echo $__env->make('Tour::frontend.layouts.search.form-search', ['style' => 'default'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php echo $__env->make('Tour::frontend.layouts.search.list-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('module/tour/js/tour.js?_ver='.config('app.asset_version'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/Tour/Views/frontend/search.blade.php ENDPATH**/ ?>