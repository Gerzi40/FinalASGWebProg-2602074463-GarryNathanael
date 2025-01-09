<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connect Friend</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        html, body {
            height: 100%;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
        }
        .navbar {
            padding: 0.5rem 1rem;
        }

        .navbar .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar .form-control {
            max-width: 250px;
        }

        .navbar .btn {
            margin-left: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        @include('layout_guest.header')

        @yield('content')

        @include('layout_guest.footer')
        </footer>
    </div>
</body>
</html>