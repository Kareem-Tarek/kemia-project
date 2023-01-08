

<?php $__env->startSection('title'); ?>
    <?php echo e(__('user.user_add')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3></h3>
        <?php $__env->endSlot(); ?>

        <li class="breadcrumb-item"><a href="<?php echo e(route('users.index')); ?>"><?php echo e(__('user.user')); ?></a></li>
        <li class="breadcrumb-item active"><?php echo e(__('user.user_add')); ?></li>
    <?php echo $__env->renderComponent(); ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5><?php echo e(__('master.data')); ?></h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post" action="<?php echo e(route('users.store')); ?>"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('master.name')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name" placeholder="ex: Mohamed Samy" value="<?php echo e(old('name')); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>
                            <div class="row g-2">

                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom03"><?php echo e(__('master.mobile')); ?></label>
                                    <input class="form-control" id="validationCustom03" type="text" name="mobile"
                                        placeholder="رقم الهاتف" required="" value="<?php echo e(old('mobile')); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom04"><?php echo e(__('master.email')); ?></label>
                                    <input class="form-control" id="validationCustom04" type="email" name="email"
                                        placeholder="ex: mohamedsamy@mail.com" required=""
                                        value="<?php echo e(old('email')); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>

                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom05"><?php echo e(__('master.password')); ?></label>
                                    <input class="form-control" id="validationCustom05" type="text" name="password"
                                        placeholder="***********" required="" value="<?php echo e(old('password')); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>

                            </div>

                            

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault08"><?php echo e(__('master.view')); ?></label>
                                    <select class="form-select" id="validationDefault08" required="" name="view">
                                        <option selected="" disabled="" value=""> <?php echo e(__('master.view')); ?></option>
                                        <option value="yes">Yes</option>
                                        <option value="no" >No</option>
                                    </select>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom07"><?php echo e(__('master.image')); ?></label>
                                    <input class="form-control" id="validationCustom07" type="file"
                                        aria-label="file example" name="photo" />
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\kemia\resources\views/dashboard/users/create.blade.php ENDPATH**/ ?>