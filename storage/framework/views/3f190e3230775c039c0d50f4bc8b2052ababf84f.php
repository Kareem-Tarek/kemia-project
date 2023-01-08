

<?php $__env->startSection('title'); ?>
    laravel 9
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('role.add_role')); ?></h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('roles.index')); ?>"><?php echo e(__('role.role')); ?></a></li>
        <li class="breadcrumb-item active"><?php echo e(__('role.add_role')); ?></li>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5><?php echo e(__('role.add_role')); ?></h5>

                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post" action="<?php echo e(route('roles.store')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('role.add_role')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name" />
                                </div>

                            </div>

                            <div class="row g-1 ">
                                <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-check">
                                            <div class="checkbox p-0">
                                                <input class="form-check-input" id="<?php echo e($value->id); ?>" type="checkbox"
                                                    name="permission[]" value="<?php echo e($value->id); ?>" />
                                                <label class="form-check-label"
                                                    for="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\kemia\resources\views/dashboard/roles/create.blade.php ENDPATH**/ ?>