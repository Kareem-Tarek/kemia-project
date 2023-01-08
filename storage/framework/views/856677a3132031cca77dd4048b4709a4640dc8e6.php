

<?php $__env->startSection('title'); ?>
    <?php echo e(__('category.category')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('category.category')); ?></h3>
        <?php $__env->endSlot(); ?>

        <li class="breadcrumb-item"><a href="<?php echo e(route('categories.index')); ?>"><?php echo e(__('category.category')); ?></a></li>
        <li class="breadcrumb-item active"> 
            <?php if($category->parent_id == null): ?>
                <?php echo e($category->name); ?> (ID: <?php echo e($category->id); ?>)
            <?php else: ?>
                <?php echo e($category->name); ?> (ID: <?php echo e($category->id); ?>) <span class="text-danger">&RightArrow;</span> <?php echo e($category->subCategory->name); ?> (ID: <?php echo e($category->parent_id); ?>)
            <?php endif; ?>
        </li>
    <?php echo $__env->renderComponent(); ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5><?php echo e(__('category.category')); ?></h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post"
                            action="<?php echo e(route('categories.update', $category->id)); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('patch'); ?>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('category.name')); ?> <span class="text-danger">*</span></label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name" placeholder="ex: ELECTRONICS" value="<?php echo e(Request::old('name') ? Request::old('name') : $category->name); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-1 <?php if($category->parent_id == null): ?> d-none <?php endif; ?>">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label"><?php echo e(__('category.sub_category_of')); ?> <span class="text-danger">*</span></label>
                                        <select name="parent_id" class="form-control" value="<?php echo e(Request::old('parent_id') ? Request::old('parent_id') : $category->parent_id); ?>" required>
                                            <option value="" selected>No sub-category selected.</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($cat->id); ?>" <?php echo e($cat->id == $category->parent_id ? 'selected'  : ''); ?>><?php echo e($cat->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">حفظ</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\kemia\resources\views/dashboard/categories/edit.blade.php ENDPATH**/ ?>