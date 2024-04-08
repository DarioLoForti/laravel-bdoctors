@extends('layouts.style')
@section('content')
    <div class="  ">
        <div class="row ">
            <div class="d-flex ">

                {{-- DASHBOARD SIDEBAR --}}

                <div class="col-sm-2 col-3 d-none d-md-block bg-doctorblu">

                    <div class="row flex-nowrap">
                        <div class="col-12 px-sm-2 px-0 ">
                            <div class="d-flex ms-3 flex-column align-items-center  mx-2 mt-2 text-white vh-100">
                                <a href="/"
                                    class="d-flex align-items-center pb-3 mb-md-0 me-md-5 text-white text-decoration-none">
                                    <span class="fs-5 d-none d-lg-inline ">Menu</span>
                                </a>
                                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                                    id="menu">

                                    {{-- <li class="nav-item mb-2 px-2">
                                        <a class="nav-link align-middle  text-white ombra" href="{{ url('/') }}"><i
                                                class="fa-solid fa-house me-2"
                                                style="color: #ffffff;"></i>{{ __('Home') }}
                                        </a>
                                    </li> --}}

                                    <li class="nav-item mb-2 px-2">
                                        <a href="{{ route('admin.doctors.index') }}" class="nav-link  ombra">
                                            <i class="fa-solid fa-user-doctor font-dashboard" style="color: #ffffff;"></i>
                                            <span class="ms-1 d-none d-lg-inline text-white ">Profilo</span>
                                        </a>
                                    </li>

                                    <li class="nav-item mb-2 px-2">
                                        <a href="{{ route('messages.index') }}" class="nav-link ombra">
                                            <i class="fa-solid fa-message font-dashboard" style="color: #ffffff;"></i>
                                            <span class="ms-1 d-none d-lg-inline text-white">Messaggi</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-2 px-2">
                                        <a href="{{ route('reviews.index') }}" class="nav-link ombra">
                                            <i class="fa-solid fa-book-open font-dashboard" style="color: #ffffff;"></i>
                                            <span class="ms-1 d-none d-lg-inline text-white">Recensioni</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-2 px-2">
                                        <a href="{{ route('statistics.index', ['year' => 2024]) }}" class="nav-link ombra">
                                            <i class="fa-solid fa-chart-line font-dashboard" style="color: #ffffff;"></i>
                                            <span class="ms-1 d-none d-lg-inline text-white">Statistiche</span>
                                        </a>
                                    </li>

                                </ul>
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- DASHBOARD MAIN CONTENT --}}

                <div class="col-md-10 col-12 px-4 pt-3 bg-white">
                    <h1 class="text-center mt-5 text-blue">Le nostre Sponsorizzazioni</h1>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8 mt-4 ">
                            <p class="text-center">Con i nostri pacchetti promozionali, ottieni: </p>
                            <p><strong>Massima visibilità:</strong><br>
                                Il tuo profilo apparirà in cima alla Homepage e nelle ricerche,
                                aumentando la tua esposizione agli utenti.</p>
                            <p><strong>Priorità nella ricerca:</strong><br>
                                Sarai sempre posizionato sopra i profili non sponsorizzati che
                                soddisfano gli stessi criteri di ricerca.</p>
                            <p><strong>Flessibilità temporale:</strong><br>
                                Scegli tra pacchetti di 24, 72 o 144 ore per adattare la tua
                                visibilità alle tue esigenze.</p>
                            <p><strong>Pagamento semplice:</strong><br>
                                Sicuro e veloce tramite carta di credito.
                                Scegli la sponsorizzazione per raggiungere più pazienti e aumentare la tua visibilità in
                                modo rapido ed efficace.</p>
                            </p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        @foreach ($sponsorships as $key => $sponsorship)
                            <div class="col-12 col-md-4 mt-2 d-flex justify-content-center  ">
                                <div class="content">

                                    <div class="card-sponsor border-card raised-effect">
                                        <div class=" imgBx ">
                                            <img src="{{ Vite::asset('resources/img/' . $key + 1 . '.png') }}"
                                                alt="...">

                                        </div>
                                        <div class="card-body">
                                            <h2 style="color: #285a8c; ">{{ $sponsorship->name }}
                                            </h2>
                                            <div class="duration">
                                                <span><strong>Durata:</strong>
                                                    {{ $sponsorship->duration }}
                                                    ore</span>{{-- <br><br> --}}

                                            </div>
                                            <div class="price">
                                                <span><strong>Prezzo:</strong> {{ $sponsorship->price }}
                                                    €</span>

                                            </div>
                                            <div>
                                                <a href="{{ route('token', ['price' => $sponsorship->price]) }}"
                                                    class="btn btn-blue ">Acquista.</a>

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
    @endsection
