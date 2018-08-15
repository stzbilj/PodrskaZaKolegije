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
                    <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Adresa') }}</label>
                    
                    <div class="col-md-4">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        
                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Smjerovi') }}</label>
                    <div class="col-md-8">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                        </div>
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