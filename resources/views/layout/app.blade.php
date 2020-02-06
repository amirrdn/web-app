<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php

        ini_set('memory_limit','256M');
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="{{ asset('img/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ MetaTag::get('title') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">-->

    <!-- Scripts -->

    @include('includes.head_tags')
    <script src="https://kit.fontawesome.com/0b157cefb6.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('includes.nav_bar')
    <div class="container">
        @yield('content')
    </div>
    @include('includes.footer')
    @include('includes.foot_tags')
    @yield('script')    
</body>
</html>
