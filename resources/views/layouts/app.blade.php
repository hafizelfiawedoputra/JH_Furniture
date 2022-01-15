<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/navigation.css') }}" rel="stylesheet" >
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

</head>
<body class="d-flex flex-column min-vh-100">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-purple shadow-sm nav">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
{{--                    <img src="ImagesWeb/logo.png">--}}
                    <h2 style="color: white">JH Furniture</h2>
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{route('viewFurniture')}}">View</a>
                        </li>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('profile')}}">Profile</a>
                            </li>
                            @if(auth()->user()->kategori == '1')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/add-furniture') }}">Add Furniture</a>
                                </li>
                            @elseif(auth()->user()->kategori == '0')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/cart') }}">Cart</a>
                                </li>
                            @endif

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="text-center mt-auto" >
            <h5 class="text-white footer" >
                Copyright &copy; Bluejack 20-1
            </h5>
        </footer>
    </div>
    <!-- Scripts -->
{{--    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>--}}
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if(session('status'))
        <script>
            swal("{{session('status')}}");
        </script>
    @endif

    @yield('scripts')
</body>
</html>
