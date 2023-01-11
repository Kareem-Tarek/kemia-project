

<?php $__env->startSection('title'); ?>
    <?php echo e(__('setting.setting')); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('setting.setting')); ?></h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item active"><?php echo e(__('setting.setting')); ?></li>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table-striped display table-bordered <?php if($settings->count() == 0): ?> d-none <?php endif; ?>   " id="responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('setting.user_name')); ?></th>
                                        <th><?php echo e(__('setting.title')); ?></th>
                                        <th><?php echo e(__('setting.description')); ?></th>
                                        <th><?php echo e(__('setting.short_description')); ?></th>
                                        <th><?php echo e(__('setting.phone')); ?></th>
                                        <th><?php echo e(__('setting.phone2')); ?></th>
                                        <th><?php echo e(__('setting.email')); ?></th>
                                        <th><?php echo e(__('setting.whatsApp')); ?></th>
                                        <th><?php echo e(__('setting.facebook')); ?></th>
                                        <th><?php echo e(__('setting.twitter')); ?></th>
                                        <th><?php echo e(__('setting.instagram')); ?></th>

                                        <th><?php echo e(__('master.processes')); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($setting->user->name ?? __('master.null')); ?></td>
                                            <td><?php echo e($setting->title); ?></td>
                                            <td><?php echo e($setting->description ?? __('master.null')); ?></td>
                                            <td><?php echo e($setting->short_description ?? __('master.null')); ?></td>
                                            <td><?php echo e($setting->phone); ?></td>
                                            <td><?php echo e($setting->phone2); ?></td>
                                            <td><?php echo e($setting->email); ?></td>
                                            <td><a href="http://wa.me/+20<?php echo e($setting->whatsApp); ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></td>
                                            <td><a href="<?php echo e($setting->facebook ?? 'javascript:void(0)'); ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a></td>
                                            <td><a href=" <?php echo e($setting->twitter ?? 'javascript:void(0)'); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></td>
                                            <td><a href="<?php echo e($setting->instagram ?? 'javascript:void(0)'); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></td>
                                            <td>
                                                <div style="display: flex;">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting-edit')): ?>
                                                        <a class="btn btn-outline-primary-2x" style="margin:0 20px;"
                                                            href="<?php echo e(route('settings.edit', $setting->id)); ?>"><?php echo e(__('master.edit')); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting-delete')): ?>
                                                        <form action="<?php echo e(route('settings.destroy', $setting->id)); ?>" method="post">
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
                                            <div class="alert alert-secondary text-center h5"><?php echo e(__('setting.index_forelse_loop_empty_msg_1')); ?> <a href="<?php echo e(route('settings.create')); ?>" class="text-decoration-underline fw-bold text-dark"><?php echo e(__('setting.index_forelse_loop_empty_msg_2')); ?></a> <?php echo e(__('setting.index_forelse_loop_empty_msg_3')); ?></div>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\kemia-project\resources\views/dashboard/settings/index.blade.php ENDPATH**/ ?>