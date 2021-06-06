<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AllAboutBeauty') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href='fullcalendar/lib/main.css' rel='stylesheet' />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Icons -->
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">

    <!-- Slider -->
    <link rel="stylesheet" href="css/tiny-slider.css"/>

    <!-- tobii css -->
    <link href="css/tobii.min.css" rel="stylesheet" type="text/css" />

    jQuery
    @yield('jquery')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    <!-- Main Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="css/colors/default.css" rel="stylesheet" id="color-opt">

    <!-- Date picker -->
    <link rel="stylesheet" href="css/datepicker.min.css">

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/5f9076f587.js" crossorigin="anonymous"></script>
    <script src='fullcalendar/lib/main.js'></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!--  jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div id="app">
        @include('messages.appointment-success')
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky bg-white">

            <div class="container">
                <!-- Logo container-->
                <a class="logo" href="{{ route('welcome') }}">
                    <img src="images/logo/logo.png" height="68" class="logo-light-mode" alt="">
                </a>
                @guest
                <div class="buy-button m-3">
                    <a href="{{ route('login') }}" class="btn btn-primary">Logare</a>
                </div>
                <div class="buy-button m-3">
                    <a href="{{ route('register') }}" class="btn btn-primary">Inregistrare</a>
                </div>
                <div class="buy-button m-3">
                    <a href="{{ route('request') }}" class="btn btn-primary">Inregistrare Salon</a>
                </div>
                <!-- End Logo container-->
                @endguest

                @auth
                    <div class="buy-button">
                        <a href="{{ route('logout') }}" class="btn btn-primary"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"
                        >Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <div class="buy-button">
                        <a href="{{ route('setup') }}" class="btn btn-primary">Cont</a>
                    </div>
                @endauth

                <div id="navigation">
                    <!-- Navigation Menu-->
                    @auth
                    <ul class="navigation-menu">
                        <li><a href="{{ route('welcome') }}" class="sub-menu-item">Acasă</a></li>
                        @if (Auth::user()->role === 'admin')
                            <li><a href="{{ route('admin.request') }}" class="sub-menu-item">Cereri</a></li>
                            <li><a href="{{ route('admin.appointment') }}" class="sub-menu-item">Programări</a></li>
                            <li><a href="{{ route('admin.employee') }}" class="sub-menu-item">Angajați</a></li>
                        @endif
                        @if (Auth::user()->role === 'customer')
                            <li><a href="{{ route('customer.appointment') }}" class="sub-menu-item">Programări</a></li>
                        @endif
                        @if (Auth::user()->role === 'manager')
                            <li><a href="{{ route('manager.appointment') }}" class="sub-menu-item">Programări</a></li>
                            <li><a href="{{ route('manager.employee') }}" class="sub-menu-item">Angajați</a></li>
                        @endif
                    </ul><!--end navigation menu-->
                    @endauth
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
