<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/index.css') }}">
    <title>Q_HIMS | {{ $title ?? '' }}</title>
</head>

<body>
    <div class="app-body">
        <div class="app-col-navigation">
            @include('app-layout.navigation')
        </div>
        <div class="app-col-main">
            @include('app-layout.navbar')
            <div class="app-container">
                <h2>Hello, you are welcome to Laravel, the lovely PHP framework</h2>
            </div>
        </div>
    </div>
</body>

</html>
