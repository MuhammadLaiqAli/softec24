
<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('themes/gotrip/dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php $disable_subscribe_default = true ?>
    <section class="bravo_search bravo_search_hotel halfMap">
        <h1 class="d-none">
            <?php echo e(setting_item_with_lang("hotel_page_search_title")); ?>

        </h1>
        <div class="halfMap__content">
            <div class="bravo_form_search_map ">
                <div class="mainSearch bg-white pr-10 py-10 lg:px-20 lg:pt-5 lg:pb-20 bg-light-2 rounded-4">
                    <?php echo $__env->make('Hotel::frontend.layouts.search.form-search', ['style' => 'map'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="bravo_filter_search_map">
                <?php echo $__env->make('Hotel::frontend.layouts.search-map.filter-search-map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php echo $__env->make('Hotel::frontend.layouts.search-map.list-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="halfMap__map position-relative">
            <div class="results_map">
                <div class="map-loading d-none">
                    <div class="st-loader"></div>
                </div>
                <div id="bravo_results_map" class="results_map_inner"></div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script>
        var bravo_map_data = {
            markers:<?php echo json_encode($markers); ?>,
            map_lat_default:<?php echo e(setting_item('space_map_lat_default','0')); ?>,
            map_lng_default:<?php echo e(setting_item('space_map_lng_default','0')); ?>,
            map_zoom_default:<?php echo e(setting_item('space_map_zoom_default','6')); ?>,
        };
    </script>
    <script type="text/javascript" src="<?php echo e(asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('module/space/js/space-map.js?_ver='.config('app.asset_version'))); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('themes/gotrip/module/hotel/js/hotel-map.js?_ver='.config('app.asset_version'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/Hotel/Views/frontend/search-map.blade.php ENDPATH**/ ?>