@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center m-5">Profilo Personale</h3>
                <div class="row">
                    <div class="col-6 d-flex justify-content-around">
                        <div>
                            <img class="dettaglio-immagine" src="{{ $doctor->image }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <h2>{{ $doctor->user->name }} {{ $doctor->user->surname }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4 ">


                <div>
                    <span>Email: {{ $doctor->user->email }}</span><br>
                    <span>Numero di telefono: {{ $doctor->phone }}</span><br>
                    <span>Città: {{ $doctor->city }}</span><br>
                    <span>Indirizzo: {{ $doctor->user->address }}</span><br>
                    <span>Curriculum: {{ $doctor->cv }}</span><br>
                    <span>Prestazioni: {{ $doctor->services }}</span>

                </div>
                <div class="d-flex">
                    <a href="{{ route('admin.doctors.edit', ['doctor' => $doctor->id]) }}" class="mx-2"><button
                            class="btn btn-sm btn-square btn-warning mt-4"><i class="fa-regular fa-pen-to-square"
                                style="color: #ffffff;"></i></button></a>
                    <button class="btn btn-sm btn-square btn-danger mt-4" data-bs-toggle="modal"
                        data-bs-target="#modal_delete_{{ $doctor->id }}"><i class="fa-solid fa-trash"
                            style="color:#ffffff;"></i></button>
                    @include('admin.doctors.modal')
                </div>


            </div>
        </div>
    </div>
@endsection
