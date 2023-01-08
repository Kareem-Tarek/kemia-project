

<?php $__env->startSection('title'); ?>
    <?php echo e(__('category.category')); ?>

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
        <li class="breadcrumb-item active"><?php echo e(__('category.category')); ?></li>
    <?php echo $__env->renderComponent(); ?>

    

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table-striped display table-bordered <?php if($categories->count() == 0): ?> d-none <?php endif; ?>   " id="responsive">
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
                                                    <label style="color: green;"><?php echo e('(Main Catgeory)'); ?></label> 
                                                <?php else: ?> 
                                                    <label style="color: rgb(183, 92, 2);"><?php echo e('(Sub-catgeory)'); ?></label> 
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
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-edit')): ?>
                                                        <a class="btn btn-outline-primary-2x" style="margin:0 20px;"
                                                            href="<?php echo e(route('categories.edit', $category->id)); ?>"><?php echo e(__('master.edit')); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-delete')): ?>
                                                        <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            <input style="border-color: #d22d3d;"
                                                                class="btn btn-outline-danger-2x"
                                                                value="<?php echo e(__('master.delete')); ?>" type="submit">

                                                        </form>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="alert alert-secondary font-weight-bold text-center h5">You have no categories <a href="<?php echo e(route('categories.create')); ?>" class="text-decoration-underline text-dark">Please create category and sub-category</a> and come back</div>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\kemia-project\resources\views/dashboard/categories/index.blade.php ENDPATH**/ ?>