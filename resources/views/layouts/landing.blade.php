<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Simutu Lab - Sistem Informasi Manajemen Mutu Laboratorium</title>
        <meta name="author" content="infotech">
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{asset('media/favicons/favicon.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('media/favicons/favicon-192x192.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('media/favicons/apple-touch-icon-180x180.png')}}">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="{{ mix('/css/oneui.css') }}">
        <link rel="stylesheet" href="{{asset('js/plugins/sweetalert2/sweetalert2.min.css')}}">
        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <div id="page-loader" class="show"></div>
        <div id="page-container" class="sidebar-dark side-scroll page-header-fixed page-header-dark main-content-boxed">
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="font-w600 text-dual" href="">
                        <i class="fa fa-circle-notch text-primary"></i>
                        <span class="smini-hide">
                            <span class="font-w700 font-size-h5">Simutu Lab.</span>
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div>
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-times"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
                <!-- END Side Header -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="#">
                                <i class="nav-main-link-icon si si-home"></i>
                                <span class="nav-main-link-name">Home</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="//infotech.umm.ac.id/" target="_blank">
                                <i class="nav-main-link-icon fa fa-laptop-code"></i>
                                <span class="nav-main-link-name">I-Lab</span>
                            </a>
                        </li>                        
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <!-- Logo -->
                        <a class="font-w600 text-dual mr-3" href="">
                            <i class="fa fa-circle-notch text-primary"></i>
                            <span class="font-w700 font-size-h5">Simutu Lab.</span>
                        </a>
                        <!-- END Logo -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="d-flex align-items-center">
                        <!-- Menu -->
                        <div class="d-none d-lg-block">
                            <ul class="nav-main nav-main-horizontal nav-main-hover">
                                <li class="nav-main-item">
                                    <a class="nav-main-link active" href="#">
                                        <i class="nav-main-link-icon si si-home"></i>
                                        <span class="nav-main-link-name">Home</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="//infotech.umm.ac.id/" target="_blank">
                                        <i class="nav-main-link-icon fa fa-laptop-code"></i>
                                        <span class="nav-main-link-name">I-Lab</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Menu -->

                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-sm btn-dual d-lg-none ml-1" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary-lighter">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-circle-notch fa-spin text-primary"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Hero -->
                <div class="bg-image" style="background-image: url('{{asset('media/photos/quality.png')}}');">
                    <div class="bg-primary-dark-op py-6 overflow-hidden">
                        <div class="content content-full text-center">
                            <h2 id="title-simutu" class="display-5 font-w600 text-white mb-2 js-animation-object animated invisible">
                                Sistem Informasi Manajemen Mutu Laboratorium Informatika
                            </h2>
                            <p id="desc-simutu" class="font-size-h4 font-w400 text-white-50 mb-5 js-animation-object animated invisible">
                                Deskripsi SIMUTU
                            </p> 
                            <span class="d-inline-block">
                                <button type="button" class="btn btn-primary px-3 py-2 push" data-toggle="modal" data-target="#modal-praktikkan">
                                <i class="fa fa-fw fa-user-graduate mr-1"></i> Praktikkan</button>
                            </span>
                            <br>
                            <span class="ml-2 mr-2 mb-2 ml-lg-0 d-inline-block">
                                <a class="btn btn-dark px-3 py-2" href="#">
                                    <i class="fa fa-fw fa-chalkboard-teacher mr-1"></i> Instruktur / Asisten
                                </a>
                            </span>
                        </div>
                        
                        <p class="font-size-h6 font-w400 text-white-50 mb-5 text-center">
                                Developed with <i class="fa fa-heart text-danger"></i> by Research Division Infotech
                                <br>
                                Informatics Laboratory <br>
                                University of Muhammadiyah Malang &copy; <span data-toggle="year-copy"></span>
                            </p>
                    </div>
                </div>
                <!-- END Hero -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
        <div class="modal fade" id="modal-praktikkan" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popout" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Login Praktikkan</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                        <form action="{{route('praktikkan.login.post')}}" method="POST">
                            @csrf
                            <p>Gunakan Username berupa NIM dan Password sesuai dengan akun I-Lab</p>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">                                    
                                    <span class="input-group-text">
                                        <i class="far fa-user"></i>
                                    </span>
                                    </div>
                                    <input type="number" min="0" class="form-control" name="username" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="si si-key"></i>
                                    </span>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Login</button>
                        </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- OneUI JS -->
        <script src="{{asset('js/oneui.core.min.js')}}"></script>
        <script src="{{ mix('js/oneui.app.js') }}"></script>
        <script src="{{asset('js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
        <script>
            $( document ).ready(function() {
                One.loader('show');
                setTimeout(function(){
                    One.loader('hide');
                    setTimeout(function(){
                        $("#title-simutu").removeClass('invisible').addClass( " fadeIn" );
                    }, 500);
                    setTimeout(function(){
                        $("#desc-simutu").removeClass('invisible').addClass( " fadeIn" );
                        @if(Session::get('status'))
                            Swal.fire(
                                '{{Session::get('status')}}',
                                '',
                                'error'
                            )
                        @endif
                    }, 1000);
                },700);
            });
        </script>
    </body>
</html>
