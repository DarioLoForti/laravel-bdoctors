@extends('layouts.style')

@section('content')
    <div class="container mt-4">
        @if (Session::has('success_review'))
            <div class="alert alert-success">
                {{ Session::get('success_review') }}
            </div>
            <script>
                // Reindirizzamento automatico dopo 3 secondi
                setTimeout(function() {
                    var doctorSlug = "{{ $doctor->slug }}";
                    window.location.href = 'http://localhost:5174/doctor/' + doctorSlug;
                }, 3000); // 3000 millisecondi = 3 secondi
            </script>
        @endif
        <div class="row">
            <div class="col-12">
                <h2>Aggiungi una recensione a <strong>{{ $doctor->user->name }}
                        {{ $doctor->user->surname }}</strong> </h2>
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
                    <div class="form-group mb-3">
                        <!-- Aggiungi qui eventuali altri campi del form -->
                    </div>
                    <a href="javascript:history.back()" class="btn btn-secondary">Annulla</a>
                    <button type="submit" class="btn btn-success ">Invia</button>
                </form>
            </div>
        </div>
    </div>
@endsection
