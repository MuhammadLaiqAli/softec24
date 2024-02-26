
<?php $__env->startPush('css'); ?>
    <style type="text/css">
        .bravo_topbar, .footer {
            display: none
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php $disable_subscribe_default = true ?>
    <section class="halfMap bravo_search_tour">
        <h1 class="d-none">
            <?php echo e(setting_item_with_lang("tour_page_search_title")); ?>

        </h1>
        <div class="halfMap__content">
            <div class="bravo_form_search_map form-search-all-service">
                <div class="mainSearch bg-white pr-10 py-10 lg:px-20 lg:pt-5 lg:pb-20 bg-light-2 rounded-4">
                    <?php echo $__env->make('Tour::frontend.layouts.search.form-search', ['style' => 'map'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="bravo_filter_search_map">
                <?php echo $__env->make('Tour::frontend.layouts.search-map.filter-search-map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php echo $__env->make('Tour::frontend.layouts.search-map.list-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            map_lat_default:<?php echo e(setting_item('tour_map_lat_default','0')); ?>,
            map_lng_default:<?php echo e(setting_item('tour_map_lng_default','0')); ?>,
            map_zoom_default:<?php echo e(setting_item('tour_map_zoom_default','6')); ?>,
        };
    </script>
    <script type="text/javascript" src="<?php echo e(asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('module/tour/js/tour-map.js?_ver='.config('app.asset_version'))); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('themes/gotrip/module/tour/js/tour-map.js?_ver='.config('app.asset_version'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app',['container_class'=>'container-fluid','header_right_menu'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/Tour/Views/frontend/search-map.blade.php ENDPATH**/ ?>