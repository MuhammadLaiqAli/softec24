<section data-anim-wrap class="masthead -type-2 js-mouse-move-container">
    <div class="masthead__bg bg-dark-3">
        <img src="<?php echo e($bg_image_url); ?>" alt="image" data-src="<?php echo e($bg_image_url); ?>" class="js-lazy">
    </div>

    <div class="container">
        <div data-anim-child="fade delay-1" class="masthead__tabs">
            <div class="row">
                <div class="col-12">

                    <?php if(empty($hide_form_search)): ?>
                        <div class="tabs -bookmark-2 js-tabs">
                            <div class="tabs__controls d-flex items-center js-tabs-controls">
                                <?php
                                    $types = get_bookable_services();

                                      $res = [];
                                      foreach ($types as $type=>$class) {
                                          $obj = new $class();
                                          $res[$type] = [
                                              'icon'=>call_user_func([$obj,'getServiceIconFeatured']),
                                              'name'=>call_user_func([$obj,'getModelName']),
                                          ];
                                      }
                                      $j = 0;
                                ?>
                                <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="">
                                    <button class="tabs__button px-30 py-20 sm:px-20 sm:py-15 rounded-4 fw-600 text-white js-tabs-button <?php if($j == 0): ?> is-tab-el-active <?php endif; ?>" data-tab-target=".-tab-item-<?php echo e($key); ?>">
                                        <i class="<?php echo e($service['icon']); ?> text-20 mr-10 sm:mr-5"></i>
                                        <?php echo e($service['name']); ?>

                                    </button>
                                </div>
                                    <?php $j++ ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="masthead__content">
            <div class="row y-gap-40">
                <div class="col-xl-5">
                    <h1 data-anim-child="slide-up delay-2" class="z-2 text-60 lg:text-40 md:text-30 text-white pt-80 xl:pt-0">
                        <span class="text-yellow-1"><?php echo e($title ?? ''); ?></span>
                    </h1>

                    <p data-anim-child="slide-up delay-3" class="z-2 text-white mt-20"><?php echo e($sub_title ?? ''); ?></p>

                    <?php if(empty($hide_form_search)): ?>
                        <div data-anim-child="slide-up delay-4" class="mainSearch -w-900 z-2 bg-white pr-10 py-10 lg:px-20 lg:pt-5 lg:pb-20 rounded-4 shadow-1 mt-40">
                            <div class="tabs__content js-tabs-content">
                                <?php $i = 0 ?>
                                <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tabs__pane -tab-item-<?php echo e($key); ?> <?php if($i == 0): ?> is-tab-el-active <?php endif; ?>">
                                        <?php if ($__env->exists(ucfirst($key).'::frontend.layouts.search.form-search', ['style' => $style])) echo $__env->make(ucfirst($key).'::frontend.layouts.search.form-search', ['style' => $style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <?php $i++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-xl-7">
                    <div class="masthead__images">
                        <?php $__currentLoopData = $list_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $img = get_file_url($item['bg_image'],'full') ?>
                            <div data-anim-child="slide-up delay-6"><img src="<?php echo e($img); ?>" alt="image" class="js-mouse-move" data-move="30"></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/Template/Views/frontend/blocks/form-search-all-service/carousel_v2.blade.php ENDPATH**/ ?>