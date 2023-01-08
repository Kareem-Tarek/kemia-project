<?php if(session('success')): ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: "<?php echo e(session('success')); ?>",
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php $__env->stopPush(); ?>
<?php elseif(session('error')): ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: "<?php echo e(session('error')); ?>",
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php if($errors->any()): ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',

                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    text : '<?php echo $error; ?>',
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH E:\laragon\www\kemia\resources\views/dashboard/alert/alert.blade.php ENDPATH**/ ?>