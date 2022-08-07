<!DOCTYPE html>
<html>

<head>
    <title>Laravel</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/validation/form-validation.css')}}">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/bootstrap.css')}}"> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/bootstrap-extended.css')}}"> -->
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/validation/form-validation.css')}}"> -->
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body {
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }

        .navbar-laravel {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .04);
        }

        .navbar-brand,
        .nav-link,
        .my-form,
        .login-form {
            font-family: Raleway, sans-serif;
        }

        .my-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .my-form .row {
            margin-left: 0;
            margin-right: 0;
        }

        .login-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .login-form .row {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @if (\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.register') }}">Registers</a>
                    </li>
                    @endif
                </ul>

            </div>
        </div>
    </nav>

    @yield('content')

    <script src="{{asset('assets/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('assets/validation/form-validation.js')}}"></script>
    @yield('script')

</body>

</html>