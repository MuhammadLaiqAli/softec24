
<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/flight/css/flight.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo_search_flight">
        <div class="container">
            <div class=" pt-40 pb-40">
                <div class="text-center">
                    <h1 class="text-30 fw-600">
                        <?php echo e(setting_item_with_lang("flight_page_search_title")); ?>

                    </h1>
                </div>

                <?php echo $__env->make('Flight::frontend.layouts.search.form-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
        <div class="layout-pt-md layout-pb-md bg-light-2">
            <div class="container">
                <?php echo $__env->make('Flight::frontend.layouts.search.list-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('libs/custombox/custombox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('libs/custombox/custombox.legacy.min.js')); ?>"></script>
    <script src="<?php echo e(asset('libs/custombox/window.modal.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('themes/gotrip/module/flight/js/flight.js?_ver='.config('app.asset_version'))); ?>"></script>
    <script>
        $(document).ready(function () {
            $.BCoreModal.init('[data-modal-target]');
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/Flight/Views/frontend/search.blade.php ENDPATH**/ ?>