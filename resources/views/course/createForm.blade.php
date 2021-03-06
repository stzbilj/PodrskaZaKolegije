@extends ('layouts.app')

@section('header-scripts')
<script type="text/javascript" src="{{ asset('/plugins/Select2/js/select2.min.js')}}" defer></script>

<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/Select2/css/select2.min.css')}}"/>
@endsection

@section('content')
<main class="py-4">
    @include('layouts.flashMessage')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Kreiraj novi kolegij</h4>
                <hr>
                <form action="{{ route('course.store') }}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Ime kolegija') }}</label>
                        
                        <div class="col-md-5">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                            
                            @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="show" class="col-md-3 col-form-label text-md-right">{{ __('Voditelj stranice kolegija') }}</label>
                            
                            <div class="col-md-5">
                                <input id="show" class="form-control" value="{{ auth()->user()->name }} {{ auth()->user()->surname }}" disabled>
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="users" class="col-md-3 col-form-label text-md-right">{{ __('Dodatni voditelji kolegija') }}</label>
                        
                        <div class="col-md-9">
                                <select id="users" class="custom-select select2" name="users[]" multiple="multiple">
                                    @foreach ($professors as $professor)
                                    @if (auth()->user()->id !== $professor->id)
                                    <option value={{ $professor->id }}>{{ $professor->name }} {{ $professor->surname }}</option>
                                    @endif
                                    @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="orientation" class="col-md-3 col-form-label text-md-right">{{ __('Smjerovi') }}</label>
                        <div class="col-md-8">
                            @foreach ($programmes as $programm)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="programms[]" id="programmCheck{{ $programm->id }}" value="{{ $programm->id }}">
                                <label class="custom-control-label" for="programmCheck{{ $programm->id }}">{{ $programm->name }}; {{ $programm->type }} {{ __('studij') }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exams" class="col-md-3 col-form-label text-md-right">{{ __('Vrste ispita') }}</label>
                        <div class="col-md-8">
                            @foreach ($exams as $exam)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="exams[]" id="examCheck{{ $exam->id }}" value="{{ $exam->id }}">
                                <label class="custom-control-label" for="examCheck{{ $exam->id }}">{{ $exam->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                        
                    <div class="form-group row mb-0 justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Kreiraj') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@section('footer-scripts')
<script src="{{ asset('js/select2.js') }}" defer></script>
@endsection