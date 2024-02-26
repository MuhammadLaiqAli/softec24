<div class="listing_items">
    <div class="bravo-list-item <?php if(!$rows->count()): ?> not-found <?php endif; ?>">
        <div class="row y-gap-10 justify-between items-center pt-20">
            <div class="col-auto">
                <div class="text-18">
                    <span class="fw-500">
                        <?php if($rows->total() > 1): ?>
                            <?php echo e(__(":count events found",['count'=>$rows->total()])); ?>

                        <?php else: ?>
                            <?php echo e(__(":count event found",['count'=>$rows->total()])); ?>

                        <?php endif; ?></span>
                </div>
            </div>
            <div class="col-auto">
                <?php echo $__env->make('Event::frontend.layouts.search-map.orderby', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div class="y-gap-20 pt-20">
            <?php if($rows->count()): ?>

            <div class="row gotrip-map-list-items">
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12">
                        <?php echo $__env->make('Event::frontend.layouts.search.loop-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="bravo-pagination">
                <?php echo e($rows->appends(array_merge(request()->query(),['_ajax'=>1]))->links()); ?>

            </div>

            <?php else: ?>
                <div class="not-found-box">
                    <h3 class="n-title"><?php echo e(__("We couldn't find any events.")); ?></h3>
                    <p class="p-desc"><?php echo e(__("Try changing your filter criteria")); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/Event/Views/frontend/layouts/search-map/list-item.blade.php ENDPATH**/ ?>