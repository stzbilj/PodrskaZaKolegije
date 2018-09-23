@extends ('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1>Obavijesti</h1>
    
            <div class="col-sm-12 blog-main">
                @if ( ( Auth::check() && Auth::user()->isAdmin( $course->id ) ) )
                <h2 class="blog-post-title">Nova obavijest</h2>
                <form method="POST" action="{{ route('posts.store', ['course' => $course->id]) }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input id="title" type="text" class="form-control" name="title" placeholder="Ovdje upišite naslov" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea id="note" class="form-control" rows="5" name="note" placeholder="Ovdje upišite tekst obavijesti" required></textarea>
                    </div>
                    <div class="form-group row">
                        <div class = "col-sm-2">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Objavi') }}
                            </button>
                        </div>
                    </div>
                </form>
                @endif
                @foreach ($posts as $post)
                <div class="blog-post">
                    <h2 class="blog-post-title">{{ $post->title}}</h2>
                    <p class="blog-post-meta"><strong>{{ $post->user->name}} {{ $post->user->surname}}</strong>, {{ $post->updated_at->format('d.m.Y H:i')}}</p>
                    <p>{{ $post->note }}</p>
                </div>
                <hr>
                @endforeach
                {{ $posts->links('vendor.pagination.bootstrap-4')}}
            </div>
        </main>
    </div>
</div>
@endsection