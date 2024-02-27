<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/mdb/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2-bootstrap-5-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui-1.13.2/jquery-ui.theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui-1.13.2/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/timepicker/jquery.timepicker.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"> --}}

    <script src="{{ asset('assets/plugins/jquery-ui-1.13.2/external/jquery/jquery.js') }}"></script>
    <title>Q_HIMS | {{ $title ?? '' }}</title>
</head>

<body>
    <div class="app-body">
        <div class="app-col-navigation">
            @include('app-layout.navigation')
        </div>
        <div class="app-col-main">
            @include('app-layout.navbar')
            <div class="container-fluid pb-4 ">
                @yield('content')
            </div>
        </div>
    </div>
    @include('hims.modals.book_appointment')
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui-1.13.2/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/plugins/timepicker/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
    </script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/mdb/js/mdb.min.js') }}"></script>
    <script src="{{ asset('assets/index.js') }}"></script>
    @yield('script')
    <script></script>
</body>

</html>
