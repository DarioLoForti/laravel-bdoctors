@extends('layouts.style')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex">

                {{-- DASHBOARD SIDEBAR --}}

                <div class="col-2">
                    <div class="container-fluid">
                        <div class="row flex-nowrap">
                            <div class="col-12 px-sm-2 px-0 bg-doctorblu">
                                <div
                                    class="d-flex flex-column align-items-center align-items-sm-start mx-2 mt-2 text-white vh-100">
                                    <a href="/"
                                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                        <span class="fs-5 d-none d-sm-inline">Menu</span>
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
                </div>

                {{-- DASHBOARD MAIN CONTENT --}}

                <div class="col-10 mx-4 mt-3">
                    <h1 class="text-center">Messaggi</h1>
                    <hr class="me-4">
                    @foreach ($messages as $message)
                        <h6><strong>{{ $message->name }} </strong> | email: {{ $message->email }}</h6>
                        <p> {{ $message->text }}</p>
                        <hr class="me-4">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
