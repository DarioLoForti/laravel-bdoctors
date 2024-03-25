@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- NAME --}}

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- SURNAME --}}

                            <div class="mb-4 row">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- ADDRESS --}}

                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- EMAIL --}}

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- PASSWORD --}}

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- PASSWORD CONFIRM --}}

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            {{-- CITY --}}

                            <div class="mb-4 row">
                                <label for="city"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Città') }}</label>

                                <div class="col-md-6">
                                    <input id="city" class="form-control @error('city') is-invalid @enderror" name="city" required value="{{ old('city') }}">

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- PHONE MUMBER --}}
                            
                            <div class="mb-4 row">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Numero di Telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required value="{{ old('phone') }}">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- CURRICULUM --}}
        
                            <div class="form-group mb-3">
        
                                <label for="cv">Curriculum Vitae:</label>
                                <input type="file" name="cv" id="cv" class="form-control">
        
                                @error('cv')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
        
                            {{-- IMMAGINE --}}
        
                            <div class="form-group mb-3">
        
                                <label for="image">Foto:</label>
                                <input type="file" name="image" id="image" class="form-control">
        
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
        
                            {{-- SPECIALIZZAZIONI --}}
        
                            <div class="form-group mb-3">
                                <label for="" class="control-label  ">Specializzazioni</label>
                                <div>
                                    @foreach ($specializations as $specialization)
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="specializations[]"
                                                id="specialization-{{ $specialization->id }}" value="{{ $specialization->id }}"
                                                @checked(is_array(old('specializations')) && in_array($specialization->id, old('specializations')))>
                                            <label for="" class="form-check-label ">{{ $specialization->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
        
                            {{-- PRESTAZIONI --}}
        
                            {{-- <div class="form-group mb-3">
                                <label for="" class="control-label  ">Specializzazioni</label>
                                <div>
                                    @foreach ($services as $service)
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="services[]"
                                                id="service-{{ $service->id }}" value="{{ $service->id }}"
                                                @checked(is_array(old('services')) && in_array($service->id, old('services')))>
                                            <label for="" class="form-check-label ">{{ $service->nome }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}
                            
                            <div class="form-group mb-3">
                                <label class="" for="services">Prestazioni:</label>
                                <textarea class="form-control" name="services" id="services" cols="30" rows="10"
                                    placeholder="inserisci le tue prestazioni">{{ old('services') }}</textarea>
                                @error('services')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
