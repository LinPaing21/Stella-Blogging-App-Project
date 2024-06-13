<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Stella: @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link type="image/png" sizes="96x96" rel="icon" href="/images/icons8-s-cloud-96.png">
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?v=2" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

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
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @admin
                                        <a class="dropdown-item" href="/admin">
                                            {{ __('Dashboard') }}
                                        </a>
                                    @endadmin
                                    @if (auth()->user()->can('author') || auth()->user()->can('admin'))
                                        <a class="dropdown-item" href="{{ route('articles.create') }}">
                                            {{ __('Add Article') }}
                                        </a>
                                        <a class="dropdown-item" href="/articles?author={{ auth()->user()->username }}">
                                            {{ __('My Articles') }}
                                        </a>
                                    @endif
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row mb-5">
                @yield('content')
            </div>
        </div>

        <footer class="bg-dark text-white text-center py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 offset-lg-1  col-lg-3">
                        <h3 class="fs-2 fw-bold mb-3 ms-5 text-start">Stella Inc</h3>
                        <p class="text-white ms-5 text-start"> &copy; 2023. All rights reserved.</p>
                    </div>
                    <div class="col-md-4 offset-lg-1 col-lg-3">
                        <!-- About Us content -->
                        <h4 class="text-decoration-underline fw-bold mb-3 ms-5 text-start">About Us</h4>
                        <p class="mb-1 ms-5 text-start"><a href="https://github.com/LinPaing21" class="text-decoration-none text-white" target="_blink">Marc Shelby</a></p>
                        <p class="mb-1 ms-5 text-start"><a href="https://laracasts.com/" class="text-decoration-none text-white" target="_blink">Laracasts</a></p>
                        <p class="mb-1 ms-5 text-start"><a href="https://chat.openai.com/" class="text-decoration-none text-white" target="_blink">ChatGPT</a></p>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <!-- Contact Us content -->
                        <h4 class="text-decoration-underline fw-bold mb-3 ms-5 text-start">Contact Us</h4>
                        <!-- This mail doesn't exist. This is just sample  -->
                        <p class="mb-1 ms-5 text-start text-white-50">support.stella@gmail.com</p>
                        <p class="mb-1 ms-5 text-start text-white-50 fs-6">+959-987-654-321</p>
                        {{-- add app related social media --}}
                        <div class="ms-5 text-start fs-5">
                            <span class="pe-1"><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></span>
                            <span class="pe-1"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></span>
                            <span class="pe-1"><a href="#"><i class="fa fa-telegram" aria-hidden="true"></i></a></span>
                            <span class="pe-1"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    @if (session()->has('success'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Stella</strong>
                    <small>now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    @yield('script')

    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        })
    </script>
</body>
</html>
