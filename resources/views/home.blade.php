@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Dobrođošli!</h1>
                <p>
                    Ovo su stranice za podršku kolegijima
                </p>
            <div class="list-group list-group-flush">
                @foreach($courses as $course)
                <a href="{{ route('course.show', ['course' => $course['id']]) }}" class="list-group-item list-group-item-action">
                    {{ $course['name'] }}
                </a>
                 @endforeach    
            </div>
        </div>
    </div>
</div>
@endsection