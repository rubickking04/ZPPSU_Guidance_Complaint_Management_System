<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>
    <link rel = "icon" href ="{{ asset('storage/images/logo.png') }}" type = "image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>
@include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo" src="{{asset('/storage/images/logo.png')}}" height="40">
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
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest('admin')
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Admin Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="bi bi-person-circle" style="font-size: 1rem;"></i>
                                    {{ Auth::guard('admin')->user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt" style="font-size: 1rem;"></i>
                                        {{ __(' Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
        @auth('admin')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Admin Dashboard</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow bg-primary bg-gradient text-white">
                                        <div class="card-body py-5">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <h1>{{  App\Models\User::all()->count() }}</h1>
                                                    <h3>{{ __('User\'s') }}</h3>
                                                </div>
                                                <div class="col-sm-5">
                                                    <lord-icon
                                                        src="https://cdn.lordicon.com/dxjqoygy.json"
                                                        trigger="hover"
                                                        colors="primary:#ffffff,secondary:#ffffff"
                                                        stroke="60"
                                                        style="width:100px;height:100px">
                                                    </lord-icon>
                                                </div>
                                            </div>
                                        </div>
                                        <a href={{route('admin.home')}} class="card-footer d-flex text-white" {{ Popper::position('top')->arrow()->pop('User Data'); }} >
                                            {{ __('View Details') }}
                                            <span class="ms-auto text-right">
                                                <i class="bi bi-chevron-right "></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card bg-warning bg-gradient text-dark h-100">
                                        <div class="card-body py-5">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <h1>{{  App\Models\Complains::all()->count() }}</h1>
                                                    <h3>{{ __('Request\'s') }}</h3>
                                                </div>
                                                <div class="col-sm-5">
                                                    <lord-icon
                                                        src="https://cdn.lordicon.com/zpxybbhl.json"
                                                        trigger="hover"
                                                        colors="primary:#121331,secondary:#121331"
                                                        stroke="60"
                                                        style="width:100px;height:100px">
                                                    </lord-icon>
                                                </div>
                                            </div>
                                        </div>
                                        <a href={{route('admin.complain')}} class="card-footer d-flex text-dark" {{ Popper::position('top')->arrow()->pop('Complain Data'); }}>
                                            {{ __('View Details') }}
                                            <span class="ms-auto">
                                                <i class="bi bi-chevron-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card bg-success text-white h-100">
                                        <div class="card-body py-5">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <h1>{{  App\Models\Complains::onlyTrashed()->count() }}</h1>
                                                    <h3>{{ __('Archive\'s') }}</h3>
                                                </div>
                                                <div class="col-sm-5">
                                                    <lord-icon
                                                        src="https://cdn.lordicon.com/bbnkwdur.json"
                                                        trigger="hover"
                                                        colors="primary:#ffffff,secondary:#ffffff"
                                                        stroke="60"
                                                        style="width:100px;height:100px">
                                                    </lord-icon>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.archive') }}" class="card-footer d-flex text-white" {{ Popper::position('top')->arrow()->pop('Approved Complains'); }}>
                                            {{ __('View Details') }}
                                            <span class="ms-auto">
                                                <i class="bi bi-chevron-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow-lg bg-danger text-white h-100">
                                        <div class="card-body py-5">
                                            <h1>{{ App\Models\Admin::all()->count() }}</h1>
                                            <h3>{{ __('Admin') }}</h3>
                                        </div>
                                        <a href={{route('admin.admin')}} class="card-footer d-flex text-white" {{ Popper::position('top')->arrow()->pop('Admin\'s Data'); }}>
                                            {{ __('View Details') }}
                                            <span class="ms-auto">
                                                <i class="bi bi-chevron-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                        </div>
                        @yield('contents')
                    </div>
                </div>
            </div>
            @endauth
            @yield('content')
        </main>
    </div>
@include('popper::assets')
<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script
</body>
</html>
