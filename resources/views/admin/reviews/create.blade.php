@extends('layouts.style')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Aggiungi una recensione</h2>
            </div>
            <div class="col-12">
                <form action="{{ route('review.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">E-mail</label>
                        <input type="email" id="e-mail" name="e-mail" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="review">Inserisci recensione</label>
                        <textarea class="form-control" id='review' name="review" cols="30" row="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success ">Invia</button>
                </form>
            </div>
        </div>
    </div>
@endsection
