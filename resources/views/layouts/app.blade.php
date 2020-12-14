<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RHV Admin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"  align="center">
                <a id = "ust_a"class="navbar-brand" style="width:30%;margin-left:35%;"href="http://www.toti.com.tr/">
                    <h1><span style="color:lightsalmon;">R.H.V.</span> Web Yazılım</h1>
                    <h3>Admin Panel</h3>
                </a>
               
                        <style>
                            #ust_a{
                                margin-left: -200px!important;
                            }
                        </style>
        </nav>
        
        <main class="py-4">
            
             @extends('flash-message')
            @yield('content')
        </main>
    </div>
</body>
</html>
