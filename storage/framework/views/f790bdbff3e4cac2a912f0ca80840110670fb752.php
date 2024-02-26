<div class="bravo-list-item">
    <div class="row y-gap-10 justify-between items-center pb-20 topbar-search">
        <div class="col-auto">
            <h2 class="text-18">
                <span class="fw-500">
                    <?php if($rows->total() > 1): ?>
                        <?php echo e(__(":count hotels found",['count'=>$rows->total()])); ?>

                    <?php else: ?>
                        <?php echo e(__(":count hotel found",['count'=>$rows->total()])); ?>

                    <?php endif; ?>
                </span>
            </h2>
        </div>
        <div class="col-auto">
            <div class="control d-flex align-items-center">
                <?php echo $__env->make('Hotel::frontend.layouts.search-map.orderby', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <div class="row y-gap-20 list-service-item">
        <?php if($rows->total() > 0): ?>
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item col-12">
                    <div class="border-top-light pt-20">
                        <?php echo $__env->make('Hotel::frontend.layouts.search.loop-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="col-lg-12">
                <?php echo e(__("Hotel not found")); ?>

            </div>
        <?php endif; ?>
    </div>

    <div class="goTrip-bravo-pagination">
        <?php echo e($rows->appends(request()->query())->links()); ?>

        <?php if($rows->total() > 0): ?>
            <div class="text-center mt-30 md:mt-10">
                <div class="text-14 text-light-1">
                    <?php echo e(__("Showing :from - :to of :total Hotels",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?>

                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/Hotel/Views/frontend/layouts/search-map/list-item.blade.php ENDPATH**/ ?>