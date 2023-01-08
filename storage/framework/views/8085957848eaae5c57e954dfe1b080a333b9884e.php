

<?php $__env->startSection('title'); ?>
    <?php echo e(__('product.product') ?? 'Product translation error'); ?>

<?php $__env->stopSection(); ?>



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
                        <div class="table-responsive">

                            <table class="table-striped display table-bordered <?php if($all_products->count() == 0): ?> d-none <?php endif; ?>   " id="responsive">
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

                                        <th><?php echo e(__('master.processes')); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->title.'.img'); ?>" width="100"></td>
                                            <td><?php echo e($product->title); ?></td>
                                            <td class="text-center">
                                                <?php if($product->discount <= 0 || $product->discount == null): ?>
                                                    —
                                                <?php else: ?>
                                                    <span class="product-discount-index text-light bg-dark p-1 rounded">
                                                        <?php echo e($product->discount * 100); ?>%
                                                    </span>
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

                                            <td class="<?php if($product->keywords == null): ?> text-center <?php endif; ?>">
                                                <?php echo e($product->keywords ?? '—'); ?>

                                            </td>

                                            <td class="<?php if($product->description == null): ?> text-center <?php endif; ?>">
                                                <?php echo e(Str::words($product->description, 7, '...') ?? '—'); ?>

                                            </td>

                                            <td class="<?php if($product->meta_description == null): ?> text-center <?php endif; ?>">
                                                <?php echo e($product->meta_description ?? '—'); ?>

                                            </td>
                                            
                                            <td>
                                                <?php if($product->category->parent_id == null): ?>
                                                    <?php echo e($product->category->name); ?>

                                                <?php else: ?>
                                                    (<?php echo e($product->category->name); ?>) &RightArrow; <?php echo e($product->category->parent_id ?? __('master.ull')); ?>

                                                <?php endif; ?>
                                            </td>
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

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="alert alert-secondary font-weight-bold text-center h5">No Products Yet <a href="<?php echo e(route('products.create')); ?>" class="text-decoration-underline text-dark">Please add product</a> and come back</div>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\kemia-project\resources\views/dashboard/products/index.blade.php ENDPATH**/ ?>