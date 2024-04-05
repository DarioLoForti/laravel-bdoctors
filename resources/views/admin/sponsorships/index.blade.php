@extends('layouts.style')
@section('content')
    <div class="  ">
        <div class="row ">
            <div class="d-flex ">

                {{-- DASHBOARD SIDEBAR --}}

                <div class="col-sm-2 col-3 d-none d-md-block">

                    <div class="row flex-nowrap">
                        <div class="col-12 px-sm-2 px-0 bg-doctorblu">
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
                    <h1 class="text-center my-5 text-blue">Le nostre Sponsorizzazioni</h1>
                    <div class="row mb-4">
                        @foreach ($sponsorships as $key => $sponsorship)
                            <div class="col-12 col-md-4 mt-2 d-flex justify-content-center  ">
                                <div class="card border-card raised-effect" style="width: 20rem;">
                                    <div class="d-flex justify-content-center align-content-center ">
                                        <img src="{{ Vite::asset('resources/img/' . $key + 1 . '.png') }}"
                                            style="width: 80%;" class="  mt-2" alt="...">

                                    </div>
                                    <div class="card-body ">
                                        <h2 class="card-title mb-3" style="color: #285a8c; ">{{ $sponsorship->name }}</h2>
                                        <span class="card-text"><strong>Durata:</strong> {{ $sponsorship->duration }}
                                            ore</span><br><br>
                                        <span class="card-text "><strong>Prezzo:</strong> {{ $sponsorship->price }} €</span>
                                        <div class="text-center mt-4">
                                            <a href="{{ route('token', ['price' => $sponsorship->price]) }}"
                                                class="btn btn-blue ">Acquista</a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
