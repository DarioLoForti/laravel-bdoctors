@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            {{-- APP LOGO #1 --}}

            <div class="col-12 d-flex justify-content-center">
                <img src="{{ Vite::asset('resources/img/4.jpeg') }}" alt="">
            </div>
            
            {{-- GO TO DASHBOARD BUTTON --}}

            <div class="col-12 d-flex justify-content-center my-3">
                <div class="btn btn-big btn-success">
                    <a class="dropdown-item" href="{{ url('admin') }}">
                        Vai alla tua Dashboard
                    </a>
                </div>
            </div>
            
        </div>
    </div>
@endsection
