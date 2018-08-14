<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sticky-footer.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include ('layouts.navbar')

        <main class="py-4">
            @if ($flash = session('message'))
                <div class="container">
                    <div id="flash-message" class="alert alert-success" role="alert">
                        {{ $flash }}
                    </div>
                </div>
            @endif

            @yield('content')
        </main>

        @include ('layouts.footer')
    </div>

    @yield('page-script')
</body>
</html>
