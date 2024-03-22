@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col 12 d-flex">
                <div class="col-2">
                    <div class="container-fluid">
                        <div class="row flex-nowrap">
                            <div class="col-12 px-sm-2 px-0 bg-dark">
                                <div
                                    class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white vh-100">
                                    <a href="/"
                                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                                    </a>
                                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                                        id="menu">
                                        <li class="nav-item">
                                            <a class="nav-link align-middle px-0"
                                                href="{{ url('/') }}">{{ __('Home') }}

                                            </a>
                                        </li>
                                        <li>
                                            <a href="#submenu1" data-bs-toggle="collapse"
                                                class="nav-link px-0 align-middle">
                                                <i class="fs-4 bi-speedometer2"></i> <span
                                                    class="ms-1 d-none d-sm-inline">Dashboard</span>
                                            </a>
                                            <ul class="collapse show nav flex-column ms-1" id="submenu1"
                                                data-bs-parent="#menu">
                                                <li class="w-100">
                                                    <a href="{{ route('admin.doctors.index') }}" class="nav-link px-0">
                                                        <span class="d-none d-sm-inline">Profilo</span></a>
                                                </li>
                                                <li class="w-100">
                                                    <a href="{{ route('admin.doctors.create') }}" class="nav-link px-0">
                                                        <span class="d-none d-sm-inline">Aggiungi Nuova
                                                            Automobile</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <hr>
                                    <div class="dropdown pb-4">
                                        <a href="#"
                                            class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30"
                                                height="30" class="rounded-circle">
                                            <span class="d-none d-sm-inline mx-1">loser</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                            <li><a class="dropdown-item" href="#">New project...</a></li>
                                            <li><a class="dropdown-item" href="#">Settings</a></li>
                                            <li><a class="dropdown-item" href="#">Profile</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="container">
                        <h2 class="fs-4 text-secondary my-4">
                            {{ __('Dashboard') }}
                        </h2>
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="doctord">
                                    <div class="doctord-header">{{ __('User Dashboard') }}</div>

                                    <div class="doctord-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        {{ __('You are logged in!') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
