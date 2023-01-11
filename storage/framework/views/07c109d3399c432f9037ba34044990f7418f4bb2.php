

<?php $__env->startSection('title'); ?>
    <?php echo e(__('user.user')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('user.user')); ?></h3>
        <?php $__env->endSlot(); ?>

        <li class="breadcrumb-item"><a href="<?php echo e(route('users.index')); ?>"><?php echo e(__('user.user')); ?></a></li>
        <li class="breadcrumb-item active"> <?php echo e(__('user.user_edit')); ?></li>
    <?php echo $__env->renderComponent(); ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5><?php echo e(__('master.data')); ?></h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post"
                            action="<?php echo e(route('users.update', $user->id)); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('patch'); ?>


                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('master.name')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text" required="" value="<?php echo e(Request::old('name') ? Request::old('name') : $user->name); ?>"
                                        name="name" placeholder="ex: Mohamed Samy" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault07"><?php echo e(__('master.status')); ?></label>
                                    <select class="form-select" id="validationDefault07" required="" name="status" value="<?php echo e(Request::old('status') ? Request::old('status') : $user->status); ?>">
                                        <option selected="" value=""><?php echo e(__('user.select_status')); ?></option>
                                        <option value="<?php echo e("active"); ?>" <?php echo e($user->status == "active" ? 'selected'  : ''); ?>><?php echo e(__('user.active')); ?></option>
                                        <option value="<?php echo e("inactive"); ?>" <?php echo e($user->status == "inactive" ? 'selected'  : ''); ?>><?php echo e(__('user.inactive')); ?></option>
                                        <option value="<?php echo e("block"); ?>" <?php echo e($user->status == "block" ? 'selected'  : ''); ?>><?php echo e(__('user.block')); ?></option>
                                    </select>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-2">

                                <div class="col-md-6">
                                   <label class="form-label" for="validationCustom03"><?php echo e(__('master.phone')); ?></label>
                                    <input class="form-control" id="validationCustom03" type="text" name="mobile"
                                        value="<?php echo e(Request::old('mobile') ? Request::old('mobile') : $user->mobile); ?>" required="" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom04"><?php echo e(__('master.email')); ?></label>
                                    <input class="form-control" id="validationCustom04" type="email" name="email"
                                        value="<?php echo e(Request::old('email') ? Request::old('email') : $user->email); ?>" required="" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>

                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom05"><?php echo e(__('master.password')); ?></label>
                                    <input class="form-control" id="validationCustom05" type="text" name="password"
                                        placeholder="***********" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>


                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault06"><?php echo e(__('role.role')); ?></label>
                                    <select class="form-select" id="validationDefault06" required="" name="roles_name" value="<?php echo e(Request::old('roles_name') ? Request::old('roles_name') : $user->roles_name); ?>">
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role); ?>"<?php echo e($user->roles_name == $role ? 'selected' : ''); ?>>
                                                <?php echo e($role); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\kemia-project\resources\views/dashboard/users/edit.blade.php ENDPATH**/ ?>