<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title' , 'Regardons')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> {{--this tells laravel to load files from the public folder--}}
    @stack('styles') {{-- this links spacific to corresponding view pages ie home and helps to separate css code for each page --}}
</head>
<body>
    <header>
        @include('partials.header')
    </header>

    <main>
        @yield('content')
    </main>
    
    <footer>
        @include('partials.footer')
    </footer>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>