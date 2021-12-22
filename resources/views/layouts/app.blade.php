<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ZPPSU Guidance Complaint Management system</title>
    <link rel = "icon" href ="{{ asset('storage/images/logo.png') }}" type = "image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


</head>

<body>
@include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="d-inline-block align-top" src="{{asset('/storage/images/logo.png')}}" height="40" width="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">{{ __(' Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.home') }}">{{ __(' Admin') }}</a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    @if(Auth::user()->image)
                                        <img class="rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 30px;height: 30px; ">
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                    <i class="fas fa-user-check" style="font-size: 1rem; "></i>
                                        {{ __('Profile') }}
                                    </a>
                                    <div class="dropdown-divider"></div>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                </ul>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt" style="font-size: 1rem; "></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <section class="py-4">
            @auth
            <div class="container py-3">
                <div class="row">
                    <div class="col-md-4">
                        {{--  <div class="card shadow mb-5">  --}}
                            <div class="card-body text-center">
                                <img src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="avatar" class="rounded-circle border border-dark border-3 img-thumbnail" style="width: 150px;">
                                <h5 class="my-2">{{ __('User\'s ID: ') }}{{ Auth::user()->id }}</h5>
                                <h3 class="my-1">{{ Auth::user()->name }}</h3>
                                <p class="text-muted mb-1">{{ Auth::user()->username }}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="{{ route('home') }}"><button type="button" class="btn btn-primary bg-gradient">About Me</button></a>
                                    <a href="{{ route('complaint') }}"><button type="button" class="btn btn-outline-primary ms-1">{{ __('Create Complain') }}</button></a>
                                </div>
                            </div>
                        {{--  </div>  --}}
                    </div>
                    @yield('content1')
                </div>
            </div>
            @endauth
            @yield('content')
        </section>
    </div>
    <footer class="page-footer font-small bg-dark pt-2 fixed-bottom center-on-small-only mt-5">
        <div class="footer-copyright text-center text-white-50 py-2 container-fluid">© 2021 Made with a
            <lord-icon
                src="https://cdn.lordicon.com/rjzlnunf.json"
                trigger="loop"
                colors="primary:#ffffff,secondary:#ffffff"
                stroke="90"
                style="width:25px;height:25px">
            </lord-icon>by
            <a href="{{ url('/') }}">{{ __('Wanna Be\'s') }} </a>. All rights reserved.
        </div>
    </footer>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>

</body>
</html>
