<!DOCTYPE html>
<html lang="en" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kater ">
    <meta name="keywords" content="Kater">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('site') }}/assets/images/2448648.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('site') }}/assets/images/2448648.png assets/images/2448648.png"
        type="image/x-icon">
    <title>@yield('title')</title>
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
    @includeIf('layouts.admin.partials.css')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" 
        rel="stylesheet">
</head>

<body class="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-sidebar" id="pageWrapper">
        <!-- Page Header Start-->
        @includeIf('layouts.admin.partials.header')
        <!-- Page Header Ends -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-icon">
            <!-- Page Sidebar Start-->
            @includeIf('layouts.admin.partials.sidebar')
            @include('dashboard.alert.alert')
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <!-- Container-fluid starts-->
                @yield('content')
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 footer-copyright">
                            <p class="mb-0">Copyright 2022-2023 © by 
                                <a href="http://wa.me/+201065858355">Baraa Samy</a> <i class="fa-brands fa-whatsapp"></i> &nbsp;—&nbsp; 
                                <a href="http://wa.me/+201150100104">Mohamed Samy</a> <i class="fa-brands fa-whatsapp"></i> &nbsp;—&nbsp; 
                                <a href="http://wa.me/+201010110457">Kareem Tarek</a> <i class="fa-brands fa-whatsapp"></i> &nbsp;—&nbsp;
                                <a href="http://wa.me/+201112554996">Ahmed Khalifa</a> <i class="fa-brands fa-whatsapp"></i>
                            </p>
                        </div>
                        {{-- <div class="col-md-6">
                            <p class="pull-right mb-0"></p>
                        </div> --}}
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- latest jquery-->
    @includeIf('layouts.admin.partials.js')
</body>

</html>
