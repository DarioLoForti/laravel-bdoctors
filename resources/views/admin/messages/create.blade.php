@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if (Session::has('success_message'))
            <div class="alert alert-success">
                {{ Session::get('success_message') }}
                <a href="http://localhost:5174/search" class="btn btn-sm btn-primary">indietro</a>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <h3>Inserisci il tuo messaggio da inviare a <strong>{{ $doctor->user->name }}
                        {{ $doctor->user->surname }}</strong> </h3>
            </div>
            <div class="col-12">
                <form action="{{ route('messages.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <div class="form-group mb-3">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name"class="form-control"
                            placeholder="Inserisci il tuo nome">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email"class="form-control"
                            placeholder="Inserisci la tua E-mail">
                    </div>
                    <div class="form-group mb-3">
                        <label for="text">Testo</label>
                        <textarea class="form-control" name="text" id="text" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group my-3">
                        <button class="btn btn-success" type="submit">Invia</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
