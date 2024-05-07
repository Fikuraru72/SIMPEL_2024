<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin Pro</title>
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

    {{-- Datatables --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @stack('css')


</head>

<body>

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        @include('layouts.header')
    </nav>

    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            @include('layouts.sidebar')
        </nav>

        <div class="main-panel">
            <div class="content-wrapper">
                @include('layouts.bread')
                @yield('content')
            </div>
        </div>
    </div>

    <div class="row">
        @include('layouts.footer')
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
    <script src="{{ asset('tamplate/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('tamplate/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('tamplate/assets/js/proBanner.js') }}"></script>

    <!-- End custom js for this page-->
    <script src="{{ asset('tamplate/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>

    <!-- Chart js -->
    <script src="{{ asset('tamplate/assets/vendors/chart.js/chart.umd.js') }}""></script>

    <!-- Custom chart js for this page-->
    <script src="{{ asset('tamplate/assets/js/chart.js') }}"></script>
    <!-- End custom chart js for this page-->

    <!-- Datatables & Pluggin -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_font.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        /*for sending token laravel CSRF in every ajax request from meta tag above*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    {{-- use for call custom js from push('js') command in each view --}}
    @stack('js')


</body>

</html>
