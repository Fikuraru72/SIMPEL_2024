<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/css/vendor.bundle.base.css') }}">

    <!-- endinject -->
    <!-- plugin css for this page -->
    {{-- <link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"> --}}
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <!-- endinject -->
    {{-- <link rel="shortcut icon" href="{{ asset('template/assets/images/favicon.ico') }}" /> --}}

    {{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('css')
    @stack('styles')
</head>

<body>
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        @include('layouts.user.headeruser')
    </nav>

    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            @include('layouts.user.sidebaruser')
        </nav>

        <div class="main-panel">
            <div class="content-wrapper">
                @include('layouts.user.breaduser')
                @yield('content')
            </div>
            <div class="row">
                @include('layouts.user.footeruser')
            </div>
        </div>
    </div>

    <!-- plugins:js -->

    <!-- plugins:js -->
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('template/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/chart.js/chart.umd.js') }}"></script>
    {{-- <script src="{{ asset('template/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script> --}}
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('template/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('template/assets/js/template.js') }}"></script>
    <script src="{{ asset('template/assets/js/settings.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('template/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('template/assets/js/proBanner.js') }}"></script>

    <!-- End custom js for this page-->
    <script src="{{ asset('template/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script> --}}

    <script>
        /*for sending token laravel CSRF in every ajax request from meta tag above*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @stack('js')
</body>


</html>
