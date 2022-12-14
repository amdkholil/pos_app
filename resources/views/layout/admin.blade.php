<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>{{ isset($title) ? $title : 'Majoo Admin' }}</title>

    <!-- Fontfaces CSS-->
    <link href="/assets/css/tailwind.min.css" rel="stylesheet" media="all">
    <link href="/assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
        media="all">
    <link href="/assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/assets/css/theme.css" rel="stylesheet" media="all">
    @stack('head')

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="https://majoo.id/assets/img/main-logo.png" class="h-12" alt="Majoo" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                @include('layout.menu')
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="ml-auto header-button">
                                <div class="ml-auto account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <i class="fas fa-user fa-2x  "></i>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <i class="fas fa-user fa-4x  "></i>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{auth()->user()->name}}</a>
                                                    </h5>
                                                    <span class="email">{{auth()->user()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="/logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>add item</button>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                        </div> --}}

                        @yield('content')

                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

        </div>
        <!-- END PAGE CONTAINER-->
    </div>

    @stack('modal')
    <div class="position-fix fixed-bottom text-center bg-green-800 text-white">
        <p>Copyright &copy; 2022 Majoo. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
    </div>

    <!-- Jquery JS-->
    <script src="/assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/assets/vendor/slick/slick.min.js"></script>
    <script src="/assets/vendor/wow/wow.min.js"></script>
    <script src="/assets/vendor/animsition/animsition.min.js"></script>
    <script src="/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="/assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/assets/vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="/assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/assets/vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="/assets/js/main.js"></script>
    @stack('script')

</body>

</html>
