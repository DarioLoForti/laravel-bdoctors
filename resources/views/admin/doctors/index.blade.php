@extends('layouts.style')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center m-5">Profilo Personale {{ $doctor->user->name }} {{ $doctor->user->surname }}</h3>
                <div class="row">
                    <div class="col-6">
                        <div class="image">
                            <img class="dettaglio-immagine" src="{{ $doctor->image }}">
                        </div>
                        <div class="services mt-5">
                            <div><strong>Prestazioni:</strong> <br>{{ $doctor->services }}</div>
                        </div>
                        <a href="{{ url('admin') }}" class="mx-2"><button class="btn btn-square btn-primary mt-4"><i
                                    class="fa-solid fa-envelope" style="color: #ffffff;"></i></button></a>
                    </div>
                    <div class="col-6">
                        <div>
                            <div><strong>Email:</strong> {{ $doctor->user->email }}</div><br>
                            <div><strong>Numero di telefono:</strong> {{ $doctor->phone }}</div><br>
                            <div><strong>Città:</strong> {{ $doctor->city }}</div><br>
                            <div><strong>Indirizzo:</strong> {{ $doctor->user->address }}</div><br>
                            <div><strong>Curriculum:</strong><br>
                                <img class="dettaglio-immagine" src="{{ $doctor->cv }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4 ">



                <div class="d-flex justify-content-center mt-5">
                    <a href="{{ url('admin') }}" class="mx-2"><button class="btn btn-square btn-primary mt-4"><i
                                class="fa-solid fa-hand-point-left" style="color: #ffffff;"></i></button></a>
                    <a href="{{ route('admin.doctors.edit', ['doctor' => $doctor->id]) }}" class="mx-2"><button
                            class="btn btn-square btn-warning mt-4"><i class="fa-regular fa-pen-to-square"
                                style="color: #ffffff;"></i></button></a>
                    <button class="btn btn-square btn-danger mt-4" data-bs-toggle="modal"
                        data-bs-target="#modal_delete_{{ $doctor->id }}"><i class="fa-solid fa-trash"
                            style="color:#ffffff;"></i></button>
                    @include('admin.doctors.modal')
                </div>


            </div>
        </div>
    </div>
@endsection
