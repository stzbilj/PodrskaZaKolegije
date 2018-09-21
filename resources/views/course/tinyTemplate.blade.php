@extends ('layouts.app')

@section('header-scripts')
<script src="{{ asset('js/tinymce.js') }}"></script>   
@endsection
@section('content')
    @if ( ( Auth::check() && Auth::user()->isAdmin( $courseId ) ) )
        <textarea>
            {{ $content }}
        </textarea>
    @else
        {{ $content }}
    @endif
@endsection