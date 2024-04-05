@extends('layouts.style')
@section('content')
    <div class="container  my-3 d-none d-md-block overflow-x-hidden ">
        <div class="row">
            <div class="container mb-3 bg-white rounded">
                <div class="row mb-2">

                    {{-- UPDATE & DELETE BUTTONS --}}
                    

                    <div class="col-4 justify-content-start d-flex align-items-center mb-3">
                        <div class="d-flex justify-content-start  pt-2">
                            <a href="{{ url('admin') }}" class="">
                                <button class="btn btn-square btn-primary ">
                                    <i class="fa-solid fa-hand-point-left" style="color: #ffffff;"></i>
                                </button>
                            </a>
                            <a href="{{ route('profile.edit') }}" class="mx-2">
                                <button class="btn btn-square btn-warning ">
                                    <i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i>
                                </button>
                            </a>
                            <a data-bs-toggle="modal" data-bs-target="#delete-account">
                                <button class="btn btn-square btn-danger ">
                                    <i class="fa-solid fa-trash" style="color:#ffffff;"></i>
                                </button>
                            </a>

                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="col-8 d-flex align-items-center mb-3">
                        <h1 class="text-blue">Dr. {{ $doctor->user->name }} {{ $doctor->user->surname }}</h1>
                    </div>

                    {{-- PAGE TITLE --}}


                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-12">
                        <div class="image bg-lightcyano d-flex justify-content-center shadow ">
                            @if ($doctor->image != null)
                                @if (str_contains($doctor->image, 'https://'))
                                    <img class="dettaglio-immagine" src="{{ $doctor->image }}">
                                @else
                                    <img class="dettaglio-immagine" src="{{ asset('storage/' . $doctor->image) }}">
                                @endif
                            @else
                                <img class="dettaglio-immagine" src="{{ asset('/img/Doctor-default.jpeg') }}"
                                    alt="{{ $doctor->user->name }}">
                            @endif

                        </div>
                        @if (count($doctor->specializations) != 0)
                            <div class="services m-2">
                                <div><strong>Specializzazioni:</strong> <br>
                                    @foreach ($doctor->specializations as $specialization)
                                        {{ $specialization->name }} <br>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="my-2">
                                <div><em>Nessuna specializzazione inserita. <br> Vai nella <a
                                            href="{{ route('profile.edit') }}" class="text-black">schermata modifica
                                            profilo</a> per aggiungerne una.</em></div>
                            </div>
                        @endif

                    </div>
                    <div class="col-lg-6 col-12">
                        <div>
                            <div class="d-flex justify-content-between my-2">
                                <span>
                                    <strong>Email:</strong>
                                </span>
                                <div>{{ $doctor->user->email }}</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between my-2">
                                <span>
                                    <strong>Numero di Telefono:</strong>
                                </span>
                                <div>{{ $doctor->phone }}</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between my-2">
                                <span>
                                    <strong>Città:</strong>
                                </span>
                                <div>{{ $doctor->city }}</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between my-2">
                                <span>
                                    <strong>Indirizzo:</strong>
                                </span>
                                <div>{{ $doctor->user->address }}</div>
                            </div>

                            @if ($doctor->cv != 'Filepdf' || '')
                                <hr>
                                <div class="d-flex justify-content-between aling-item-center mt-4">
                                    <strong>Curriculum</strong>
                                    <a target="_blank" href="{{ asset('storage/' . $doctor->cv) }}" class="mx-2">
                                        <button class="btn btn-square btn-primary ">
                                            <i class="fa-solid fa-eye" style="color: #ffffff;"></i>
                                        </button>
                                    </a>
                                </div>
                            @else
                                <hr>
                                <div class="my-2">
                                    <div><em>Nessun Curriculum Vitae inserito. <br> Vai nella <a
                                                href="{{ route('profile.edit') }}" class="text-black">schermata modifica
                                                profilo</a> per aggiungerne uno.</em></div>
                                </div>
                            @endif
                            <hr>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <span><strong>Guarda i tuoi messaggi:</strong></span>
                                <a href="{{ route('messages.index') }}" class="mx-2">
                                    <button class="btn btn-square bg-button ">
                                        <i class="fa-solid fa-envelope" ></i>
                                    </button>
                                </a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <span><strong>Guarda le tue recensioni:</strong></span>
                                <a href="{{ route('reviews.index') }}" class="mx-2">
                                    <button class="btn btn-square bg-button">
                                        <i class="fa-solid fa-star" ></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-12">
                @if ($doctor->services != '' || $doctor->services != null)
                    <div class="col-12 my-3">
                        <div class="col-12">
                            <strong>Prestazioni:</strong>
                            <div class="col-12">
                                {{ $doctor->services }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="my-2">
                        <div><em>Nessuna descrizione delle prestazioni inserita. <br> Vai nella <a
                                    href="{{ route('profile.edit') }}" class="text-black">schermata modifica
                                    profilo</a> per scriverne una.</em></div>
                    </div>
                @endif
            </div>
        </div>
    </div>


    {{-- RESPONSIVE --}}

    <div class="container my-3  d-md-none">
        <div class="row">
            <div class="container mb-3 bg-white rounded">
                <div class="row  ">

                    {{-- UPDATE & DELETE BUTTONS --}}
                    <div class="col-12 mb-3 text-center">
                        <div class="  pt-2 text-center">
                            <a href="{{ url('admin') }}" class="">
                                <button class="btn btn-square btn-primary btn-padding ">
                                    <i class="fa-solid fa-hand-point-left" style="color: #ffffff;"></i>
                                </button>
                            </a>
                            <a href="{{ route('profile.edit') }}" class="mx-2">
                                <button class="btn btn-square btn-warning  btn-padding">
                                    <i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i>
                                </button>
                            </a>
                            <a data-bs-toggle="modal" data-bs-target="#delete-account">
                                <button class="btn btn-square btn-danger btn-padding">
                                    <i class="fa-solid fa-trash" style="color:#ffffff;"></i>
                                </button>
                            </a>

                        </div>
                    </div>
                    <hr>
                    <div class="col-12 my-1 text-center ">
                        <h1 class="text-blue">Dr. {{ $doctor->user->name }} {{ $doctor->user->surname }}</h1>
                    </div>
                    
                    
                    

                    {{-- PAGE TITLE --}}


                </div>

                <div class="row mb-3">
                    <div class="col-lg-6 col-12">
                        <div class=" bg-lightcyano d-flex justify-content-center ">
                            @if ($doctor->image != null)
                                @if (str_contains($doctor->image, 'https://'))
                                    <img class="dettaglio-immagine" src="{{ $doctor->image }}">
                                @else
                                    <img class="dettaglio-immagine" src="{{ asset('storage/' . $doctor->image) }}">
                                @endif
                            @else
                                <img class="dettaglio-immagine" src="{{ asset('/img/Doctor-default.jpeg') }}"
                                    alt="{{ $doctor->user->name }}">
                            @endif
                            
                        </div>
                        
                        <div class="d-flex justify-content-around align-items-center my-4 mx-5">
                                
                            <a href="{{ route('messages.index') }}" class="mx-2">
                                <button class="btn btn-square bg-button ">
                                    <i class="fa-solid fa-envelope" ></i>
                                </button>
                            </a>
                            
                            <a href="{{ route('reviews.index') }}" class="mx-2">
                                <button class="btn btn-square bg-button">
                                    <i class="fa-solid fa-star" ></i>
                                </button>
                            </a>
                        </div> 
                        <hr>
                        @if (count($doctor->specializations) != 0)
                            <div class="services m-2">
                                <div><strong>Specializzazioni:</strong> <br>
                                    @foreach ($doctor->specializations as $specialization)
                                        {{ $specialization->name }} <br>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="my-2">
                                <div><em>Nessuna specializzazione inserita. <br> Vai nella <a
                                            href="{{ route('profile.edit') }}" class="text-black">schermata modifica
                                            profilo</a> per aggiungerne una.</em></div>
                            </div>
                        @endif
                        <hr>
                    </div>
                    
                    <div class="col-lg-6 col-12">
                        <div>
                            <div class="d-flex justify-content-between my-2">
                                <span>
                                    <strong>Email:</strong>
                                </span>
                                <div>{{ $doctor->user->email }}</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between my-2">
                                <span>
                                    <strong>Numero di Telefono:</strong>
                                </span>
                                <div>{{ $doctor->phone }}</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between my-2">
                                <span>
                                    <strong>Città:</strong>
                                </span>
                                <div>{{ $doctor->city }}</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between my-2">
                                <span>
                                    <strong>Indirizzo:</strong>
                                </span>
                                <div>{{ $doctor->user->address }}</div>
                            </div>
                            <hr>
                            @if ($doctor->cv != 'Filepdf' || '')
                                
                                <div class="d-flex justify-content-between aling-item-center mt-4">
                                    <strong>Curriculum</strong>
                                    <a target="_blank" href="{{ asset('storage/' . $doctor->cv) }}" class="mx-2">
                                        <button class="btn btn-square btn-primary ">
                                            <i class="fa-solid fa-eye" style="color: #ffffff;"></i>
                                        </button>
                                    </a>
                                </div>
                            @else
                                
                                <div class="my-2">
                                    <div><em>Nessun Curriculum Vitae inserito. <br> Vai nella <a
                                                href="{{ route('profile.edit') }}" class="text-black">schermata modifica
                                                profilo</a> per aggiungerne uno.</em></div>
                                </div>
                            @endif
                            <hr>
                            <div class="col-12">
                                @if ($doctor->services != '' || $doctor->services != null)
                                <strong>Prestazioni:</strong>
                                <div class="col-12" >
                                    {{ $doctor->services }}
                                </div>
                                @else
                                <div class="my-2">
                                    <div><em>Nessuna descrizione delle prestazioni inserita. <br> Vai nella <a
                                        href="{{ route('profile.edit') }}" class="text-black">schermata modifica
                                        profilo</a> per scriverne una.</em></div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                <div>
    
                    
                </div>
            </div>
        </div>
        
    </div>

    
    @include('admin.doctors.modal')
@endsection
