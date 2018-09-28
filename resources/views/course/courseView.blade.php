@extends ('layouts.app')

@section('header-scripts')
<script src="{{ asset('js/tinymce.js') }}"></script>   
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            @if ( ( Auth::check() && Auth::user()->isAdmin( $course_view->course_id ) ) )
            <form action="{{ route('courseview.update', ['course' => $course_view->course_id, 'type' => $course_view->type]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="content">
                        {!! $course_view->view !!}
                    </textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Spremi</button>
                </div>
            </form>    
            @else
            {!! $course_view->view !!}
            @endif
            @if ( $course_view->updated_at )
            <p class="blog-post-meta">Zadnja izmjena: {{ $course_view->updated_at->format('d.m.Y H:i') }} </p>
            @endif
        </main>
    </div>
</div>
@endsection