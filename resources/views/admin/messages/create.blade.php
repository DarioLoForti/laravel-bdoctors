@extends('layouts.app')

@section('content')
    <div class="bg-message">
        <div class="container  pt-5">
            @if (Session::has('success_message'))
                <div class="alert alert-success">
                    {{ Session::get('success_message') }}
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
                    <h3 class="text-white">Inserisci il messaggio da inviare a <strong>{{ $doctor->user->name }}
                            {{ $doctor->user->surname }}</strong> </h3>
                </div>
                <div class="col-12">
                    <form action="{{ route('messages.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                        <div class="form-group mb-3">
                            <label class="text-white" for="name">Nome</label>
                            <input type="text" name="name" id="name"class="form-control"
                                placeholder="Inserisci il tuo nome">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-white" for="email">E-mail</label>
                            <input type="email" name="email" id="email"class="form-control"
                                placeholder="Inserisci la tua E-mail">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-white" for="text">Testo</label>
                            <textarea class="form-control" name="text" id="text" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group my-3">
                            <a href="javascript:history.back()" class="btn btn-secondary">Annulla</a>
                            <button class="btn btn-primary" type="submit">Invia</button>
                        </div>
                    </form>
                    <a href=""></a>
                </div>
            </div>
        </div>
    </div>
@endsection
