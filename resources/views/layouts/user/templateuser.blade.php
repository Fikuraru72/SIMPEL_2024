<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('tamplate/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('tamplate/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('tamplate/assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('tamplate/assets/images/favicon.ico') }}" />

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
    <script src="{{ asset('tamplate/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('tamplate/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('tamplate/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('tamplate/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('tamplate/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('tamplate/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('tamplate/assets/js/template.js') }}"></script>
    <script src="{{ asset('tamplate/assets/js/settings.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('tamplate/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('tamplate/assets/js/proBanner.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="{{ asset('tamplate/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>

    @stack('js')
</body>

</html>
