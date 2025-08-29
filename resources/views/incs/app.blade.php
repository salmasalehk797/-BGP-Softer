<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="ASRP">
    <meta name="description" content="ASRP">
    <meta name="author" content="okler.net">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ASRP | Home</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <!-- <script src="{{ asset('FrontEnd/js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('FrontEnd/css/app.css') }}" rel="stylesheet"> -->

    <link href="{{ asset('/FrontEnd/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/FrontEnd/css/responsive.css') }}" rel="stylesheet">

    <script type="text/javascript" src='/FrontEnd/js/script.js'></script>
    <script type="text/javascript" src='/FrontEnd/js/jquery.js'></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="http://eprofeng.edu.eg/img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Web Fonts  -->
    <link href="../../sass/css" rel="stylesheet" type="text/css">

    

    <!--<style>
        @media only screen and (max-width: 600px) {
            .partners {
                /*width: 60%;*/
            }
        }

        html #header.header-semi-transparent-light .header-body::before {
            background: #fff !important;
        }

        html:not(.sticky-header-active) #header.header-semi-transparent-light .header-nav-main nav>ul>li:not(.active)>a {
            color: #4D6FAC;
        }
        
        #header.header-narrow .header-logo .logo-default{
            margin: 0;
            position: relative;
            z-index: 2;
            opacity: 1;
        }
        
        .pop {
             cursor: pointer;
        }
        .tp-leftarrow.tparrows.zeus.noSwipe {
            left: 8% !important;
        }
        .tp-rightarrow.tparrows.zeus.noSwipe {
            left: 92% !important;
        }

    </style>-->
</head>
<body>
    <div id="app">
        

        <main class="py-4">
            @include('FrontEnd.incs.header')
            @yield('content')
        </main>
    </div>
</body>
</html>