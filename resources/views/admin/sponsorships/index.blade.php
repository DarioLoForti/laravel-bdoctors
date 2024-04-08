@extends('layouts.style')
@section('content')

    <div class="  ">
        <div class="row ">
            <div class=" col-12 px-4 pt-3 bg-doctorblu ">
                <h1 class="text-center mt-5 text-blue">Le nostre Sponsorizzazioni</h1>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 mt-4 ">
                        <p class="text-center text-white">Con i nostri pacchetti promozionali, ottieni: </p>
                        <p class="text-white"><strong class="text-blue">Massima visibilità:</strong><br>
                            Il tuo profilo apparirà in cima alla Homepage e nelle ricerche,
                            aumentando la tua esposizione agli utenti.</p>
                        <p class="text-white"><strong class="text-blue">Priorità nella ricerca:</strong><br>
                            Sarai sempre posizionato sopra i profili non sponsorizzati che
                            soddisfano gli stessi criteri di ricerca.</p>
                        <p class="text-white"><strong class="text-blue">Flessibilità temporale:</strong><br>
                            Scegli tra pacchetti di 24, 72 o 144 ore per adattare la tua
                            visibilità alle tue esigenze.</p>
                        <p class="text-white"><strong class="text-blue">Pagamento semplice:</strong><br>
                            Sicuro e veloce tramite carta di credito.
                            Scegli la sponsorizzazione per raggiungere più pazienti e aumentare la tua visibilità in
                            modo rapido ed efficace.</p>
                        </p>
                    </div>
                </div>
                <div class="row mb-4">
                    @foreach ($sponsorships as $key => $sponsorship)
                        <div class="col-12 col-lg-4 mt-2 d-flex justify-content-center  ">
                            <div class="content">

                                <div class="card-sponsor border-card raised-effect">
                                    <div class=" imgBx ">
                                        <img src="{{ Vite::asset('resources/img/' . $key + 1 . '.png') }}" alt="...">

                                    </div>
                                    <div class="card-body">
                                        <h2 style="color: #285a8c; ">{{ $sponsorship->name }}
                                        </h2>
                                        <div class="duration">
                                            <span><strong><i class="fa-regular fa-clock"></i></strong>
                                                {{ $sponsorship->duration }}
                                                ore</span>{{-- <br><br> --}}

                                        </div>
                                        <div class="price">
                                            <span><strong><i class="fa-solid fa-euro-sign"></i></strong> {{ $sponsorship->price }}
                                                </span>

                                        </div>
                                        <div>
                                            <a href="{{ route('token', ['price' => $sponsorship->price]) }}"
                                                class="btn btn-blue ">Acquista</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="text-center mb-4">
                    <a href="{{ url('admin') }}" class="">
                        <button class="btn btn-blue">Dashboard</button>
                    </a>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
