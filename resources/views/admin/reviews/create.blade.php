@extends('layouts.style')

@section('content')
    <div class="bg-message">
        <div class="container pt-5">
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
                    <h2 class="text-white">Aggiungi una recensione a <strong>{{ $doctor->user->name }}
                            {{ $doctor->user->surname }}</strong> </h2>
                </div>
                <div class="col-12">
                    <form action="{{ route('reviews.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                        <div class="form-group mb-3">
                            <label class="text-white" for="name">Nome</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Inserisci il tuo nome">

                        </div>
                        <div class="form-group mb-3">
                            <label class="text-white" for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Inserisci la tua mail">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-white" for="text">Inserisci recensione</label>
                            <textarea class="form-control" id='text' name="text" cols="30" row="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <!-- Aggiungi qui eventuali altri campi del form -->
                        </div>
                        <a href="javascript:history.back()" class="btn btn-secondary">Annulla</a>
                        <button type="submit" class="btn btn-primary ">Invia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
