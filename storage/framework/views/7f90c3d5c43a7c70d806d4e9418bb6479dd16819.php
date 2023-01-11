

<?php $__env->startSection('title'); ?>
    <?php echo e(__('user.deleted_users')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('user.user')); ?></h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item active"><?php echo e(__('user.deleted_users')); ?></li>
    <?php echo $__env->renderComponent(); ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table-striped display table-bordered <?php if($users->count() == 0): ?> d-none <?php endif; ?>" id="responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('master.image')); ?></th>
                                        <th><?php echo e(__('master.name')); ?></th>
                                        <th><?php echo e(__('master.email')); ?></th>
                                        <th><?php echo e(__('master.phone')); ?></th>
                                        <th><?php echo e(__('master.view')); ?></th>
                                        <th><?php echo e(__('role.role')); ?></th>
                                        <th><?php echo e(__('master.status')); ?></th>
                                        <th><?php echo e(__('master.processes')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><img style="max-width: 100px;max-height: 100px;" src="<?php echo e($user->getFirstMediaUrl('user') != null ?  $user->getFirstMediaUrl('user') : asset('assets/images/dashboard/1.png')); ?>"></td>
                                            <td><?php echo e($user->name); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td><?php echo e($user->mobile); ?></td>
                                            <td><?php echo e($user->view); ?></td>
                                            <td><?php echo e(ucfirst($user->roles_name)); ?></td>
                                            <td class="text-center">
                                                <?php if($user->status == "active"): ?>
                                                    <h6><span class="badge badge-success"><?php echo e(ucfirst($user->status)); ?></span></h6>
                                                <?php elseif($user->status == "inactive"): ?>
                                                    <h6><span class="badge badge-info"><?php echo e(ucfirst($user->status)); ?></span></h6>
                                                
                                                <?php else: ?>
                                                    <h6><span class="badge badge-danger"><?php echo e(ucfirst($user->status)); ?></span></h6>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div style="display: flex;">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-restore')): ?>
                                                        <a class="btn btn-outline-success-2x" style="margin:0 20px;" href="<?php echo e(route('users.restore', $user->id)); ?>"><?php echo e(__('master.restore')); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-forceDelete')): ?>
                                                        <form action="<?php echo e(route('users.forceDelete', $user->id)); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('delete'); ?>
                                                            <input style="border-color: #d22d3d;" class="btn btn-outline-danger-2x" value="<?php echo e(__('master.permanent_delete')); ?>" type="submit"
                                                            onclick="return confirm('<?php echo e(__('user.permanent_delete')); ?> (<?php echo e($user->name); ?>)');">
                                                        </form>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="alert alert-secondary text-center h5"><?php echo e(__('user.empty_deleted_foresle_msg')); ?></div>
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
    <script src="<?php echo e(asset('assets/js/bootstrap/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap/bootstrap.min.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\kemia-project\resources\views/dashboard/users/delete.blade.php ENDPATH**/ ?>