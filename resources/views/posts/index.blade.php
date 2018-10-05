@extends ('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1>Obavijesti</h1>
    
            <div class="col-sm-12 blog-main">
                @includeWhen(( Auth::check() && Auth::user()->isAdmin( $course->id ) ), 'posts.create')
                @foreach ($posts as $post)
                @include('posts.show')
                @endforeach
                {{ $posts->links('vendor.pagination.bootstrap-4')}}
            </div>
            @includeWhen(( Auth::check() && Auth::user()->isAdmin( $course->id ) ), 'posts.editModal')
            @includeWhen(( Auth::check() && Auth::user()->isAdmin( $course->id ) ), 'layouts.deleteModal')
        </main>
    </div>
</div>
@endsection

@section('footer-scripts')
<script src="{{ asset('js/modalPosts.js') }}" defer></script>
<script src="{{ asset('js/modalDelete.js') }}" defer></script>
@endsection
