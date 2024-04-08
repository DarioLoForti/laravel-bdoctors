@extends('layouts.style')

@section('content')
    <div class="">
        <div class="container-fluid">
            <div class="row ">
                {{-- DASHBOARD SIDEBAR --}}

                <div class="col-sm-2 col-3 d-none d-md-block bg-doctorblu ">

                    <div class="row flex-nowrap">
                        <div class="col-12 px-sm-2 px-0 ">
                            <div class="d-flex ms-2 flex-column align-items-center mx-2 mt-5 text-white vh-100">
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

                <div class="col-md-10 col-12 bg-white bg-linear-gradient-2">
                    <div class="container">
                        <div class="row justify-content-center">

                            {{-- WELCOME HEADER --}}

                            <div class="col-8">
                                <h1 class="text-mygreen my-3 text-center text-responsive-color">Benvenuto in BDoctors <br> Dr.
                                    {{ Auth::user()->name }} {{ Auth::user()->surname }}.
                                </h1>
                            </div>
                            @if ($validityPeriod !== null)
                                <div class="row justify-content-center my-3">
                                    <div
                                        class="col-12 bg-blue p-3 rounded d-flex justify-content-between align-items-center">
                                        <div class="text-white">
                                            Hai acquistato {{$sponsorshipCount}} sponsorizzazioni. Ti rimangono {{ $validityPeriod }} ore di sponsorizzazione.
                                        </div>
                                    </div>
                                </div>
                            @endif


                            {{-- NOTIFICATION: YOU HAVE BOUGHT NO SPONSORSHIP --}}

                            @if (Auth::user()->doctor->sponsorship == null)
                                <div class="row my-3 ">
                                    <div
                                        class="col-12 bg-blue p-3 rounded d-flex justify-content-between align-items-center">
                                        <div class="text-white d-none d-lg-block">
                                            Aggiungi una sponsorizzazione per avere maggiore visibilità.
                                        </div>
                                        <div class="text-white d-lg-none">
                                            Aggiungi una sponsorizzazione.
                                        </div>
                                        <div class=" d-none d-lg-block">
                                            <a class="bg-button" href="{{ route('sponsorships.index') }}"><strong>Vedi le
                                                    nostre
                                                    Offerte</strong>
                                            </a>
                                        </div>
                                        <div class=" d-lg-none">
                                            <a class="bg-button"
                                                href="{{ route('sponsorships.index') }}"><strong>Offerte</strong>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row justify-content-center row-gap-4 py-3">
                                <div class="col-12 d-flex gap-3 align-items-center justify-content-center">
                                    <h1 class="text-blue text-responsive-color">Le tue statistiche Generali</h1>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <h6 class="text-responsive-color">Hai ricevuto {{ $messages_count }} messaggi
                                        ,
                                        {{ $reviews_count }} recensioni e {{ $ratings_count }} voti</h6>
                                </div>
                                <div class="col-12 col-lg-9 d-flex justify-content-center">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const message = {!! json_encode($messages_count) !!}
        const review = {!! json_encode($reviews_count) !!}
        const rating = {!! json_encode($ratings_count) !!}

        var ctx = document.getElementById('myPieChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Messaggi', 'Recensioni', 'Voti'],
                datasets: [{
                    label: '# of Votes',
                    data: [
                        message,
                        review,
                        rating
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'black'
                        }
                    }
                }
            }
        });
    </script>
@endsection
