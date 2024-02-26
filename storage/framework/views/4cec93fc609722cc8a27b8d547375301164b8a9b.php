
<?php $__env->startSection('content'); ?>
    <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
        <div class="col-auto">
            <h1 class="text-30 lh-14 fw-600"> <?php echo e(!empty($recovery) ?__('Recovery news') : __("Manage news")); ?></h1>
            <div class="text-15 text-light-1"><?php echo e(__('Lorem ipsum dolor sit amet, consectetur.')); ?></div>
        </div>
        <div class="col-auto">
            <?php if(Auth::user()->hasPermission('news_create')&& empty($recovery)): ?>
                <a href="<?php echo e(route("news.vendor.create")); ?>" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                    <?php echo e(__("Add News")); ?> <div class="icon-arrow-top-right ml-15"></div>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="py-30 px-30 rounded-4 bg-white shadow-3">
        <div class="filter-div d-flex justify-content-between  mb-3">
            <div class="col-left">
                <?php if(!empty($rows)): ?>
                    <form method="post" action="<?php echo e(route('news.vendor.bulkEdit')); ?>"
                          class="filter-form filter-form-left d-flex justify-content-start">
                        <?php echo e(csrf_field()); ?>

                        <select name="action" class="form-control mr-3">
                            <option value=""><?php echo e(__(" Bulk Actions ")); ?></option>
                            <?php if(!setting_item('news_vendor_need_approve')): ?>
                                <option value="publish"><?php echo e(__(" Publish ")); ?></option>
                            <?php endif; ?>
                            <option value="pending"><?php echo e(__("Move to Pending")); ?></option>
                            <option value="draft"><?php echo e(__(" Move to Draft ")); ?></option>
                            <option value="delete"><?php echo e(__(" Delete ")); ?></option>
                        </select>
                        <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="py-2 btn-info btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
                    </form>
                <?php endif; ?>
            </div>
            <div class="col-left">
                <form method="get" action="<?php echo e(route('news.vendor.index')); ?> " class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <input type="text" name="s" value="<?php echo e(Request()->s); ?>" placeholder="<?php echo e(__('Search by name')); ?>"
                           class="form-control mr-3">
                    <select name="cate_id" class="form-control mr-3">
                        <option value=""><?php echo e(__('--All Category --')); ?> </option>
                        <?php
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                printf("<option value='%s' >%s</option>", $category->id, $category->name);
                            }
                        }
                        ?>
                    </select>
                    <div class="flex-shrink-0">
                        <button class="btn-info btn btn-icon btn_search py-2" type="submit"><?php echo e(__('Search News')); ?></button>
                    </div>

                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th width="60px"><input type="checkbox" class="check-all"></th>
                                        <th class="title"> <?php echo e(__('Name')); ?></th>
                                        <th width="200px"> <?php echo e(__('Category')); ?></th>
                                        <th width="100px"> <?php echo e(__('Date')); ?></th>
                                        <th width="100px"><?php echo e(__('Status')); ?></th>
                                        <th width="100px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($rows->total() > 0): ?>
                                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="check-item" name="ids[]" value="<?php echo e($row->id); ?>">
                                                </td>
                                                <td class="title">
                                                    <a href="<?php echo e(route('news.vendor.edit',['id'=>$row->id])); ?>"><?php echo e($row->title); ?></a>
                                                </td>
                                                <td><?php echo e($row->cat->name ?? ''); ?></td>
                                                <td> <?php echo e(display_date($row->updated_at)); ?></td>
                                                <td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td>
                                                <td>
                                                    <a href="<?php echo e(route('news.vendor.edit',['id'=>$row->id])); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6"><?php echo e(__("No data")); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <?php echo e($rows->appends(request()->query())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout::user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp official\htdocs\softec24\themes/GoTrip/News/Views/frontend/vendor/index.blade.php ENDPATH**/ ?>