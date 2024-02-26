<div class="row x-gap-10 y-gap-10 pt-20 pb-20">

    <div class="col-auto">
        <div class="relative js-form-dd">
            <button class="d-flex items-center px-15 py-5 lh-16 text-14 rounded-100 border-light -dd-button" data-x-dd-click="dropdownRating">
                <?php echo e(__('Price')); ?>

                <i class="icon icon-chevron-sm-down text-7 ml-15"></i>
            </button>
            <div class="dropRating" data-x-dd="dropdownRating" data-x-dd-toggle="-is-active">
                <div class="px-20 py-20 rounded-4 bg-white border-light">
                    <h5 class="text-18 fw-500 mb-10"><?php echo e(__('Price')); ?></h5>
                    <div class="row x-gap-10 y-gap-10 pt-10">
                        <div class="js-price-searchPage">
                            <div class="text-14 fw-500"></div>

                            <?php
                            $price_min = $pri_from = floor ( App\Currency::convertPrice($hotel_min_max_price[0]) );
                            $price_max = $pri_to = ceil ( App\Currency::convertPrice($hotel_min_max_price[1]) );
                            if (!empty($price_range = Request::query('price_range'))){
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
                        </div>

                        <button type="submit" class="flex-center bg-blue-1 rounded-4 px-3 py-1 mt-3 text-12 fw-600 text-white btn-apply-price-range"><?php echo e(__("APPLY")); ?></button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-auto">
        <div class="relative js-form-dd">
            <button class="d-flex items-center px-15 py-5 lh-16 text-14 rounded-100 border-light -dd-button" data-x-dd-click="dropdownRating">
                <?php echo e(__('Review Score')); ?>

                <i class="icon icon-chevron-sm-down text-7 ml-15"></i>
            </button>
            <div class="dropRating" data-x-dd="dropdownRating" data-x-dd-toggle="-is-active">
                <div class="px-20 py-20 rounded-4 bg-white border-light">
                    <h5 class="text-18 fw-500 mb-10"><?php echo e(__('Review Score')); ?></h5>
                    <div class="bravo-review-score">
                        <div class="row x-gap-10 y-gap-10 pt-10">
                            <div class="col-auto">
                                <a href="javascript:void(0)" data-value="1" class="button -blue-1 bg-blue-1-05 text-blue-1 py-10 px-20 rounded-100">1</a>
                                <input type="hidden" class="review_score" name="review_score[]" value="">
                            </div>

                            <div class="col-auto">
                                <a href="javascript:void(0)" data-value="2" class="button -blue-1 bg-blue-1-05 text-blue-1 py-10 px-20 rounded-100">2</a>
                                <input type="hidden" class="review_score" name="review_score[]" value="">
                            </div>

                            <div class="col-auto">
                                <a href="javascript:void(0)" data-value="3" class="button -blue-1 bg-blue-1-05 text-blue-1 py-10 px-20 rounded-100">3</a>
                                <input type="hidden" class="review_score" name="review_score[]" value="">
                            </div>

                            <div class="col-auto">
                                <a href="javascript:void(0)" data-value="4" class="button -blue-1 bg-blue-1-05 text-blue-1 py-10 px-20 rounded-100">4</a>
                                <input type="hidden" class="review_score" name="review_score[]" value="">
                            </div>

                            <div class="col-auto">
                                <a href="javascript:void(0)" data-value="5" class="button -blue-1 bg-blue-1-05 text-blue-1 py-10 px-20 rounded-100">5</a>
                                <input type="hidden" class="review_score" name="review_score[]" value="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $selected = (array) Request::query('terms'); ?>
    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(empty($item['hide_in_filter_search'])): ?>
            <?php $translate = $item->translate();
                $term_label = $translate->name;
            ?>
            <div class="col-auto terms-item">
                <div class="dropdown js-dropdown js-<?php echo e($item->slug); ?>-active">
                    <div class="dropdown__button d-flex items-center text-14 rounded-100 border-light px-15 h-34" data-el-toggle=".js-<?php echo e($item->slug); ?>-toggle" data-el-toggle-active=".js-<?php echo e($item->slug); ?>-active">
                        <span class="js-dropdown-title"><?php echo e($translate->name); ?></span>
                        <i class="icon icon-chevron-sm-down text-7 ml-10"></i>
                    </div>
                    <div class="toggle-element -dropdown js-click-dropdown js-<?php echo e($item->slug); ?>-toggle">
                        <div class="text-15 y-gap-15 js-dropdown-list">
                            <div class="border-bottom border-bottom-light"><a href="#" data-term="" class="d-block js-dropdown-link term-item "><?php echo e($term_label); ?></a></div>
                            <?php $__currentLoopData = $item->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $translate = $term->translate(); ?>
                                <div><a href="#" data-term="<?php echo e($term->id); ?>" class="d-block js-dropdown-link term-item"><?php echo e($translate->name); ?></a></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="terms" name="terms[]" value="">
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/Hotel/Views/frontend/layouts/search-map/filter-search-map.blade.php ENDPATH**/ ?>