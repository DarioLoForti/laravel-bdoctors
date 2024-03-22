@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <h2 class="text-center  my-4">Crea il tuo profilo</h2>
            </div>
            <div class="col-12">
                <form action="{{ route('admin.doctors.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label class="" for="address">Città:</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="city"
                            value="{{ $doctor->user->city }}">
                        @error('city')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="" for="address">Indirizzo:</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="address"
                            value="{{ $doctor->user->address }}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label class="" for="telephone">Telefono:</label>
                        <input type="text" class="form-control" name="telephone" id="telephone" placeholder="telephone"
                            value="{{ $doctor->telephone }}">
                        @error('telephone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- CURRICULUM --}}

                    @if ($doctor->image != null)
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

                    {{-- <div class="form-group mb-3">
                        <label for="" class="control-label text-white ">Specializzazioni</label>
                        <div>
                            @foreach ($speciliazations as $speciliazation)
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="speciliazations[]"
                                        id="speciliazation-{{ $speciliazation->id }}" value="{{ $speciliazation->id }}"
                                        @checked(is_array(old('speciliazations')) && in_array($speciliazation->id, old('speciliazations')))>
                                    <label for=""
                                        class="form-check-label text-white">{{ $speciliazation->nome }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}
                    <div class="form-group mb-3">
                        <label class="" for="service">Prestazioni:</label>
                        <textarea class="form-control" name="service" id="service" cols="30" rows="10"></textarea>
                        @error('service')
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

            <div class="form-group my-3">
                <button class="btn btn-success" type="submit">Salva</button>
            </div>
            </form>
            <a href="{{ route('admin.doctors.index') }}" class="btn btn-sm btn-primary float-end">Torna al dashboard</a>
        </div>
    </div>
    </div>
@endsection
