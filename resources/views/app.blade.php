<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Bundle with Popper -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <title>Hello, world!</title>


    <nav class="navbar navbar-dark bg-dark border border-warning">
        <div class="container">
            <a class="navbar-brand" href="../index">OnSite - Laravel</a>
            <a class="navbar-link" href="{{ route('activity-log.index') }}">Logs</a>

        </div>
    </nav>
</head>

<body class="text-white">
    @yield('content')
</body>

</html>
