<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('theme/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/vendor.bundle.base.css')}}">


    <link rel="stylesheet" href="{{asset('theme/style.css')}}">

    <script src="{{asset('plugins/fontaweson/fontaws.js')}}" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    @yield('styles')
    <style>
        .fa {
            margin-left: 1%;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        <!-- include('partial.admin.navbar') -->
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            @include('partial.admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @include('partial.admin.alert')

                    @yield('content')

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                @include('partial.admin.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('theme/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('theme/js/off-canvas.js')}}"></script>
    <script src="{{asset('theme/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('theme/js/misc.js')}}"></script>
    <script src="{{asset('theme/js/settings.js')}}"></script>
    <script src="{{asset('theme/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
    @yield('scripts')
</body>

</html>