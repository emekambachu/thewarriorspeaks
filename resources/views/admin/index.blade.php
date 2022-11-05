<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Admin | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/logo.png') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('/dashboard/assets/css/bootstrap.min.css') }}"
          id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/dashboard/assets/css/icons.min.css') }}"
          rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('/dashboard/assets/css/app.min.css') }}" id="app-style"
          rel="stylesheet" type="text/css" />

    <script src="{{ asset('/js/app.js') }}" defer></script>

</head>

<body data-sidebar="dark" data-layout-mode="light">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('/logo.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('/logo-dark.png') }}" alt="" height="17">
                        </span>
                    </a>

                    <a href="" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('/logo.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('/logo-dark.png') }}" alt="" height="19">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>

            <div class="d-flex">
                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                         aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user"
                             src="{{ asset('/dashboard/assets/images/users/avatar-1.jpg') }}"
                             alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">Admin</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                        <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Wallet</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="/admin/logout">
                            <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                            <span key="t-logout">Logout</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <div id="app">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu">Menu</li>

                        <li>
                            <router-link
                                class="waves-effect"
                                exact
                                :to="{ name: 'AdminDashboard'}">
                                <i class="bx bx-chat"></i>
                                <span key="t-dashboards">Dashboards</span>
                            </router-link>
                        </li>

                        <li>
                            <router-link
                                class="waves-effect"
                                exact
                                :to="{ name: 'AdminPodcast'}">
                                <i class="bx bx-radio"></i>
                                <span key="t-dashboards">Podcast</span>
                            </router-link>
                        </li>

                        <li>
                            <router-link
                                class="waves-effect"
                                exact
                                :to="{ name: 'AdminBlog'}"
                            >
                                <i class="bx bx-radio"></i>
                                <span key="t-dashboards">Blog</span>
                            </router-link>
                        </li>

                        <li>
                            <router-link
                                class="waves-effect"
                                exact
                                :to="{ name: 'AdminAuthor'}"
                            >
                                <i class="bx bx-radio"></i>
                                <span key="t-dashboards">Bio</span>
                            </router-link>
                        </li>

                        <li>
                            <router-link
                                class="waves-effect"
                                exact
                                :to="{ name: 'AdminLogout'}"
                            >
                                <i class="bx bx-radio"></i>
                                <span key="t-dashboards">Logout</span>
                            </router-link>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <!--For vue router view-->
                <router-view></router-view>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">{{ date('Y') }} © Amazon Warriors.</div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->
    </div>
</div>
<!-- END layout-wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ asset('/dashboard/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/dashboard/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('/dashboard/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('/dashboard/assets/libs/node-waves/waves.min.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('/dashboard/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- dashboard init -->
<script src="{{ asset('/dashboard/assets/js/pages/dashboard.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('/dashboard/assets/js/app.js') }}"></script>
</body>

</html>
