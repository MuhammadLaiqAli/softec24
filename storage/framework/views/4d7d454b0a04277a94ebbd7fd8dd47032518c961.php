<div class="row y-gap-30">
    <div class="col-xl-3 col-lg-4">
        <?php echo $__env->make('Flight::frontend.layouts.search.filter-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="bravo-list-item">
            <div class="row y-gap-10 justify-between items-center">
                <div class="col-auto">
                    <div class="text-18"><span class="fw-500">
                             <?php if($rows->total() > 1): ?>
                                <?php echo e(__(":count flights found",['count'=>$rows->total()])); ?>

                            <?php else: ?>
                                <?php echo e(__(":count flight found",['count'=>$rows->total()])); ?>

                            <?php endif; ?>
                           </span>
                    </div>
                </div>

                <div class="col-auto">
                    <?php echo $__env->make('Flight::frontend.layouts.search.orderby', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
            </div>
            <div class="list-item" id="flightFormBook">
                <div class="row">
                    <?php if($rows->total() > 0): ?>
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12">
                                <?php echo $__env->make('Flight::frontend.layouts.search.loop-grid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-lg-12">
                            <?php echo e(__("Flight not found")); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php echo $__env->make('Flight::frontend.layouts.search.modal-form-book', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="bravo-pagination">
                <?php echo e($rows->appends(request()->query())->links()); ?>

                <?php if($rows->total() > 0): ?>
                    <div class="text-center mt-30 md:mt-10">
                        <span class="count-string text-14 text-light-1"><?php echo e(__("Showing :from - :to of :total Flights",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/Flight/Views/frontend/layouts/search/list-item.blade.php ENDPATH**/ ?>