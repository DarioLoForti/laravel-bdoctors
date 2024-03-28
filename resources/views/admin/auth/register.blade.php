@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between text-myblu">
                        Registrati
                        <span>I campi contrassegnati con l'asterisco sono obbligatori.</span>
                    </div>
                    <div id="error-container" class="alert alert-danger" style="display: none"></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- NAME --}}

                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right text-myblu">{{ __('Nome') }}
                                    <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required maxlength="50" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- SURNAME --}}

                            <div class="mb-4 row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right text-myblu">{{ __('Cognome') }}
                                    <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required maxlength="50" autocomplete="surname"
                                        autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- ADDRESS --}}

                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right text-myblu">{{ __('Indirizzo') }}
                                    <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required maxlength="150" autocomplete="address"
                                        autofocus>
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
                                    class="col-md-4 col-form-label text-md-right text-myblu">{{ __('Indirizzo Email') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required maxlength="255" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- PASSWORD --}}

                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right text-myblu">{{ __('Password') }}
                                    <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required minlength="8" autocomplete="new-password">

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
                                    class="col-md-4 col-form-label text-md-right text-myblu">{{ __('Conferma Password') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required minlength="8" autocomplete="new-password">
                                </div>
                            </div>

                            {{-- CITY --}}

                            <div class="mb-4 row">
                                <label for="city" class="col-md-4 col-form-label text-md-right text-myblu">{{ __('Città') }}
                                    <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="city" class="form-control @error('city') is-invalid @enderror"
                                        name="city" required maxlength="150" value="{{ old('city') }}">

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
                                    class="col-md-4 col-form-label text-md-right text-myblu">{{ __('Numero di Telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- CURRICULUM --}}

                            <div class="form-group mb-3">

                                <label for="cv" class="text-myblu">Curriculum Vitae:</label>
                                <input type="file" name="cv" id="cv" class="form-control ">

                                @error('cv')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- IMMAGINE --}}

                            <div class="form-group mb-3">

                                <label for="image" class="text-myblu">Foto:</label>
                                <input type="file" name="image" id="image" class="form-control">

                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- SPECIALIZZAZIONI --}}

                            <div class="form-group mb-3">
                                <div class="dropdown mb-2">
                                    <a class="btn btn-primary dropdown-toggle " href="#Spec" role="button"
                                        data-bs-toggle="collapse" aria-controls="Spec" aria-expanded="true">
                                        Specializzazioni
                                    </a>
                                    <span class="text-danger">*</span>
                                </div>
                                <div id="Spec" class="collapse multi-collapse m-1">
                                    <div class="container">
                                        <div class="row  ">
                                            @foreach ($specializations as $specialization)
                                                <div class="col-4 ">
                                                    <div class="form-check-inline">
                                                        <input class="form-check-input " type="checkbox" name="specializations[]"
                                                            id="specialization-{{ $specialization->id }} "
                                                            @checked(is_array(old('specializations')) && in_array($specialization->id, old('specializations'))) value="{{ $specialization->id }}">
                                                        <label for="specialization"
                                                            class="form-check-label ">{{ $specialization->name }}
                                                        </label>
                                                    </div>
            
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
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
                                <label class="text-myblu" for="services">Prestazioni:</label>
                                <textarea wrap="soft" class="form-control" name="services" id="services" cols="30" rows="10"
                                    placeholder="Inserisci le tue prestazioni">{{ old('services') }}</textarea>
                                @error('services')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function(event) {
                const name = document.getElementById('name').value.trim();
                const surname = document.getElementById('surname').value.trim();
                const address = document.getElementById('address').value.trim();
                const email = document.getElementById('email').value.trim();
                const password = document.getElementById('password').value.trim();
                const confirmPassword = document.getElementById('password-confirm').value.trim();
                const city = document.getElementById('city').value.trim();
                const phone = document.getElementById('phone').value.trim();
                const cv = document.getElementById('cv').value.trim();
                const image = document.getElementById('image').value.trim();
                const specializations = document.querySelectorAll(
                    'input[name="specializations[]"]:checked');

                let errors = [];

                if (name === '') {
                    errors.push('Il campo Nome è obbligatorio.');
                } else if (name.length > 50) {
                    errors.push('Il campo Nome non può superare i 50 caratteri.');
                }


                if (surname === '') {
                    errors.push('Il campo Cognome è obbligatorio.');
                } else if (surname.length > 50) {
                    errors.push('Il campo Cognome non può superare i 50 caratteri.');
                }


                if (address === '') {
                    errors.push('Il campo Indirizzo è obbligatorio.');
                } else if (address.length > 150) {
                    errors.push('Il campo Indirizzo non può superare i 150 caratteri.');
                }


                if (email === '') {
                    errors.push('Il campo Indirizzo Email è obbligatorio.');
                }


                if (password === '') {
                    errors.push('Il campo Password è obbligatorio.');
                } else if (password.length < 8) {
                    errors.push('La password deve contenere almeno 6 caratteri.');
                }


                if (confirmPassword === '') {
                    errors.push('Il campo Conferma Password è obbligatorio.');
                } else if (password !== confirmPassword) {
                    errors.push('Le password non corrispondono.');
                }


                if (city === '') {
                    errors.push('Il campo Città è obbligatorio.');
                } else if (city.length > 150) {
                    errors.push('Il campo Città non può superare i 150 caratteri.');
                }


                if (phone !== '' && isNaN(phone)) {
                    errors.push('Il campo Numero di Telefono accetta solo valori numerici.');
                }


                if (image !== '' && !isImage(image)) {
                    errors.push('Puoi inserire solo un file di tipo immagine.');
                }


                if (cv !== '' && !isPdf(cv)) {
                    errors.push('Puoi inserire solo file di tipo .pdf');
                }

                if (specializations.length === 0) {
                    errors.push('Devi selezionare almeno una specializzazione.');
                }

                console.log(errors);

                if (errors.length > 0) {
                    event.preventDefault();

                    let errorContainer = document.getElementById('error-container');
                    errorContainer.innerHTML = '';

                    errors.forEach(function(error) {
                        const errorElement = document.createElement('div');
                        errorElement.textContent = error;
                        errorContainer.appendChild(errorElement);
                    });
                    errorContainer.style.display = 'block';

                    window.scrollTo(0, 0);
                } else {

                    errorContainer.style.display = 'none';
                }

            });





            function isImage(filename) {
                const extension = filename.split('.').pop().toLowerCase();
                return ['jpg', 'jpeg', 'png'].includes(extension);
            }


            function isPdf(filename) {
                const extension = filename.split('.').pop().toLowerCase();
                return ['pdf'].includes(extension);
            }

        });
    </script>
@endsection
