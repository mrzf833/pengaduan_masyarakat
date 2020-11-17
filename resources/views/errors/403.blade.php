<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
    
                <!-- Main Content -->
                <div id="content">
    
    
                    <!-- Begin Page Content -->
                    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    
                        <!-- 404 Error Text -->
                        <div class="text-center">
                            <div class="error mx-auto" data-text="403">403</div>
                            <p class="lead text-gray-800 mb-5 text-capitalize">{{ $exception->getMessage() }}</p>
                            <a href="{{ route('home') }}">&larr; Back to Home</a>
                        </div>
    
                    </div>
                    <!-- /.container-fluid -->
    
                </div>
                <!-- End of Main Content -->
    
            </div>
            <!-- End of Content Wrapper -->
    
        </div>
        <!-- End of Page Wrapper -->
    
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>
</body>
</html>