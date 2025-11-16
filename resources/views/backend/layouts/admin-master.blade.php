<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ $title ?? 'Dashboard | Tapeli - Responsive Admin Dashboard Template' }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend') }}/assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('backend') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="{{ asset('backend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

    <!-- body start -->
    <body data-menu-color="light" data-sidebar="default">

        <!-- Begin page -->
        <div id="app-layout">


            <!-- Topbar Start -->
            @include('backend/partials/topbar')
            <!-- end Topbar -->

            <!-- Left Sidebar Start -->

            @include('backend/partials/sidebar')

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
               @yield('admin')
               <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="text-center col fs-13 text-muted">
                                &copy; <script>document.write(new Date().getFullYear())</script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">Zoyothemes</a> 
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="{{ asset('backend') }}/assets/libs/jquery/jquery.min.js"></script>
        <script src="{{ asset('backend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('backend') }}/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('backend') }}/assets/libs/node-waves/waves.min.js"></script>
        <script src="{{ asset('backend') }}/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="{{ asset('backend') }}/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="{{ asset('backend') }}/assets/libs/feather-icons/feather.min.js"></script>

        <!-- Apexcharts JS -->
        <script src="{{ asset('backend') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- for basic area chart -->
        <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

        <!-- Widgets Init Js -->
        <script src="{{ asset('backend') }}/assets/js/pages/analytics-dashboard.init.js"></script>

        <!-- App js-->
        <script src="{{ asset('backend') }}/assets/js/app.js"></script>

    </body>
</html>