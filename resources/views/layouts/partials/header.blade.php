<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light bg-lightcyano shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <div class="logo_laravel">
                <img width="80px" src="{{ Vite::asset('resources/img/logo.png') }}" alt="">
            </div>
            {{-- config('app.name', 'Laravel') --}}
        </a>

        <!-- Navbar Toggler -->
        <button class="navbar-aestethic d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
        </button>

        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse container" id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link text-white" href="http://localhost:5174/">{{ __('Home') }}</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white d-md-block d-none" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('admin') }}">{{ __('Dashboard') }}</a>
                            {{-- <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a> --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        
                    </li>
                    <div class="row ">
                        <div class="col-6 col-md-12 text-center"> <!-- Prima colonna -->
                            <li class="d-md-none">
                                <a class="nav-link text-white" href="http://localhost:5174/">{{ __('Home') }}</a>
                            </li>
                            
                            <li class="d-md-none">
                                <a href="{{ route('admin.doctors.index') }}" class="nav-link  text-white">
                                    Profilo
                                </a>
                            </li>
                            <li class="d-md-none">
                                <a class="nav-link text-white" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                </a>
                            </li>
                           
                        </div>
                        <div class="col-6 col-md-12 text-center"> <!-- Seconda colonna -->
                            <li class="d-md-none">
                                <a href="{{ route('messages.index') }}" class="nav-link text-white">
                                    Messaggi
                                </a>
                            </li>
                            <li class="d-md-none">
                                <a href="{{ route('reviews.index') }}" class="nav-link text-white">
                                    Recensioni
                                </a>
                            </li>
                            <li class="d-md-none">
                                <a href="" class="nav-link text-white">
                                    Statistiche
                                </a>
                            </li>
                            
                        </div>
                    </div>
                    
                @endguest
            </ul>
        </div>
    </div>
</nav>
