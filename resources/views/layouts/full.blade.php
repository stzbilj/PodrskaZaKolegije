<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Justified Nav Template for Bootstrap</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/sticky-footer.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            @include ('layouts.navbar')
        
            @yield ('content')
        </div>
        
        @include ('layouts.footer')
        
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
