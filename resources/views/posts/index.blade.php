@extends ('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1>Obavijesti</h1>
    
            <div class="col-sm-12 blog-main">
                @if ( ( Auth::check() && Auth::user()->isAdmin( $course->id ) ) )
                @include('posts.create')
                @endif
                @foreach ($posts as $post)
                @include('posts.show')
                @endforeach
                {{ $posts->links('vendor.pagination.bootstrap-4')}}
            </div>
            @if ( ( Auth::check() && Auth::user()->isAdmin( $course ) ) )
                @include('posts.editModal')
                @include('posts.deleteModal')
            @endif
        </main>
    </div>
</div>
@endsection

@section('footer-scripts')
<script src="{{ asset('js/modal.js') }}" defer></script>
@endsection
