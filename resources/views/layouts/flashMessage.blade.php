@if ($flash = session('message'))
    <div class="container">
        <div id="flash-message" class="alert alert-success" role="alert">
            {{ $flash }}
        </div>
    </div>
@endif