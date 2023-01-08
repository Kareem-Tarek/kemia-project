

<?php $__env->startSection('title'); ?>
    E-labclub | الصلاحيات
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('role.role')); ?></h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item active"><?php echo e(__('role.role')); ?></li>
    <?php echo $__env->renderComponent(); ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table-striped display table-bordered" id="responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('master.name')); ?></th>

                                        <th><?php echo e(__('master.processes')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($role->name); ?></td>

                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>
                                                    <a class="btn btn-outline-primary-2x"
                                                        href="<?php echo e(route('roles.edit', $role->id)); ?>"><?php echo e(__('master.edit')); ?></a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-delete')): ?>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']); ?>

                                                    <?php echo Form::submit(__('master.delete'), ['class' => 'btn btn-outline-danger-2x', 'style' => 'border-width: 2px !important;border-color: #d22d3d !important;color: #d22d3d !important;background-color: transparent !important;']); ?>

                                                    <?php echo Form::close(); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/bootstrap/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap/bootstrap.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\kemia-project\resources\views/dashboard/roles/index.blade.php ENDPATH**/ ?>