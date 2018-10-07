@extends ('layouts.app')

@section('header-scripts')
<script type="text/javascript" src="{{ asset('/plugins/Select2/js/select2.min.js')}}" defer></script>

<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/Select2/css/select2.min.css')}}"/>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <h1>Uređivanje</h1>
    
            <div class="col-sm-12 blog-main">
                <form action="{{ route('course.update', ['course' => $course]) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Ime kolegija') }}</label>
                        
                        <div class="col-md-5">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $course->name) }}" required>
                            
                            @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="users" class="col-md-3 col-form-label text-md-right">{{ __('Voditelji kolegija') }}</label>
                        
                        <div class="col-md-9">
                                <select id="users" class="custom-select select2" name="users[]" multiple="multiple">
                                    @foreach ($professors as $professor)
                                    <option value="{{ $professor->id }}"  {{ in_array($professor->id, $admins) ? 'selected' : ''}}>{{ $professor->name }} {{ $professor->surname }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="orientation" class="col-md-3 col-form-label text-md-right">{{ __('Smjerovi') }}</label>
                        <div class="col-md-8">
                            @foreach ($programmes as $programm)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="programms[]" id="programmCheck{{ $programm->id }}" value="{{ $programm->id }}" {{ in_array($programm->id, $selected_programms) ? 'checked' : ''}}>
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
                                <input type="checkbox" class="custom-control-input" name="exams[]" id="examCheck{{ $exam->id }}" value="{{ $exam->id }}" {{ in_array($exam->id, $selected_exams) ? 'checked' : ''}}>
                                <label class="custom-control-label" for="examCheck{{ $exam->id }}">{{ $exam->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                        
                    <div class="form-group row mb-0 justify-content-center">
                        <div>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Izmjeni') }}
                            </button>
                            <button id="delete-item" class="btn btn-danger" data-text="Jeste li sigurni da želite pobrisati kolegij {{ $course->name }} i sve njegove podatke?" data-action="{{route('course.destroy', ['course' => $course->id])}}">Izbriši</button>
                        </div>
                    </div>
                </form>
            </div>
            @include('layouts.deleteModal')
        </main>
    </div>
</div>
@endsection

@section('footer-scripts')
<script src="{{ asset('js/select2.js') }}" defer></script>
<script src="{{ asset('js/modalDelete.js') }}" defer></script>
@endsection
