<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes.favicons')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- fontes -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <link href="{{ asset('css/pace/pace-theme-flash.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/switchery/switchery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themes/light.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/bootstrapFileInput.js') }}" defer></script>
    <script src="{{ asset('js/modernizr.custom.js') }}" defer></script>
    <script src="{{ asset('js/waitingfor.js') }}" defer></script>

    <!--[if lt IE 9]>
    <script src="{{ asset('site/bower_components/html5shiv/dist/html5shiv.min.js') }}"></script>
    <![endif]-->
</head>
<body class="fixed-header">
@yield('content')

<!-- scripts -->
<script src="{{ asset('site/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('site/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('site/bower_components/flickity/dist/flickity.pkgd.min.js') }}"></script>
<script src="{{ asset('site/bower_components/slick-carousel/slick/slick.js') }}"></script>
<script src="{{ asset('site/scripts/functions.js') }}"></script>
</body>
</html>
