<!DOCTYPE html>
<html lang="pt-br">

<head>
    {{-- <title>BibliDiniz - @yield('titulo')</title> --}}
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Meus Livros') }} - @yield('titulo')</title>

    <!-- Scripts -->
    <script src="{{ asset('resources/js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="http://localhost:35729/livereload.js"></script>
    <link href="{{ asset('resources/css/tailwind.min.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/bootstrap_v5_1_3.min.css') }}" rel="stylesheet">
    @yield('css-extra')
    <!-- Styles -->
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        @component('layouts.components.navbar') @endcomponent
        {{-- @include('site.layouts._partials.topo') --}}
        @yield('conteudo')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
                integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
        </script>        

        @yield('js-extra')
    </div>
</body>

</html>
