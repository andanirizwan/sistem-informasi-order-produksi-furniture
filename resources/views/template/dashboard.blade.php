<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('titles')</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/icon-sidof.png')}}">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="{{asset('assets/vendors/css/base/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/css/base/elisyam-1.5.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/datatables/datatables.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body id="page-top">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="{{asset('assets/img/preloader-sidof.png')}}" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <div class="page">
            <!-- Begin Header -->
            <header class="header">
                <nav class="navbar fixed-top">         
                    
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                        <!-- Begin Logo -->
                        <div class="navbar-header">
                            <a href="/dashboard" class="navbar-brand">
                                <div class="brand-image brand-big">
                                    <img src="{{asset('assets/img/dashboard-sidof.png')}}" alt="logo" class="logo-big">
                                </div>
                                <div class="brand-image brand-small">
                                    <img src="{{asset('assets/img/logo.png')}}" alt="logo" class="logo-small">
                                </div>
                            </a>
                            <!-- Toggle Button -->
                            <a id="toggle-btn" href="#" class="menu-btn active">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <!-- End Toggle -->
                        </div>
                        <!-- End Logo -->
                        <!-- Begin Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                           
                            <!-- User -->
                            <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="{{asset('assets/img/preloader-sidof.png')}}" alt="..." class="avatar rounded-circle"></a>
                                <ul aria-labelledby="user" class="user-size dropdown-menu">
                                    <li class="welcome">
                                        <a href="#" class="edit-profil"><i class="la la-gear"></i></a>
                                        <img src="{{asset('assets/img/preloader-sidof.png')}}" alt="..." class="rounded-circle">
                                    </li>

                                    @if (Auth::user()->role == 'buyer')
                                         <li>
                                        <a href="/profile" class="dropdown-item"> 
                                            Profile
                                        </a>
                                    </li>
                                    
                                    @endif
                                   
                                    <li><a rel="nofollow" href="{{ route('logout') }}" class="dropdown-item logout text-center"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        ><i class="ti-power-off"></i></a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>
                                </ul>
                            </li>
                            <!-- End User -->
                            
                        </ul>
                        <!-- End Navbar Menu -->
                    </div>
                    <!-- End Topbar -->
                </nav>
            </header>
            <!-- End Header -->
            <!-- Begin Page Content -->
            <div class="page-content d-flex align-items-stretch">
                <div class="default-sidebar">
                    <!-- Begin Side Navbar -->
                    <nav class="side-navbar box-scroll sidebar-scroll">
                        <!-- Begin Main Navigation -->
                        @if (Auth::user()->role == 'buyer')
                        <ul class="list-unstyled">
                            <li><a href="/dashboard"><i class="la la-columns"></i><span>Dashboard</span></a></li>
                            <li><a href="#dropdown" aria-expanded="false" data-toggle="collapse"><i class="la la-file-pdf-o"></i><span>Purchase Order</span></a>
                                <ul id="dropdown" class="collapse list-unstyled pt-0">
                                    <li><a href="/po">Show</a></li>
                                    <li><a href="/po/create">Create</a></li>
                                </ul>
                            </li>
                            <li><a href="/laporan"><i class="la la-calendar"></i><span>Delivery Report</span></a></li>
                            <li><a href="/invoice"><i class="la la-file"></i><span>Invoice</span></a></li>
                            <li><a href="#dropdown1" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Account</span></a>
                                <ul id="dropdown1" class="collapse list-unstyled pt-0">
                                    <li><a href="/profile">Profile</a></li>
                                    <li><a href="/profile/password">change Password</a></li>
                                </ul>
                            </li>
                        </ul>
                        @elseif((Auth::user()->role == 'admin'))
                        <ul class="list-unstyled">
                        
                            <li><a href="/po"><i class="la la-file"></i><span>PO</span></a></li>
                            <li><a href="/spk"><i class="la la-folder"></i><span>SPK</span></a></li>
                            <li><a href="/laporan"><i class="la la-calendar"></i><span>Laporan</span></a></li>
                            <li><a href="/invoice"><i class="la la-file"></i><span>Invoice</span></a></li>
                            <li><a href="#dropdown1" aria-expanded="false" data-toggle="collapse"><i class="la la-users"></i><span>Users</span></a>
                                <ul id="dropdown1" class="collapse list-unstyled pt-0">
                                    <li><a href="/akun">Lihat</a></li>
                                    <li><a href="/akun/create">Tambah</a></li>
                                </ul>
                            </li>
                            <li><a href="/buyer"><i class="la la-user"></i><span>Buyer</span></a></li>
                        </ul>
                        @elseif((Auth::user()->role == 'data'))
                        <ul class="list-unstyled">
                        
                            <li><a href="#dropdown" aria-expanded="false" data-toggle="collapse"><i class="la la-folder"></i><span>SPK</span></a>
                                <ul id="dropdown" class="collapse list-unstyled pt-0">
                                    <li><a href="/spk">Lihat</a></li>
                                    <li><a href="/spk/create">Tambah</a></li>
                                </ul>
                            </li>
                            <li><a href="#dropdown1" aria-expanded="false" data-toggle="collapse"><i class="la la-database"></i><span>Barang</span></a>
                                <ul id="dropdown1" class="collapse list-unstyled pt-0">
                                    <li><a href="/barang">Lihat</a></li>
                                    <li><a href="/barang/create">Tambah</a></li>
                                </ul>
                            </li>
                            <li><a href="#dropdown2" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Account</span></a>
                                <ul id="dropdown2" class="collapse list-unstyled pt-0">
                                    <li><a href="/akun/password">change Password</a></li>
                                </ul>
                            </li>

                        </ul>
                        @elseif((Auth::user()->role == 'exim'))
                        <ul class="list-unstyled">
                        
                            <li><a href="#dropdown1" aria-expanded="false" data-toggle="collapse"><i class="la la-calendar"></i><span>Laporan</span></a>
                                <ul id="dropdown1" class="collapse list-unstyled pt-0">
                                    <li><a href="/laporan">Lihat</a></li>
                                    <li><a href="/laporan/create">Tambah</a></li>
                                </ul>
                            </li>
                            <li><a href="#dropdown" aria-expanded="false" data-toggle="collapse"><i class="la la-file"></i><span>Invoice</span></a>
                                <ul id="dropdown" class="collapse list-unstyled pt-0">
                                    <li><a href="/invoice">Lihat</a></li>
                                    <li><a href="/invoice/create">Tambah</a></li>
                                </ul>
                            </li>
                            <li><a href="#dropdown2" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Account</span></a>
                                <ul id="dropdown2" class="collapse list-unstyled pt-0">
                                    <li><a href="/akun/password">change Password</a></li>
                                </ul>
                            </li>

                        </ul>
                        @endif
                        
                        <!-- End Main Navigation -->
                    </nav>
                    <!-- End Side Navbar -->
                </div>
                <!-- End Left Sidebar -->
                <div class="content-inner">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        {{-- <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Blank Page</h2>
                                    <div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="db-all.html"><i class="ti ti-home"></i></a></li>
                                            <li class="breadcrumb-item active">Blank</li>
                                        </ul>
                                    </div>	                            
                                </div>
                            </div>
                        </div> --}}
                        <!-- End Page Header -->
                        <!-- Begin Row -->
                        <div class="row flex-row">
                            <div class="col-xl-12 col-12">
                                <div class="widget has-shadow">
                                    @yield('content')
                                    
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Container -->
                    <!-- Begin Page Footer-->
                    <footer class="main-footer fixed-footer">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                                <p class="text-gradient-02">Design By Saerox</p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="documentation.html">Documentation</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="changelog.html">Changelog</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                    <!-- End Page Footer -->
                    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
                    <!-- Offcanvas Sidebar -->
                    <div class="off-sidebar from-right">
                        <div class="off-sidebar-container">
                            <header class="off-sidebar-header">
                                <ul class="button-nav nav nav-tabs mt-3 mb-3 ml-3" role="tablist" id="weather-tab">
                                    <li><a class="active" data-toggle="tab" href="#messenger" role="tab" id="messenger-tab">Messages</a></li>
                                    <li><a data-toggle="tab" href="#today" role="tab" id="today-tab">Today</a></li>
                                </ul>
                                <a href="#off-canvas" class="off-sidebar-close"></a>
                            </header>
                            <div class="off-sidebar-content offcanvas-scroll auto-scroll">
                                <div class="tab-content">
                                    
                                    <!-- Begin Today -->
                                    <div role="tabpanel" class="tab-pane fade" id="today" aria-labelledby="today-tab">
                                        <!-- Begin Today Stats -->
                                        <div class="sidebar-heading pt-0">Today</div>
                                        <div class="today-stats mt-3 mb-3">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <i class="la la-users"></i>
                                                    <div class="counter">264</div>
                                                    <div class="heading">Clients</div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="la la-cart-arrow-down"></i>
                                                    <div class="counter">360</div>
                                                    <div class="heading">Sales</div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="la la-money"></i>
                                                    <div class="counter">$ 4,565</div>
                                                    <div class="heading">Earnings</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Today Stats -->
                                        <!-- Begin Friends -->
                                        <div class="sidebar-heading">Friends</div>
                                        <div class="quick-friends mt-3 mb-3">
                                            <ul class="list-group w-100">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-02.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Brandon Smith</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-03.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Louis Henry</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-04.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Nathan Hunter</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-05.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Megan Duncan</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-06.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Beverly Oliver</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Friends -->
                                        <!-- Begin Settings -->
                                        <div class="sidebar-heading">Settings</div>
                                        <div class="quick-settings mt-3 mb-3">
                                            <ul class="list-group w-100">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Notifications Email</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Notifications Sound</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox">
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Chat Message Sound</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Settings -->
                                    </div>
                                    <!-- End Today -->
                                </div>
                            </div>
                            <!-- End Offcanvas Container -->
                        </div>
                        <!-- End Offsidebar Container -->
                    </div>
                    <!-- End Offcanvas Sidebar -->
                </div>
                <!-- End Content -->
            </div>
            <!-- End Page Content -->
        </div>
        <!-- Begin Vendor Js -->
        <script src="{{asset('assets/vendors/js/base/jquery.min.js')}}"></script>
        <script src="{{asset('assets/vendors/js/base/core.min.js')}}"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="{{asset('assets/vendors/js/nicescroll/nicescroll.min.js')}}"></script>
        <script src="{{asset('assets/vendors/js/app/app.min.js')}}"></script>
        <script src="{{asset('assets/vendors/js/calendar/moment.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
        <script src="{{asset('assets/vendors/js/datatables/datatables.min.js')}}"></script>
          <!-- End Page Vendor Js -->

          @stack('scripts')
          @stack('scripts1')
        
    </body>
</html>