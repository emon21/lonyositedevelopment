<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? 'Dashboard | - Admin Dashboard' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend') }}/assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('backend') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ asset('backend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- Datatables css -->
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />

    <!-- bootstrap-icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Quill css -->
    <link href="{{ asset('backend') }}/assets/libs/quill/quill.core.js" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        .logo-circle {
            width: 40px;
            height: 40px;
            background-color: #343a40;
            /* Dark background */
            color: #fff;
            /* Text color */
            font-weight: bold;
            font-size: 18px;
            border-radius: 50%;
            /* Makes it circular */
            text-align: center;
            line-height: 40px;
            /* Vertically center the text */
        }
    </style>

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
                            &copy;
                            <script>document.write(new Date().getFullYear())</script> - Made with <span
                                class="mdi mdi-heart text-danger"></span> by <a href="#!"
                                class="text-reset fw-semibold">Dev Hasib</a>
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


    <!-- Datatables js -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <!-- dataTables.bootstrap5 -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

    <!-- buttons.colVis -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>

    <!-- buttons.bootstrap5 -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>

    <!-- dataTables.keyTable -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js"></script>

    <!-- dataTable.responsive -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script
        src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

    <!-- dataTables.select -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-select-bs5/js/select.bootstrap5.min.js"></script>

    <!-- Datatable Demo App Js -->
    <script src="{{ asset('backend') }}/assets/js/pages/datatable.init.js"></script>

    <!-- Apexcharts JS -->
    <script src="{{ asset('backend') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- for basic area chart -->
    <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

    <!-- Widgets Init Js -->
    <script src="{{ asset('backend') }}/assets/js/pages/analytics-dashboard.init.js"></script>

    <!-- App js-->
    <script src="{{ asset('backend') }}/assets/js/app.js"></script>

    <!-- axios cdn -->
    {{--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js"></script> --}}

    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    {{--
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
    <script>

    </script>

    <!-- Toastr js-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        // @if(Session::has('message'))

            //     // var type = "{{ Session::get('alert-type', 'info') }}";
            //     // var title = "{{ Session::get('title', '') }}";
            //     // var message = "{{ Session::get('message') }}";


            //         var type = "{{ Session::get('alert-type', 'info') }}"
            //         switch (type) {

            //             //  toastr.info(message, title); toastr.success(" {{ Session::get('message') }} ");
            //             break;
            //             case 'info':
            //                 toastr.info(message, title);
            //                 break;

            //             case 'success':
            //                 toastr.success(message, title);
            //                 break;

            //             case 'warning':
            //                 toastr.warning(message, title);
            //                 break;

            //             case 'error':
            //                 toastr.error(" {{ Session::get('message', 'title') }} ");
            //                 break;
            //         }
        // @endif 


        @if(Session::has('message'))
            toastr["{{ Session::get('alert-type') }}"](
                "{{ Session::get('message') }}",
                "{{ Session::get('title') }}"
            );
        @endif

            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                var title = "{{ Session::get('title') }}";
                var message = "{{ Session::get('message') }}";

                switch (type) {
                    case 'info':
                        toastr.info(message, title);
                        break;

                    case 'success':
                        toastr.success(message, title);
                        break;

                    case 'warning':
                        toastr.warning(message, title);
                        break;

                    case 'error':
                        toastr.error(message, title);
                        break;
                }
            @endif

    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Custom js-->
    <script src="{{ asset('backend') }}/assets/js/custom.js"></script>
    <!-- validate js -->
    <script src="{{ asset('backend') }}/assets/js/validate.min.js"></script>

    <!-- Quill Editor Js -->
    <script src="{{ asset('backend') }}/assets/libs/quill/quill.core.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/quill/quill.min.js"></script>
    <!-- Quill Demo Js -->
    <script src="{{ asset('backend') }}/assets/js/pages/quilljs.init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

    <script>
        // $(function () {
        //     $(document).on('click', '#delete', function (e) {
        //         e.preventDefault();
        //         // var link = $(this).attr("form");
        //         const link = this.getAttribute("href");
        //         const url = this.dataset.url;

        //         Swal.fire({
        //             title: 'Are you sure?',
        //             text: "Delete This Data?",
        //             icon: 'warning',
        //             showCancelButton: true,
        //             confirmButtonColor: '#3085d6',
        //             cancelButtonColor: '#d33',
        //             confirmButtonText: 'Yes, delete it!'
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 window.location.href = url;
        //                 // window.location.this.submit();
        //                 Swal.fire(
        //                     'Deleted!',
        //                     'Your file has been deleted.',
        //                     'success'
        //                 )
        //             }
        //         })
        //     });
        // });

        // Delete Function on Sweet alert


        //     function Delete(){
        //          // All delete buttons
        // const deleteButtons = document.querySelectorAll(".delete-btn");

        // deleteButtons.forEach(button => {
        //     button.addEventListener("click", function (e) {
        //         e.preventDefault();

        //         const link = this.getAttribute("href");

        //         Swal.fire({
        //             title: "Are you sure?",
        //             text: "Delete This Data?",
        //             icon: "warning",
        //             showCancelButton: true,
        //             confirmButtonColor: "#3085d6",
        //             cancelButtonColor: "#d33",
        //             confirmButtonText: "Yes, delete it!"
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 // Redirect to delete link
        //                 window.location.href = link;

        //                 // Show loading spinner
        //                 Swal.fire({
        //                     title: "Deleting...",
        //                     text: "Please wait!",
        //                     allowOutsideClick: false,
        //                     didOpen: () => {
        //                         Swal.showLoading();
        //                     }
        //                 });
        //             }
        //         });
        //     });
        // });

        //     }


        // document.addEventListener("DOMContentLoaded", function () {

        //     const deleteButtons = document.querySelectorAll(".delete-btn");

        //     deleteButtons.forEach(button => {

        //         button.addEventListener("click", function (e) {
        //             e.preventDefault();

        //             const link = this.getAttribute("form");
        //             const link = this.getAttribute("form");

        //             Swal.fire({
        //                 title: "Are you sure?",
        //                 text: "Delete This Data?",
        //                 icon: "warning",
        //                 showCancelButton: true,
        //                 confirmButtonColor: "#3085d6",
        //                 cancelButtonColor: "#d33",
        //                 confirmButtonText: "Yes, delete it!"
        //             }).then((result) => {

        //                 if (result.isConfirmed) {
        //                     window.location.this.submit();
        //                 }

        //             });

        //         });

        //     });

        // });


        // 

        // function deleteItem(deleteUrl) {

        //     // Swal.fire({
        //     //     title: "Are you sure?",
        //     //     text: "This data will be permanently deleted!",
        //     //     icon: "warning",
        //     //     showCancelButton: true,
        //     //     confirmButtonColor: "#3085d6",
        //     //     cancelButtonColor: "#d33",
        //     //     confirmButtonText: "Yes, delete it!"
        //     // }).then((result) => {

        //     //     if (result.isConfirmed) {
        //     //         window.location.href = deleteUrl;
        //     //     }

        //     // });


        //                 Swal.fire({
        //                 title: "Are you sure?",
        //                 text: "Delete This Data?",
        //                 icon: "warning",
        //                 showCancelButton: true,
        //                 confirmButtonColor: "#3085d6",
        //                 cancelButtonColor: "#d33",
        //                 confirmButtonText: "Yes, delete it!"
        //             }).then((result) => {

        //                 if (result.isConfirmed) {
        //                     window.location.this.submit();
        //                 }

        //             });

        // }


        document.addEventListener("DOMContentLoaded", function () {

            const deleteButtons = document.querySelectorAll(".delete-btn");

            deleteButtons.forEach(button => {

                button.addEventListener("click", function (e) {
                    e.preventDefault();

                    // ⬇️ YOUR LINE
                    const link = this.getAttribute("href");

                    Swal.fire({
                        title: "Are you sure?",
                        text: "Restore Feature data?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, Restore"
                    }).then((result) => {

                        if (result.isConfirmed) {
                            window.location.href = link;
                        }

                    });

                });

            });

        });

    </script>

    @stack('scripts')

</body>

</html>