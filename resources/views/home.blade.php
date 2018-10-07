@extends ('layouts.app')

@section('content')
<main class="py-4">
    @include('layouts.flashMessage')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Dobrođošli!</h1>
                    <p>
                        Ovo su stranice za podršku kolegijima
                    </p>
                    <form action="{{ route('home') }}" method="GET">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <select name="programm" class="form-control" id="programm">
                                <option value="0" selected>Svi smjerovi</option>
                                @foreach ($programmes as $programm)
                                <option value="{{$programm->id}}" {{ ($programm->id == request()->programm) ? 'selected' : ''}}>{{ $programm->name }}, {{ $programm->type }} studij</option>
                                @endforeach
                            </select>
                        </div>
                        <div clas="col-md-2">
                            <button type="submit" class="btn btn-primary">Filtriraj</button>
                        </div>
                    </div>
                    </form>
                <div class="list-group list-group-flush">
                    @foreach($courses as $course)
                    <a href="{{ route('course.show', ['course' => $course->id]) }}" class="list-group-item list-group-item-action list-group-item-light bg-light">
                        {{ $course->name }}
                    </a>
                    @endforeach    
                </div>
                {{ $courses->links('vendor.pagination.bootstrap-4')}}
            </div>
        </div>
    </div>
</main>
@endsection