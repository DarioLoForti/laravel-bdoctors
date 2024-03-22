@extends('layouts.style')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ url('admin') }}"><button class="btn btn-square btn-primary mt-2"><i
                            class="fa-solid fa-hand-point-left" style="color: #ffffff;"></i></button></a>
                <h2 class="text-center text-myblu mt-2">Modifica il tuo profilo</h2>
            </div>
            <div class="col-12">
                <form action="{{ route('admin.doctors.update', $doctor->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label class="" for="address">Città:</label>
                        <input type="text" class="form-control" name="city" id="city"
                            placeholder="inserisci la tua Città" value="{{ $doctor->user->city }}">
                        @error('city')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        {{-- <label class="" for="address">Indirizzo:</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="address"
                            value="{{ $doctor->user->address }}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                        <div class="form-group mb-4">
                            <label class="" for="telephone">Telefono:</label>
                            <input type="text" class="form-control" name="telephone" id="telephone"
                                placeholder="telephone" value="{{ $doctor->telephone }}">
                            @error('telephone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- CURRICULUM --}}

                        @if ($doctor->cv != null)
                            <div>
                                <img src="{{ asset('storage/' . $doctor->cv) }}">
                            </div>
                        @endif

                        <div class="form-group mb-3">

                            <label for="cv">Curriculum Vitae:</label>
                            <input type="file" name="cv" id="cv" class="form-control">

                            @error('cv')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- IMMAGINE --}}

                        @if ($doctor->image != null)
                            <div>
                                <img src="{{ asset('storage/' . $doctor->image) }}">
                            </div>
                        @endif

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
                                            id="specialization-{{ $specialization->id }}"
                                            value="{{ $specialization->id }}" @checked(is_array(old('specializations')) && in_array($specialization->id, old('specializations')))>
                                        <label for="specialization"
                                            class="form-check-label ">{{ $specialization->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="" for="services">Prestazioni:</label>
                        <textarea class="form-control" name="services" id="services" cols="30" rows="10"
                            placeholder="inserisci le tue prestazioni"></textarea>
                        @error('services')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- PRESTAZIONI --}}

                    {{-- <div class="form-group mb-3">
                        <label for="" class="control-label text-white ">Specializzazioni</label>
                        <div>
                            @foreach ($services as $service)
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="services[]"
                                        id="service-{{ $service->id }}" value="{{ $service->id }}"
                                        @checked(is_array(old('services')) && in_array($service->id, old('services')))>
                                    <label for="" class="form-check-label text-white">{{ $service->nome }}</label>
                                </div>
                            @endforeach
                        </div> --}}
            </div>

            {{-- BTN SAVE --}}
            <div class="button d-flex justify-content-center">
                <div class="form-group my-3">
                    <button class="btn btn-success" type="submit">Salva</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
