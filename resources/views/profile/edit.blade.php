@extends('layouts.app')
@section('content')

<div class="container">
    <h2 class="fs-4 text-secondary my-4 d-flex justify-content-between align-items-center">
        <span>
            {{ __('Profilo') }}
        </span>
        <div>
            <div class="btn btn-big btn-success">
                <a class="dropdown-item" href="{{ url('admin') }}">
                    Vai alla tua Dashboard
                </a>
            </div>
        </div>
    </h2>
    {{-- EDIT PERSONAL USER INFORMATION --}}
    <div class="card p-4 mb-4 bg-white shadow rounded-lg">
        @include('profile.partials.update-personal-information-form')
    </div>

    {{-- HAVE TO GET SPECIALIZATIONS TO SEND TO PARTIAL COMPONENT --}}

    @php
        $specializations = DB::table('specializations')->get();
    @endphp

    {{-- EDIT USER PROFESSIONAL INFORMATION --}}
    <div class="card p-4 mb-4 bg-white shadow rounded-lg">
        @include('profile.partials.update-professional-information-form', ['specializations' => $specializations])
    </div>

    {{-- UPDATE USER PASSWORD --}}
    <div class="card p-4 mb-4 bg-white shadow rounded-lg">
        @include('profile.partials.update-password-form')
    </div>

    {{-- DELETE USER ACCOUNT --}}
    <div class="card p-4 mb-4 bg-white shadow rounded-lg">
        @include('profile.partials.delete-user-form')
    </div>
</div>

@endsection
