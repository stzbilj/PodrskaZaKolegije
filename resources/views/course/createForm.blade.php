@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Kreiraj novi kolegij</h4>
            <hr>
            <form action="{{ route('course.store') }}" method="post">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Ime kolegija') }}</label>
                    
                    <div class="col-md-4">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        
                        @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Smjerovi') }}</label>
                    <div class="col-md-8">
                        @foreach ($programmes as $programm)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck{{ $programm->id }}" value="{{ $programm->id }}">
                            <label class="custom-control-label" for="customCheck{{ $programm->id }}">{{ $programm->name }}; {{ $programm->type }} {{ __('studij') }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                      
                <div class="form-group row mb-0 justify-content-center">
                    <div class="col-md-6 col-md-offset-3">    
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Kreiraj') }}
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection