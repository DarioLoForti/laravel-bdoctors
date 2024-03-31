@extends('layouts.style')
@section('content')
    <div class="container rounded raised-effect my-3">
        <div class="row">
            <div class="container my-3 bg-white rounded">
                <div class="row mb-5 ">

                    {{-- UPDATE & DELETE BUTTONS --}}
                    <div class="col-8 my-5 d-flex align-items-center ">
                        <h1 class="">Dr. {{ $doctor->user->name }} {{ $doctor->user->surname }}</h1>
                    </div>

                    <div class="col-4 justify-content-end d-flex align-items-center ">
                        <div class="d-flex justify-content-start  pt-2">
                            <a href="{{ url('admin') }}" class="">
                                <button class="btn btn-square btn-primary ">
                                    <i class="fa-solid fa-hand-point-left" style="color: #ffffff;"></i>
                                </button>
                            </a>
                            <a href="{{ route('profile.edit') }}" class="mx-2">
                                <button class="btn btn-square btn-warning ">
                                    <i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i>
                                </button>
                            </a>
                            <a data-bs-toggle="modal" data-bs-target="#delete-account">
                                <button class="btn btn-square btn-danger ">
                                    <i class="fa-solid fa-trash" style="color:#ffffff;"></i>
                                </button>
                            </a>
                            @include('admin.doctors.modal')
                        </div>
                    </div>
                    <hr>

                    {{-- PAGE TITLE --}}


                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <div class="image bg-lightcyano d-flex justify-content-center rounded raisedd-effect">
                            @if ($doctor->image != null)
                                @if (str_contains($doctor->image, 'https://'))
                                    <img class="dettaglio-immagine" src="{{ $doctor->image }}">
                                @else
                                    <img class="dettaglio-immagine" src="{{ asset('storage/' . $doctor->image) }}">
                                @endif
                            @else
                                <img class="dettaglio-immagine" src="{{ asset('/img/Doctor-default.jpeg') }}"
                                    alt="{{ $doctor->user->name }}">
                            @endif

                        </div>
                        @if (count($doctor->specializations) != 0)
                            <div class="services my-2">
                                <div><strong>Specializzazioni:</strong> <br>
                                    @foreach ($doctor->specializations as $specialization)
                                        {{ $specialization->name }} <br>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="my-2">
                                <div><em>Nessuna specializzazione inserita. <br> Vai nella <a
                                            href="{{ route('profile.edit') }}" class="text-black">schermata modifica
                                            profilo</a> per aggiungerne una.</em></div>
                            </div>
                        @endif
                        @if ($doctor->services != '' || $doctor->services != null)
                            <div class="services my-3">
                                <div>
                                    <strong>Prestazioni:</strong>
                                    <div style="white-space: pre-line;">
                                        {{ $doctor->services }}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="my-2">
                                <div><em>Nessuna descrizione delle prestazioni inserita. <br> Vai nella <a
                                            href="{{ route('profile.edit') }}" class="text-black">schermata modifica
                                            profilo</a> per scriverne una.</em></div>
                            </div>
                        @endif

                    </div>
                    <div class="col-6">
                        <div>
                            <div class="d-flex justify-content-between my-2">
                                <span>
                                    <strong>Email:</strong>
                                </span>
                                <div>{{ $doctor->user->email }}</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between my-2">
                                <span>
                                    <strong>Numero di Telefono:</strong>
                                </span>
                                <div>{{ $doctor->phone }}</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between my-2">
                                <span>
                                    <strong>Città:</strong>
                                </span>
                                <div>{{ $doctor->city }}</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between my-2">
                                <span>
                                    <strong>Indirizzo:</strong>
                                </span>
                                <div>{{ $doctor->user->address }}</div>
                            </div>

                            @if ($doctor->cv != 'Filepdf' || '')
                                <hr>
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <strong>Curriculum</strong>
                                        <a target="_blank" href="{{ asset('storage/' . $doctor->cv) }}"> <button
                                                class="btn btn-primary"><i class="fa-solid fa-eye"
                                                    style="color: #ffffff;"></i></button></a>
                                    </div>
                                </div>
                            @else
                                <hr>
                                <div class="my-2">
                                    <div><em>Nessun Curriculum Vitae inserito. <br> Vai nella <a
                                                href="{{ route('profile.edit') }}" class="text-black">schermata modifica
                                                profilo</a> per aggiungerne uno.</em></div>
                                </div>
                            @endif
                            <div class="d-flex justify-content-between aling-item-center mt-4">
                                <p>Guarda i tuoi messaggi</p>
                                <a href="{{ route('messages.index') }}" class="mx-2">
                                    <button class="btn btn-square btn-primary ">
                                        <i class="fa-solid fa-envelope" style="color: #ffffff;"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="d-flex justify-content-between aling-item-center mt-4">
                                <p>Guarda le tue recenzioni</p>
                                <a href="{{ route('reviews.index') }}" class="mx-2">
                                    <button class="btn btn-square btn-primary">
                                        <i class="fa-solid fa-star" style="color: #ffffff;"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                {{-- <div class="d-flex justify-content-center mt-2">
                        <a href="{{ url('admin') }}" class=""><button class="btn btn-square btn-primary mt-4"><i
                                    class="fa-solid fa-hand-point-left" style="color: #ffffff;"></i></button></a>
                        <a href="{{ route('profile.edit', ['doctor' => $doctor->id]) }}" class="mx-2"><button
                                class="btn btn-square btn-warning mt-4"><i class="fa-regular fa-pen-to-square"
                                    style="color: #ffffff;"></i></button></a>
                        <button class="btn btn-square btn-danger mt-4" data-bs-toggle="modal"
                            data-bs-target="#delete-account"><i class="fa-solid fa-trash" style="color:#ffffff;"></i></button>
                        @include('admin.doctors.modal')
                    </div> --}}
            </div>
        </div>
    </div>
@endsection
