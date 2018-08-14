@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4 mt-1">{{ __('Registracija') }}</h4>
                    <hr>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ __('Ime') }}</label>
                                    
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                    
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="surname">{{ __('Prezime') }}</label>

                                    <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required>

                                    @if ($errors->has('surname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                         </div>

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Adresa') }}</label>

                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Lozinka') }}</label>

                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Potvrdite lozinku') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">{{ __('Uloga') }}</label>

                                    <select name="role" id="role" onChange="checkOption(this)" class="form-control">
                                        <option value="0" 
                                            @if ( old('role') === "0" ))
                                                selected @endif>
                                            {{__('Profesor')}}
                                        </option>
                                        <option value="1"
                                            @if ( old('role') === "1" ))
                                                selected 
                                            @endif>
                                            {{__('Student')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jmbag">{{ __('JMBAG') }}</label>

                                    <input id="jmbag" type="text" class="form-control{{ $errors->has('jmbag') ? ' is-invalid' : '' }}" name="jmbag" value="{{ old('jmbag') }}" 
                                    @if ( old('role') !== "1") disabled @endif>

                                    @if ($errors->has('jmbag'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('jmbag') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Registriraj se') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('page-script')
    <script src="{{ asset('js/register.js') }}" defer></script>
@endsection
