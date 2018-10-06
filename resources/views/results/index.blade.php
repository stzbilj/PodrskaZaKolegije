@extends ('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1>Rezultati</h1>
    
            <div class="col-sm-12 blog-main">
                @if ( Auth::check() && Auth::user()->isAdmin( $course ) )
                @include('results.create')
                @include('results.adminShow')  
                @else
                @include('results.studentShow')
                @endif
            </div>
            @includeWhen(( Auth::check() && Auth::user()->isAdmin( $course ) ), 'layouts.deleteModal')
        </main>
    </div>
</div>
@endsection

@section('footer-scripts')
<script src="{{ asset('js/modalDelete.js') }}" defer></script>
@endsection
