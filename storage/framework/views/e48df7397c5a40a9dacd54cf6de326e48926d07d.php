<section class="layout-pt-md layout-pb-lg">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <?php echo $__env->make('Tour::frontend.layouts.search.filter-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="row y-gap-10 items-center justify-between">
                    <div class="col-auto">
                        <div class="text-18">
                            <span class="fw-500">
                                <?php if($rows->total() > 1): ?>
                                    <?php echo e(__(":count tours found",['count'=>$rows->total()])); ?>

                                <?php else: ?>
                                    <?php echo e(__(":count tour found",['count'=>$rows->total()])); ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="row x-gap-20 y-gap-20">
                            <?php echo $__env->make('Tour::frontend.layouts.search.orderby', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
                <?php if($layout == 'grid'): ?>
                    <div class="border-top-light mt-30 mb-30"></div>
                <?php else: ?>
                    <div class="mt-30"></div>
                <?php endif; ?>
                <div class="row y-gap-30">
                    <?php if($rows->total() > 0): ?>
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($layout == 'grid'): ?>
                                <div class="col-lg-4 col-sm-6">
                                    <?php echo $__env->make('Tour::frontend.layouts.search.loop-grid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php else: ?>
                                <div class="col-12">
                                    <?php echo $__env->make('Tour::frontend.layouts.search.loop-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-lg-12">
                            <?php echo e(__("Tour not found")); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <div class="bravo-pagination">
                    <?php echo e($rows->appends(request()->query())->links()); ?>

                    <?php if($rows->total() > 0): ?>
                        <div class="text-center mt-30 md:mt-10">
                            <div class="text-14 text-light-1"><?php echo e(__("Showing :from - :to of :total Tours",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/Tour/Views/frontend/layouts/search/list-item.blade.php ENDPATH**/ ?>