

<?php $__env->startSection('title'); ?>
    <?php echo e(__('product.product') ?? 'Product translation error'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatable-extension.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/prism.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('product.product')); ?></h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item active"><?php echo e(__('product.product')); ?></li>
    <?php echo $__env->renderComponent(); ?>

    

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-ext table-responsive">

                            <table class="display" id="responsive">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo e(__('product.image')); ?></th>
                                        <th><?php echo e(__('product.title')); ?></th>
                                        <th><?php echo e(__('product.discount')); ?></th>
                                        <th><?php echo e(__('product.price')); ?> (<?php echo e(__('product.egyptian_currency')); ?>)</th>
                                        <th><?php echo e(__('product.keywords')); ?></th>
                                        <th><?php echo e(__('product.description')); ?></th>
                                        <th><?php echo e(__('product.meta_description')); ?></th>
                                        <th><?php echo e(__('product.product_category')); ?></th>
                                        <th><?php echo e(__('product.product_sub_category')); ?></th>

                                        <th><?php echo e(__('master.processes')); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->title.'.img'); ?>" width="90"></td>
                                            <td><?php echo e($product->title); ?></td>
                                            <td class="text-center">
                                                <?php if($product->discount <= 0 || $product->discount == null): ?>
                                                    —
                                                <?php else: ?>
                                                    <?php echo e($product->discount * 100); ?>%
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($product->discount <= 0 || $product->discount == null): ?>
                                                    <?php echo e($product->price); ?>

                                                <?php else: ?>
                                                    <del class="text-danger"><?php echo e($product->price); ?></del> 
                                                    <span class="text-primary">&RightArrow;</span> 
                                                    <span class="text-success"><?php echo e($product->price - ($product->price * $product->discount)); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($product->keywords ?? __('master.null')); ?></td>
                                            <td><?php echo e($product->description ?? __('master.null')); ?></td>
                                            <td><?php echo e($product->meta_description ?? __('master.null')); ?></td>
                                            <td><?php echo e($product->category->name ?? __('master.null')); ?></td>
                                            <td><?php echo e($product->category->parent_id ?? __('master.null')); ?></td>
                                            <td>
                                                <div style="display: flex;">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-edit')): ?>
                                                        <a class="btn btn-outline-primary-2x" style="margin:0 20px;"
                                                            href="<?php echo e(route('products.edit', $product->id)); ?>"><?php echo e(__('master.edit')); ?></a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-delete')): ?>
                                                        <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="post">
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/jszip.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/pdfmake.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/vfs_fonts.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.print.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/custom.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/prism/prism.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/clipboard/clipboard.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/custom-card/custom-card.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\kemia\resources\views/dashboard/products/index.blade.php ENDPATH**/ ?>