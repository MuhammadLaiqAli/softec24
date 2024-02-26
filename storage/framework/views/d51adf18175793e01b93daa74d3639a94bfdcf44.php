<div class="bravo_filter sidebar">
    <?php if($layout == 'grid_2'): ?>
        <div class="g-filter-item sidebar__item -no-border bravo-form-search">
            <div class="px-20 py-20 bg-light-2 rounded-4">
                <h5 class="text-18 fw-500 mb-10"><?php echo e(setting_item_with_lang("hotel_page_search_title")); ?></h5>
                <?php echo $__env->make('Hotel::frontend.layouts.search.form-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('hotel.search')); ?>" class="bravo_form_filter lg:d-none" data-x="filterPopup" data-x-toggle="-is-active">
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
        <aside class="sidebar y-gap-40 p-4 p-lg-0">
            <div data-x-click="filterPopup" class="-icon-close is_mobile pb-0">
                <i class="icon-close"></i>
            </div>
            <div class="g-filter-item sidebar__item -no-border">
                    <div class="flex-center ratio ratio-15:9 js-lazy" data-bg="<?php echo e(get_file_url(setting_item('hotel_map_image'),'full')); ?>">
                        <a href="<?php echo e(route('hotel.search',['_layout'=>'map'])); ?>" class="button py-15 px-24 -blue-1 bg-white text-dark-1 absolute w-auto h-auto" style="left: initial; top: initial">
                            <i class="icon-destination text-22 mr-10"></i>
                            <?php echo e(__('Show on map')); ?>

                        </a>
                    </div>
                </div>
                <div class="sidebar__item pb-30">
                    <h5 class="text-18 fw-500 mb-10"><?php echo e(__('Price')); ?></h5>
                    <div class="row x-gap-10 y-gap-30">
                        <div class="col-12">
                            <div class="js-price-searchPage">
                                <div class="text-14 fw-500"></div>
                                <?php
                                $price_min = $pri_from = floor ( App\Currency::convertPrice($hotel_min_max_price[0]) );
                                $price_max = $pri_to = ceil ( App\Currency::convertPrice($hotel_min_max_price[1]) );
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
                                </div>
                                <button type="submit" class="flex-center bg-blue-1 rounded-4 px-3 py-1 mt-3 text-12 fw-600 text-white btn-apply-price-range mt-20"><?php echo e(__("APPLY")); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="g-filter-item sidebar__item">
                <div class="item-title">
                    <h5 class="text-18 fw-500 mb-10"><?php echo e(__("Hotel Star")); ?></h5>
                </div>
                <div class="item-content sidebar-checkbox">
                    <?php for($number = 5 ;$number >= 1 ; $number--): ?>
                        <div class="row y-gap-10 items-center justify-between">
                            <div class="col-auto">
                                <div class="d-flex items-center">
                                    <div class="form-checkbox ">
                                        <input type="checkbox" name="star_rate[]" <?php if(  in_array($number , request()->query('star_rate',[])) ): ?>  checked <?php endif; ?> value="<?php echo e($number); ?>">
                                        <div class="form-checkbox__mark">
                                            <div class="form-checkbox__icon icon-check"></div>
                                        </div>
                                    </div>

                                    <div class="text-15 ml-10">
                                        <?php for($review_score = 1 ;$review_score <= $number ; $review_score++): ?>
                                            <i class="fa fa-star" style="color: #fa5636"></i>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="g-filter-item sidebar__item">
                <div class="item-title">
                    <h5 class="text-18 fw-500 mb-10"><?php echo e(__("Review Score")); ?></h5>
                </div>
                <div class="item-content sidebar-checkbox">
                    <?php for($number = 5 ;$number >= 1 ; $number--): ?>
                        <div class="row y-gap-10 items-center justify-between">
                            <div class="col-auto">
                                <div class="d-flex items-center">
                                    <div class="form-checkbox ">
                                        <input type="checkbox" name="review_score[]" <?php if(  in_array($number , request()->query('review_score',[])) ): ?>  checked <?php endif; ?> value="<?php echo e($number); ?>">
                                        <div class="form-checkbox__mark">
                                            <div class="form-checkbox__icon icon-check"></div>
                                        </div>
                                    </div>

                                    <div class="text-15 ml-10">
                                        <?php for($review_score = 1 ;$review_score <= $number ; $review_score++): ?>
                                            <i class="fa fa-star text-yellow-1"></i>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
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
                    <div class="g-filter-item sidebar__item">
                        <div class="item-title">
                            <h5 class="text-18 fw-500 mb-10"> <?php echo e($translate->name); ?> </h5>
                        </div>
                        <div class="item-content sidebar-checkbox">
                            <?php $__currentLoopData = $item->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $translate = $term->translate(); ?>
                                <div class="row y-gap-10 items-center justify-between <?php if($key > 2 and empty($selected)): ?> hide <?php endif; ?>">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input <?php if(in_array($term->id,$selected)): ?> checked <?php endif; ?> type="checkbox" name="terms[]" value="<?php echo e($term->id); ?>">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10"><?php echo $translate->name; ?></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($item->terms) > 3 and empty($selected)): ?>
                                <button type="button" class="btn btn-link btn-more-item"><?php echo e(__("More")); ?> <i class="fa fa-caret-down"></i></button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </aside>
    </form>
</div>


<?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/Hotel/Views/frontend/layouts/search/filter-search.blade.php ENDPATH**/ ?>