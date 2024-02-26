
<?php $__env->startSection('content'); ?>
    <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
        <div class="col-auto">
            <h1 class="text-30 lh-14 fw-600"><?php echo e(__("WishList")); ?></h1>
            <div class="text-15 text-light-1"><?php echo e(__("Lorem ipsum dolor sit amet, consectetur.")); ?></div>
        </div>
        <div class="col-auto"></div>
    </div>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($rows->total() > 0): ?>
    <div class="py-30 px-30 rounded-4 bg-white shadow-3">
        <div class="tabs -underline-2 js-tabs">
            <div class="tabs__contentjs-tabs-content">
                <div class="tabs__pane -tab-item-1 is-tab-el-active">
                    <div class="row y-gap-20">
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12">
                                <?php echo $__env->make('User::frontend.wishList.loop-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="bravo-pagination">
            <span class="count-string"><?php echo e(__("Showing :from - :to of :total",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></span>
            <?php echo e($rows->appends(request()->query())->links()); ?>

        </div>
    </div>
    <?php else: ?>
        <?php echo e(__("No Items")); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/User/Views/frontend/wishList/index.blade.php ENDPATH**/ ?>