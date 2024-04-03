@extends('layouts.style')
@section('content')
    <div class="container  ">
        <div class="row ">
            <div class="d-flex">

                {{-- DASHBOARD SIDEBAR --}}

                <div class="col-2">

                    <div class="row ">
                        <div class="col-12 px-sm-2 px-0 bg-doctorblu">
                            <div
                                class="d-flex flex-column align-items-center align-items-sm-start mx-2 mt-2 text-white vh-100">
                                <a href="/"
                                    class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                    <span class="fs-5 d-none d-sm-inline ms-4">Menu</span>
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
                                            <i class="fa-solid fa-user-doctor" style="color: #ffffff;"></i>
                                            <span class="ms-1 d-none d-sm-inline text-white ">Profilo</span>
                                        </a>
                                    </li>

                                    <li class="nav-item mb-2 px-2">
                                        <a href="{{ route('messages.index') }}" class="nav-link ombra">
                                            <i class="fa-solid fa-message" style="color: #ffffff;"></i>
                                            <span class="ms-1 d-none d-sm-inline text-white">Messaggi</span>
                                        </a>
                                    </li>

                                    <li class="nav-item mb-2 px-2">
                                        <a href="{{ route('reviews.index') }}" class="nav-link ombra">
                                            <i class="fa-solid fa-book-open" style="color: #ffffff;"></i>
                                            <span class="ms-1 d-none d-sm-inline text-white">Recensioni</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-2 px-2">
                                        <a href="" class="nav-link ombra">
                                            <i class="fa-solid fa-chart-line" style="color: #ffffff;"></i>
                                            <span class="ms-1 d-none d-sm-inline text-white">Statistiche</span>
                                        </a>
                                    </li>

                                </ul>
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- DASHBOARD MAIN CONTENT --}}

                <div class="col-10 px-4 pt-3 bg-white">
                    <h1 class="text-center my-5">Le nostre sponsorizzazioni</h1>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            @foreach ($sponsorships as $key => $sponsorship)
                                <div class="card mx-3" style="width: 20rem;">
                                    <img src="{{ Vite::asset('resources/img/' . $key + 1 . '.png') }}" style="width: 80%;"
                                        class="card-img-top ms-4 mt-2" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">{{ $sponsorship->name }}</h5>
                                        <p class="card-text"><strong>Durata:</strong> {{ $sponsorship->duration }} ore</p>
                                        <p class="card-text"><strong>Prezzo:</strong> {{ $sponsorship->price }} €</p>
                                        <a href="{{ route('token', ['price' => $sponsorship->price]) }}"
                                            class="btn btn-primary">Acquista</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
