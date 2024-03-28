@extends('layouts.style')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Aggiungi una recensione</h2>
            </div>
            <div class="col-12">
                <form action="{{ route('reviews.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <div class="form-group mb-3">
                        <label for="name">Nome</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="text">Inserisci recensione</label>
                        <textarea class="form-control" id='text' name="text" cols="30" row="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success ">Invia</button>
                </form>
            </div>
        </div>
    </div>
@endsection
