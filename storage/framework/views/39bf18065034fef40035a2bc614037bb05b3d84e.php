

<?php $__env->startSection('title'); ?>
    <?php echo e(__('category.edit_category')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('category.edit_category')); ?></h3>
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
                        <?php if($category->parent_id != null): ?>
                            <p class="mb-0 mt-3"><span class="text-decoration-underline font-warning"><?php echo e(__('category.note')); ?></span> <?php echo e(__('category.category_and_subcategory_note')); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link <?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?> active  <?php endif; ?>" id="ar-tab" data-bs-toggle="pill" href="#ar" role="tab" aria-controls="ar" aria-selected="<?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?> true <?php else: ?> false <?php endif; ?>"><?php echo e(__('master.arabic')); ?><div class="media"></div></a></li>
                            <li class="nav-item"><a class="nav-link <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> active  <?php endif; ?>" id="en-tab" data-bs-toggle="pill" href="#en" role="tab" aria-controls="en" aria-selected="<?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> true <?php else: ?> false <?php endif; ?>"><?php echo e(__('master.english')); ?></a></li>
                        </ul>
                        
                        <form class="needs-validation" novalidate="" method="post"
                            action="<?php echo e(route('categories.update', $category->id)); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('patch'); ?>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade mt-4 <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> show active <?php endif; ?>" id="en" role="tabpanel" aria-labelledby="en-tab">
                                    <div class="row g-1">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="validationCustom01"><?php echo e(__('category.name')); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" id="validationCustom01" type="text" required=""
                                                name="name_en" placeholder="ex: ELECTRONICS" value="<?php echo e(Request::old('name_en') ? Request::old('name_en') : $category->getTranslation('name','en')); ?>" autocomplete="off"/>
                                            <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                            <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade mt-4 <?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?> show active <?php endif; ?>" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                    <div class="row g-1">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="validationCustom01"><?php echo e(__('category.name')); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" id="validationCustom01" type="text" required=""
                                                name="name_ar" placeholder="مثل: إلكترونيات" value="<?php echo e(Request::old('name_ar') ? Request::old('name_ar') : $category->getTranslation('name','ar')); ?>" autocomplete="off"/>
                                            <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                            <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom02"><?php echo e(__('category.status')); ?> <span class="text-danger">*</span></label>
                                    <select class="form-control" name="status" id="validationCustom02" value="<?php echo e(Request::old('status') ? Request::old('status') : $category->status); ?>" required="">
                                        <option value="" selected><?php echo e(__('category.select_status')); ?></option>
                                        <option value="<?php echo e("available"); ?>" <?php echo e($category->status == "available" ? 'selected'  : ''); ?>><?php echo e(__('category.available')); ?></option>
                                        <option value="<?php echo e("unavailable"); ?>" <?php echo e($category->status == "unavailable" ? 'selected'  : ''); ?>><?php echo e(__('category.unavailable')); ?></option>
                                    </select>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-1 <?php if($category->parent_id == null): ?> d-none <?php endif; ?>">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label"><?php echo e(__('category.sub_category_of')); ?> <span class="text-danger">*</span></label>
                                        <select name="parent_id" class="form-control" value="<?php echo e(Request::old('parent_id') ? Request::old('parent_id') : $category->parent_id); ?>" required>
                                            <option value="" selected><?php echo e(__('category.select_subcategory')); ?></option>
                                            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($cat->id); ?>" <?php echo e($cat->id == $category->parent_id ? 'selected'  : ''); ?>><?php echo e($cat->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>
                                        </select>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit"><?php echo e(__('master.save')); ?></button>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\kemia-project\resources\views/dashboard/categories/edit.blade.php ENDPATH**/ ?>