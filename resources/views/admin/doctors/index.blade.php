@extends('layouts.admin')
@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mt-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Profilo Personale</h6>
                    </div>
                    <div>
                        <img class="dettaglio-immagine" src="{{$doctor->image}}">
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4 ">

                <h2>{{$user->name}}{{$user->surname}}</h2>
                <div>
                    <span>Email: {{$user->email}}</span>
                    <span>Numero di telefono: {{$doctor->email}}</span>
                    <span>Città: {{$doctor->email}}</span>
                    <span>Indirizzo: {{$doctor->email}}</span>
                    <span>Curriculum: {{$doctor->cv}}</span>
                    <span>Prestazioni: {{$doctor->services}}</span>

                </div>
                <div class="d-flex">
                    <a href="{{ route('admin.doctors.edit', ['doctor'=>$doctor->id])}}" class="mx-2"><button class="btn btn-sm btn-square btn-warning"><i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i></button></a> 
                    <button class="btn btn-sm btn-square btn-danger" data-bs-toggle="modal" data-bs-target="#modal_project_delete-{{$doctor->id}}"><i class="fa-solid fa-trash" style="color:#ffffff;"></i></button>
                </div>
              

            </div>
        </div>
    </div>


@endsection