@extends('layouts.style')
@section('content')
    <div class="container">
        <div class="row">
            <div class="container my-3 bg-white rounded">
                <div class="row border border-black mb-3 rounded">

                    {{-- UPDATE & DELETE BUTTONS --}}

                    <div class="col-4 my-5">
                        <div class="d-flex justify-content-start pt-2">
                            <a href="{{ url('admin') }}" class=""><button class="btn btn-square btn-primary "><i
                                        class="fa-solid fa-hand-point-left" style="color: #ffffff;"></i></button></a>
                            <a href="{{ route('profile.edit') }}" class="mx-2"><button
                                    class="btn btn-square btn-warning "><i class="fa-regular fa-pen-to-square"
                                        style="color: #ffffff;"></i></button></a>
                            <button class="btn btn-square btn-danger " data-bs-toggle="modal"
                                data-bs-target="#delete-account"><i class="fa-solid fa-trash"
                                    style="color:#ffffff;"></i></button>
                            @include('admin.doctors.modal')
                        </div>
                    </div>

                    {{-- PAGE TITLE --}}

                    <div class="col-8 my-5">
                        <h1 class="">Dr. {{ $doctor->user->name }} {{ $doctor->user->surname }}</h1>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <div class="image bg-warning d-flex justify-content-center rounded">
                            <img class="dettaglio-immagine" src="{{ $doctor->image }}">
                        </div>
                        @if(count($doctor->specializations) != 0)
                        <div class="services my-2">
                            <div><strong>Specializzazioni:</strong> <br>
                                @foreach ($doctor->specializations as $specialization)
                                    {{ $specialization->name }} <br>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <a href="{{ url('admin') }}" class="mx-2"><button class="btn btn-square btn-primary mt-4"><i
                            class="fa-solid fa-envelope" style="color: #ffffff;"></i></button></a>
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
                                <hr>
                                <div class="services my-2">
                                    <div>
                                        <strong>Prestazioni:</strong>
                                        <div>
                                            {{ $doctor->services }}
                                        </div>
                                    </div>
                                </div>
                                @if($doctor->cv != 'Filepdf')
                                <hr>
                                <div><strong>Curriculum:</strong><br>
                                    <img class="dettaglio-immagine" src="{{ $doctor->cv }}">
                                </div>
                                @endif
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
