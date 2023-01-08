<!DOCTYPE html>
<html lang="en" dir="<?php echo e(App::getLocale() == 'ar' ? 'rtl' : 'ltr'); ?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kater ">
    <meta name="keywords" content="Kater">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo e(asset('site')); ?>/assets/images/2448648.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo e(asset('site')); ?>/assets/images/2448648.png assets/images/2448648.png"
        type="image/x-icon">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- Font Awesome-->
    <?php if ($__env->exists('layouts.admin.partials.css')) echo $__env->make('layouts.admin.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<<<<<<< Updated upstream
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" 
=======
    <link
        href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"
>>>>>>> Stashed changes
        rel="stylesheet">
</head>

<body class="dark-only <?php echo e(App::getLocale() == 'ar' ? 'rtl' : 'ltr'); ?>">
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-sidebar" id="pageWrapper">
        <!-- Page Header Start-->
        <?php if ($__env->exists('layouts.admin.partials.header')) echo $__env->make('layouts.admin.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Page Header Ends -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-icon">
            <!-- Page Sidebar Start-->
            <?php if ($__env->exists('layouts.admin.partials.sidebar')) echo $__env->make('layouts.admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('dashboard.alert.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <!-- Container-fluid starts-->
                <?php echo $__env->yieldContent('content'); ?>
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
<<<<<<< Updated upstream
                        <div class="col-md-12 footer-copyright">
                            <p class="mb-0">Copyright 2022-2023 © by 
                                <a href="http://wa.me/+201065858355">Baraa Samy</a> <i class="fa-brands fa-whatsapp"></i> &nbsp;—&nbsp; 
                                <a href="http://wa.me/+201150100104">Mohamed Samy</a> <i class="fa-brands fa-whatsapp"></i> &nbsp;—&nbsp; 
                                <a href="http://wa.me/+201010110457">Kareem Tarek</a> <i class="fa-brands fa-whatsapp"></i> &nbsp;—&nbsp;
                                <a href="http://wa.me/+201112554996">Ahmed Khalifa</a> <i class="fa-brands fa-whatsapp"></i>
=======
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright 2022-2023 © by
                                <a href="http://wa.me/01150100104">Mohamed Samy</a>,
                                <a href="http://wa.me/01010110457">Kareem Tarek</a> &
                                <a href="http://wa.me/01112554996">Ahmed Khalifa</a>
>>>>>>> Stashed changes
                            </p>
                        </div>
                        
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- latest jquery-->
    <?php if ($__env->exists('layouts.admin.partials.js')) echo $__env->make('layouts.admin.partials.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH D:\laragon\www\kemia-project\resources\views/layouts/admin/master.blade.php ENDPATH**/ ?>