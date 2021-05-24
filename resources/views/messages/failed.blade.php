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
    <!-- Navbar STart -->
    <!-- Navbar End -->
    <main class="py-4">
        <div class="container">
            <!-- Hero Start -->
            <section class="bg-home bg-light d-flex align-items-center" style="background-color: #fff !important;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="text-center">
                                <div class="icon d-flex align-items-center justify-content-center bg-soft-primary rounded-circle mx-auto" style="height: 90px; width:90px;">
                                    <i class="uil uil-thumbs-down align-middle h1 mb-0"></i>
                                </div>
                                <h1 class="my-4 fw-bold">A eșuat!</h1>
                                <a href="/" class="btn btn-soft-primary mt-3">Acasă</a>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div> <!--end container-->
            </section><!--end section-->
            <!-- Hero End -->
        </div>
    </main>
</div>
</body>
</html>


