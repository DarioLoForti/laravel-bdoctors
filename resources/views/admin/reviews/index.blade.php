@extends('layouts.style')
@section('content')
    <div class="">
        <div class="row ">
            <div class="d-flex">

                {{-- DASHBOARD SIDEBAR --}}

                <div class="col-sm-2 col-3 d-none d-md-block">

                    <div class="row flex-nowrap">
                        <div class="col-12 px-sm-2 px-0 bg-doctorblu">
                            <div
                                class="d-flex ms-3 flex-column align-items-center  mx-2 mt-2 text-white vh-100">
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
                                        <a href="" class="nav-link ombra">
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

                <div class="col-md-10 col-12 px-4 pt-3 bg-white tutto-schermo">
                    <h1 class="text-center">Recensioni</h1>
                    <hr class="">
                    <div class="card-body">
                        <div class="accordion accordion-flush" id="accordionReviews">
                            @foreach ($reviews as $review)
                                <div class="accordion-item ">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed d-none d-lg-flex" type="button" data-bs-toggle="collapse" data-bs-target="#reviewCollapse{{ $loop->index }}" aria-expanded="false" aria-controls="reviewCollapse{{ $loop->index }}">
                                            <div class="container d-flex justify-content-between ">
                                                <div>
                                                    <strong>{{ $review->name }}</strong> &nbsp;| email: {{ $review->email }}
                                                </div>
                                                <div>
                                                    <span class="message-text date">{{ $review->created_at->format('d-m-Y H:i') }}</span>
                                                </div>

                                            </div>
                                        </button>
                                        <button class="accordion-button collapsed d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#reviewCollapse{{ $loop->index }}" aria-expanded="false" aria-controls="reviewCollapse{{ $loop->index }}">
                                            <div class="container d-flex justify-content-between ">
                                                <div>
                                                    <strong>{{ $review->name }}</strong> &nbsp;<span class="d-none d-sm-block">email: {{ $review->email }}</span>
                                                </div>
                                                <div class="ms-2 ms-sm-0">
                                                    <span class="message-text date">{{ $review->created_at->format('d-m-Y H:i') }}</span>
                                                </div>

                                            </div>
                                        </button>
                                    </h2>
                                    <div id="reviewCollapse{{ $loop->index }}" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionReviews">
                                        <div class="accordion-body padding-text ms-2">
                                            <div class="over">
                                                <span class="d-sm-none">email: <strong>{{ $review->email }}</strong></span>
                                            </div>
                                            
                                            
                                            <br class="d-sm-none">
                                            {{ $review->text }}
                                        </div>
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
