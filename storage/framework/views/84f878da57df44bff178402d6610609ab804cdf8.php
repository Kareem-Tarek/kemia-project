

<?php $__env->startSection('title'); ?>
    <?php echo e(__('setting.add_setting')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3></h3>
        <?php $__env->endSlot(); ?>

        <li class="breadcrumb-item"><a href="<?php echo e(route('settings.index')); ?>"><?php echo e(__('setting.setting')); ?></a></li>
        <li class="breadcrumb-item active"><?php echo e(__('setting.add_setting')); ?></li>
    <?php echo $__env->renderComponent(); ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5><?php echo e(__('setting.setting')); ?></h5>
                    </div>
                    <div class="card-body">

                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link <?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?> active  <?php endif; ?>" id="ar-tab" data-bs-toggle="pill" href="#ar" role="tab" aria-controls="ar" aria-selected="<?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?> true <?php else: ?> false <?php endif; ?>"><?php echo e(__('master.arabic')); ?><div class="media"></div></a></li>
                            <li class="nav-item"><a class="nav-link <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> active  <?php endif; ?>" id="en-tab" data-bs-toggle="pill" href="#en" role="tab" aria-controls="en" aria-selected="<?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> true <?php else: ?> false <?php endif; ?>"><?php echo e(__('master.english')); ?></a></li>
                        </ul>

                        <form class="needs-validation" novalidate="" method="post" action="<?php echo e(route('settings.store')); ?>"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade mt-4 <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> show active <?php endif; ?>" id="en" role="tabpanel" aria-labelledby="en-tab">
                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01"><?php echo e(__('setting.title')); ?> <span class="text-danger">*</span></label>
                                                <input class="form-control" id="validationCustom01" type="text" required=""
                                                    name="title_en" placeholder="ex: Black shirt" value="<?php echo e(old('title_en')); ?>" />
                                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01"><?php echo e(__('setting.description')); ?></label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="description_en" placeholder="ex: color, size, about setting" value="<?php echo e(old('description_en')); ?>"> </textarea>
                                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01"><?php echo e(__('setting.short_description')); ?></label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="short_description_en" placeholder="ex: color, size, about setting" value="<?php echo e(old('short_description_en')); ?>"> </textarea>
                                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                            </div>
                                        </div>
                                </div>
                                

                                <div class="tab-pane fade mt-4 <?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?> show active <?php endif; ?>" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01"><?php echo e(__('setting.title')); ?> <span class="text-danger">*</span></label>
                                                <input class="form-control" id="validationCustom01" type="text" required=""
                                                    name="title_ar" placeholder="ex: Black shirt" value="<?php echo e(old('title_ar')); ?>" />
                                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01"><?php echo e(__('setting.description')); ?></label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="description_ar" placeholder="ex: color, size, about setting" value="<?php echo e(old('description_ar')); ?>"> </textarea>
                                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                            </div>
                                        </div>

                                        <div class="row g-1">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="validationCustom01"><?php echo e(__('setting.short_description')); ?></label>
                                                <textarea class="form-control" id="validationCustom01"
                                                    name="short_description_ar" placeholder="ex: color, size, about setting" value="<?php echo e(old('short_description_ar')); ?>"> </textarea>
                                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                            </div>
                                        </div>

                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault08"><?php echo e(__('setting.user_name')); ?> <span class="text-danger">*</span></label>
                                    <select name="user_id" class="form-control" value="<?php echo e(old('user_id')); ?>" required>
                                        <option value="" selected><?php echo e(__('setting.select_user')); ?></option>
                                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('setting.phone')); ?> <span class="text-danger">*</span></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="phone" placeholder="ex: +201110000 " value="<?php echo e(old('phone')); ?>" required/>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('setting.phone2')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="phone2" placeholder="ex: +201110000 " value="<?php echo e(old('phone2')); ?>"/>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('setting.email')); ?> <span class="text-danger">*</span></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="email" placeholder="ex: example@email.com " value="<?php echo e(old('email')); ?>" required/>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('setting.whatsApp')); ?> <span class="text-danger">*</span></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="whatsApp" placeholder="ex: +201110000 " value="<?php echo e(old('whatsApp')); ?>" required/>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('setting.facebook')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="facebook" placeholder="ex: https://www.facebook.com " value="<?php echo e(old('facebook')); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
 
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('setting.twitter')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="twitter" placeholder="ex: https://twitter.com/ " value="<?php echo e(old('twitter')); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
 
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('setting.instagram')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="instagram" placeholder="ex: https://instagram.com/ " value="<?php echo e(old('instagram')); ?>" />
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\kemia-project\resources\views/dashboard/settings/create.blade.php ENDPATH**/ ?>