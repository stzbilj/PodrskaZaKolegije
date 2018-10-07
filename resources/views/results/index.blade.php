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
                <hr />
                @include('results.adminShow')  
                @elseif (Auth::check() && Auth::user()->isStudent( ))
                    @if ($results->count() === 0)
                            <p>Trenutno nema rezultata za prikaz</p>
                    @else
                        @include('results.studentShow')
                    @endif
                @endif
            </div>
            @includeWhen(( Auth::check() && Auth::user()->isAdmin( $course ) ), 'results.editModal')
            @includeWhen(( Auth::check() && Auth::user()->isAdmin( $course ) ), 'layouts.deleteModal')
        </main>
    </div>
</div>
@endsection

@section('footer-scripts')
<script src="{{ asset('js/modalResults.js') }}" defer></script>
<script src="{{ asset('js/modalDelete.js') }}" defer></script>
@endsection
