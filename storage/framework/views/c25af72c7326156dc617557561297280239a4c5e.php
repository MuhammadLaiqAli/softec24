<div class="sidebar py-20 px-20 rounded-4 bg-white bravo_filter">
    <form action="<?php echo e(url(app_get_locale(false,false,'/').config('flight.flight_route_prefix'))); ?>" class="bravo_form_filter row y-gap-40">
        <?php if( !empty(Request::query('location_id')) ): ?>
            <input type="hidden" name="location_id" value="<?php echo e(Request::query('location_id')); ?>">
        <?php endif; ?>
        <?php if( !empty(Request::query('map_place')) ): ?>
            <input type="hidden" name="map_place" value="<?php echo e(Request::query('map_place')); ?>">
        <?php endif; ?>
        <?php if( !empty(Request::query('map_lat')) ): ?>
            <input type="hidden" name="map_lat" value="<?php echo e(Request::query('map_lat')); ?>">
        <?php endif; ?>
        <?php if( !empty(Request::query('map_lgn')) ): ?>
            <input type="hidden" name="map_lgn" value="<?php echo e(Request::query('map_lgn')); ?>">
        <?php endif; ?>
        <?php if( !empty(Request::query('start')) and !empty(Request::query('end')) ): ?>
            <input type="hidden" value="<?php echo e(Request::query('start',date("d/m/Y",strtotime("today")))); ?>" name="start">
            <input type="hidden" value="<?php echo e(Request::query('end',date("d/m/Y",strtotime("+1 day")))); ?>" name="end">
            <input type="hidden" name="date" value="<?php echo e(Request::query('date')); ?>">
        <?php endif; ?>
            <div class="sidebar__item pb-30 -no-border">
                <h5 class="text-18 fw-500 mb-10"><?php echo e(__('Price')); ?></h5>
                <div class="row x-gap-10 y-gap-30">
                    <div class="col-12">
                        <div class="js-price-searchPage">
                            <div class="text-14 fw-500"></div>

                            <?php
                            $price_min = $pri_from = floor ( App\Currency::convertPrice($flight_min_max_price[0]) );
                            $price_max = $pri_to = ceil ( App\Currency::convertPrice($flight_min_max_price[1]) );
                            if (!empty($price_range = Request::query('price_range'))) {
                                $pri_from = explode(";", $price_range)[0];
                                $pri_to = explode(";", $price_range)[1];
                            }
                            $currency = App\Currency::getCurrency( App\Currency::getCurrent() );
                            ?>
                            <input type="hidden" class="filter-price irs-hidden-input" name="price_range"
                                   data-symbol=" <?php echo e($currency['symbol'] ?? ''); ?>"
                                   data-min="<?php echo e($price_min); ?>"
                                   data-max="<?php echo e($price_max); ?>"
                                   data-from="<?php echo e($pri_from); ?>"
                                   data-to="<?php echo e($pri_to); ?>"
                                   readonly="" value="<?php echo e($price_range); ?>">
                            <div class="d-flex justify-between mb-20">
                                <div class="text-15 text-dark-1">
                                    <span class="js-lower"></span>
                                    -
                                    <span class="js-upper"></span>
                                </div>
                            </div>

                            <div class="px-5">
                                <div class="js-slider"></div>
                                <button type="submit" class="flex-center bg-blue-1 rounded-4 px-3 py-1 mt-3 text-12 fw-600 text-white btn-apply-price-range mt-20"><?php echo e(__("APPLY")); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            $selected = (array) Request::query('terms');
        ?>
        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(empty($item['hide_in_filter_search'])): ?>
                <?php
                    $translate = $item->translate();
                ?>

                    <div class="sidebar__item pb-30">
                        <h5 class="text-18 fw-500 mb-10"><?php echo e($translate->name); ?></h5>
                        <div class="sidebar-checkbox">
                            <ul>
                                <?php $__currentLoopData = $item->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $translate = $term->translate(); ?>
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input name="terms[]" <?php if(in_array($term->id,$selected)): ?> checked <?php endif; ?> type="checkbox" value="<?php echo e($term->id); ?>">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10"><?php echo e($translate->name); ?></div>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <div class="text-15 text-light-1"></div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </form>
</div>
<?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/Flight/Views/frontend/layouts/search/filter-search.blade.php ENDPATH**/ ?>