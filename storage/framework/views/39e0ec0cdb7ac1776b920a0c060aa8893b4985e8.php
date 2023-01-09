

<?php $__env->startSection('title'); ?>
    <?php echo e(__('product.product')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('product.product')); ?></h3>
        <?php $__env->endSlot(); ?>

        <li class="breadcrumb-item"><a href="<?php echo e(route('products.index')); ?>"><?php echo e(__('product.product')); ?></a></li>
        <li class="breadcrumb-item active"> <?php echo e(__('product.product')); ?></li>
    <?php echo $__env->renderComponent(); ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5><?php echo e(__('product.product')); ?></h5>
                    </div>
                    <div class="card-body">

                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link <?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?> active  <?php endif; ?>" id="ar-tab" data-bs-toggle="pill" href="#ar" role="tab" aria-controls="ar" aria-selected="<?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?> true <?php else: ?> false <?php endif; ?>"><?php echo e(__('master.arabic')); ?><div class="media"></div></a></li>
                            <li class="nav-item"><a class="nav-link <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> active  <?php endif; ?>" id="en-tab" data-bs-toggle="pill" href="#en" role="tab" aria-controls="en" aria-selected="<?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> true <?php else: ?> false <?php endif; ?>"><?php echo e(__('master.english')); ?></a></li>
                        </ul>

                        <form class="needs-validation" novalidate="" method="post" action="<?php echo e(route('products.update' , $product->id)); ?>"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('patch')); ?>


                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade mt-4 <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> show active <?php endif; ?>" id="en" role="tabpanel" aria-labelledby="en-tab">
                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01"><?php echo e(__('product.title')); ?> <span class="text-danger">*</span></label>
                                                <input class="form-control" id="validationCustom01" type="text" required=""
                                                    name="title_en" placeholder="ex: Black shirt" value="<?php echo e(Request::old('title_en') ? Request::old('title_en') : $product->getTranslation( 'title', 'en' )); ?>" />
                                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div> 
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01"><?php echo e(__('product.description')); ?></label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="description_en" placeholder="ex: color, size, about product" value="<?php echo e(Request::old('description_en') ? Request::old('description_en') : $product->getTranslation( 'description', 'en' )); ?>"> </textarea>
                                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                            </div>
                                        </div>
                                </div>

                                <div class="tab-pane fade mt-4 <?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?> show active <?php endif; ?>" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01"><?php echo e(__('product.title')); ?> <span class="text-danger">*</span></label>
                                                <input class="form-control" id="validationCustom01" type="text" required=""
                                                    name="title_ar" placeholder="ex: Black shirt" value="<?php echo e(Request::old('title_ar') ? Request::old('title_ar') : $product->getTranslation( 'title', 'ar' )); ?>" />
                                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01"><?php echo e(__('product.description')); ?></label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="description_ar" placeholder="ex: color, size, about product" value="<?php echo e(Request::old('description_ar') ? Request::old('description_ar') : $product->getTranslation( 'description', 'ar' )); ?>"> </textarea>
                                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                            </div>
                                        </div>

                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom07"><?php echo e(__('master.image')); ?> <span class="text-danger">*</span></label>
                                    <input class="form-control" id="validationCustom07" type="file" aria-label="file example" name="image" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom04"><?php echo e(__('product.discount')); ?> (%)</label>
                                    <select name="discount" id="discount" class="form-control" value="<?php echo e(Request::old('discount') ? Request::old('discount') : $product->discount); ?>">
                                        <option value="" selected>Please select a discount.</option>
                                        <?php
                                            for($d = 0.01 ; $d < 1 ; $d = $d + 0.01){   //for(start => 1% ; end => 99% ; increment=> ++1)
                                        ?>
                                                <option value="<?php echo e($d); ?>"><?php echo e($d * 100); ?>%</option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom03"><?php echo e(__('product.price')); ?> <span class="text-danger">*</span></label>
                                    <input class="form-control" id="validationCustom03" type="number" name="price"
                                        placeholder="Price in EGP" required="" value="<?php echo e(old('price')); ?>" 
                                        onkeyup="$('#gain_value_final_price_product_create').val($(this).val() - ( $(this).val() * $('#discount').val() ) );"/>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-4 mt-3">
                                    <input class="form-control" id="gain_value_final_price_product_create" placeholder="Price After Discount/Final Price" disabled>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault08"><?php echo e(__('product.product_category')); ?> <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control" value="<?php echo e(Request::old('category_id') ? Request::old('category_id') : $product->category_id); ?>">
                                        <option value="" selected>No category selected.</option>
                                        <?php $__empty_1 = true; $__currentLoopData = $product_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option value="<?php echo e($p_cat->id); ?>" <?php echo e($p_cat->id == $product->category_id ? 'selected'  : ''); ?>>
                                                <?php if($p_cat->parent_id == null): ?>
                                                    <?php echo e($p_cat->name); ?>

                                                <?php else: ?>
                                                    (<?php echo e($p_cat->name); ?>) &RightArrow; <?php echo e($p_cat->subCategory->name); ?>

                                                <?php endif; ?>
                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('product.keywords')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="keywords" placeholder="ex: Clips, Music, etc." value="<?php echo e(Request::old('keywords') ? Request::old('keywords') : $product->keywords); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('product.meta_description')); ?></label>
                                    <textarea class="form-control" id="validationCustom01"
                                        name="meta_description" placeholder="ex: Manufacturer, made in china" value="<?php echo e(Request::old('meta_description') ? Request::old('meta_description') : $product->meta_description); ?>"> </textarea>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\kemia-project\resources\views/dashboard/products/edit.blade.php ENDPATH**/ ?>