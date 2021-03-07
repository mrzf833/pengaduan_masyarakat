<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Document</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        .nav-item hr{
            margin: 0;
            border: 2px solid #707070;
            transition: 0.5s;
            transform: scale(0)
        }
        .nav-item.active hr{
            transform: scale(0.6)
        }
        .nav-item:hover hr{
            transform: scale(0.6)
        }

        .alert-custom{
            z-index: 10000;
            position: absolute;
            top: 3px;
            right: 3px;
        }
    </style>
    @yield('css')
</head>
<body class="vh-100" style="background-color:#AFAFAF">
    @include('masyarakat.layouts.navbar')
    @if (Session::has('success') === true)
    <div class="alert-custom alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif(Session::has('failed') === true)
    <div class="alert-custom alert alert-Danger alert-dismissible fade show" role="alert">
        <strong>Failed! </strong> {{ Session::get('failed') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif(count($errors) > 0)
    <div class="alert-custom alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Danger! </strong> 
        <br><br>
        @forelse ($errors->messages() as $index => $values)
            <strong>{{ $index }}</strong>
            <ul>
                @foreach ($values as $value)
                    <li>{{ $value }}</li>
                @endforeach
            </ul>
        @empty
            
        @endforelse
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div id="content-wrapper" class="d-flex flex-column">
            @yield('content')
    </div>
    <script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>
    @yield('script')
</body>
</html>