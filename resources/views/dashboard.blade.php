@extends('layouts.style')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col 12 d-flex">
                <div class="col-2">
                    <div class="container-fluid">
                        <div class="row flex-nowrap">
                            <div class="col-12 px-sm-2 px-0 bg-doctorblu">
                                <div
                                    class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white vh-100">
                                    <a href="/"
                                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                                    </a>
                                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                                        id="menu">
                                        <li class="nav-item">
                                            <a class="nav-link align-middle px-0 text-white" href="{{ url('/') }}"><i
                                                    class="fa-solid fa-house me-2"
                                                    style="color: #ffffff;"></i>{{ __('Home') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.doctors.index') }}" class="nav-link px-0">
                                                <i class="fa-solid fa-user-doctor" style="color: #ffffff;"></i>
                                                <span class="ms-1 d-none d-sm-inline text-white">Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <i class="fa-solid fa-message" style="color: #ffffff;"></i>
                                                <span class="ms-1 d-none d-sm-inline text-white">Messages</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#submenu1" data-bs-toggle="collapse"
                                                class="nav-link px-0 align-middle">
                                                <i class="fs-4 bi-speedometer2"></i>
                                                <i class="fa-solid fa-chart-line" style="color: #ffffff;"></i>
                                                <span class="ms-1 d-none d-sm-inline text-white">Dashboard</span>
                                            </a>
                                            <ul class="collapse show nav flex-column ms-1" id="submenu1"
                                                data-bs-parent="#menu">
                                                <li class="w-100">
                                                    Reviews
                                                </li>
                                                <li class="w-100">
                                                    Ratings
                                                </li>
                                                <li class="w-100">
                                                    Statistics
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="container">
                        <h2 class="fs-4 text-myblu my-4">
                            {{ __('Dashboard') }}
                        </h2>
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <h1 class="text-mygreen">Benvenuto in BDoctors, Dr.
                                    {{ Auth::user()->name }} {{ Auth::user()->surname }}. </h1>
                            </div>
                            <div class="row my-3">
                                @if(count(Auth::user()->doctor->specializations) == 0)
                                <div class="col-12 bg-success p-3 rounded d-flex justify-content-between align-items-center">
                                    <div class="text-white">
                                        Your profile has not set any specializations. Edit your profile to better match patient's search results!
                                    </div>
                                    <div class="btn btn-small btn-primary">
                                        <a href="{{ route('profile.edit', Auth::user()->doctor->id) }}" class="text-white">
                                            Add Specializations
                                        </a>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="row my-3">
                                @if(Auth::user()->doctor->sponsorship == null)
                                    <div class="col-12 bg-success p-3 rounded d-flex justify-content-between align-items-center">
                                        <div class="text-white">
                                            You don't have a sponsorship. Buy one to reach more clients, faster!
                                        </div>
                                        <div class="btn btn-small btn-primary">
                                            See Our Offers
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
{{--                                 @if (Auth::user()->doctor)
                                    <div class="col-12">
                                        <div class="jumbo">
                                            <img class="jumbo-img" src="{{ Auth::user()->doctor->image }}">
                                        </div>
                                    </div>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
