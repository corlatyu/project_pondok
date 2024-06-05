<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template -->
    <link href="{{asset('adminsb/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('adminsb/css/sb-admin-2.min.css')}}" rel="stylesheet">
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('dashboard.layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('dashboard.layouts.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="text-center">
                        <span>Place sticky footer content here.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

        <!-- Include Modals Outside of the Table -->

    @include('dashboard.modal.logout')


    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('adminsb/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('adminsb/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript -->
    <script src="{{asset('adminsb/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages -->
    <script src="{{asset('adminsb/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('adminsb/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('adminsb/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('adminsb/js/demo/chart-pie-demo.js')}}"></script>

    <!-- Add this in the head or before the closing body tag -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>
