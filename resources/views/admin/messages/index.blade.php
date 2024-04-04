@extends('layouts.style')
@section('content')
    <div class="">
        <div class="row">
            <div class="d-flex">

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
                    <h1 class="text-center">Messaggi</h1>
                    <a href="{{ url('admin') }}" class="">
                        <button class="btn btn-square btn-primary ">
                            <i class="fa-solid fa-hand-point-left" style="color: #ffffff;"></i>
                        </button>
                    </a>
                    <hr class="">
                    <div class="card-body">
                        <div class="accordion accordion-flush" id="accordionReviews">
                            <form action="{{ route('messages.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger mb-3 d-none d-md-block">Elimina
                                    selezionati</button>
                                <button type="submit" class="btn btn-danger mb-3 d-md-none "><i class="fa-solid fa-trash"
                                        style="color:#ffffff;"></i></button>

                                <div class="accordion" id="accordionMessages">
                                    @foreach ($messages as $message)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">

                                                <button class="accordion-button collapsed d-none d-lg-flex" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#messageCollapse{{ $loop->index }}"
                                                    aria-expanded="false"
                                                    aria-controls="messageCollapse{{ $loop->index }}">
                                                    <div class="container  d-flex justify-content-between ">
                                                        <div>
                                                            <input type="checkbox" name="selectedMessages[]"
                                                                value="{{ $message->id }}" class="form-check-input me-3">
                                                            <span class=""><strong>{{ $message->name }}</strong> |
                                                                email: {{ $message->email }} </span>
                                                        </div>
                                                        <div class="">
                                                            <span
                                                                class="message-text date">{{ $message->created_at->format('d-m-Y H:i') }}</span>
                                                        </div>
                                                    </div>

                                                </button>
                                                <button class="accordion-button collapsed ps-0 d-lg-none" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#messageCollapse{{ $loop->index }}"
                                                    aria-expanded="false"
                                                    aria-controls="messageCollapse{{ $loop->index }}">
                                                    <div class="container d-flex justify-content-between vertical ">
                                                        <div class="d-flex align-items-center">
                                                            <input type="checkbox" name="selectedMessages[]"
                                                                value="{{ $message->id }}"
                                                                class="form-check-input mt-0 me-3">
                                                            <div class="">
                                                                <span><strong>{{ $message->name }}</strong></span> <span
                                                                    class="d-none d-sm-block">{{ $message->email }}</span>

                                                            </div>
                                                        </div>
                                                        <div class="ms-2 ms-sm-0">
                                                            <span
                                                                class="message-text date">{{ $message->created_at->format('d-m-Y H:i') }}</span>
                                                        </div>
                                                    </div>

                                                </button>
                                            </h2>
                                            <div id="messageCollapse{{ $loop->index }}"
                                                class="accordion-collapse collapse" data-bs-parent="#accordionMessages">
                                                <div class="accordion-body  padding-text ms-2">
                                                    <div class="over">
                                                        <span class="d-sm-none">email:
                                                            <strong>{{ $message->email }}</strong></span>
                                                    </div>

                                                    <br class="d-sm-none">

                                                    <span class="message-text">{{ $message->text }}</span>


                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
