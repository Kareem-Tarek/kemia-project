

<?php $__env->startSection('title'); ?>
    <?php echo e(__('category.deleted_categories')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatable-extension.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/prism.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('category.category')); ?></h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item active"><?php echo e(__('category.deleted_categories')); ?></li>
    <?php echo $__env->renderComponent(); ?>

    

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table-striped display table-bordered <?php if($categories->count() == 0): ?> d-none <?php endif; ?>" id="responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('category.name')); ?></th>
                                        <th><?php echo e(__('category.status')); ?></th>
                                        <th><?php echo e(__('category.parent_id')); ?></th>

                                        <th><?php echo e(__('master.processes')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td>
                                                <?php echo e($category->name); ?> 
                                                <?php if($category->parent_id == null): ?> 
                                                    <label style="color: rgb(41, 197, 41);"><?php echo e('(Main Catgeory)'); ?></label> 
                                                <?php else: ?> 
                                                    <label style="color: rgb(236, 138, 40);"><?php echo e('(Sub-catgeory)'); ?></label> 
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($category->status == "available"): ?>
                                                    <h6><span class="badge badge-success"><?php echo e(ucfirst($category->status)); ?></span></h6>
                                                <?php else: ?>
                                                    <h6><span class="badge badge-danger"><?php echo e(ucfirst($category->status)); ?></span></h6>
                                                <?php endif; ?>
                                            </td>

                                            <td class="text-center">
                                                <?php echo e($category->subCategory->name ?? '—'); ?>

                                            </td>

                                            <td>
                                                <div style="display: flex;">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-restore')): ?>
                                                        <a class="btn btn-outline-success-2x" style="margin:0 20px;"
                                                            href="<?php echo e(route('categories.restore', $category->id)); ?>"><?php echo e(__('master.restore')); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-forceDelete')): ?>
                                                        <form action="<?php echo e(route('categories.forceDelete', $category->id)); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            <input style="border-color: #d22d3d;"
                                                                class="btn btn-outline-danger-2x"
                                                                value="<?php echo e(__('master.permanent_delete')); ?>" type="submit"
                                                                onclick="
                                                                <?php if($category->parent_id == null): ?> 
                                                                    return confirm('<?php echo e(__('category.category_delete_confirm_msg')); ?> <?php echo e('('.$category->name.')'); ?>\n<?php echo e(__('master.note')); ?> <?php echo e(__('category.sub-category_cascade_warning')); ?>');
                                                                <?php else: ?>  
                                                                    return confirm('<?php echo e(__('category.sub-category_delete_confirm_msg')); ?>\n<?php echo e('('.$category->name.')'); ?>');
                                                                <?php endif; ?>">

                                                        </form>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="alert alert-secondary text-center h5"><?php echo e(__('category.empty_deleted_foresle_msg')); ?></div>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('assets/js/clipboard/clipboard.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/custom-card/custom-card.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\kemia-project\resources\views/dashboard/categories/delete.blade.php ENDPATH**/ ?>