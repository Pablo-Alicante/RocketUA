<html>

<head>
    <title>@yield('title')</title>
    @vite('css/app.css')
</head>

<body>
    <nav>
        @section('barraMenu')
            <a href={{ route('home') }}>home</a>
        @show
    </nav>

    <div>
        @yield('contenido')
    </div>

</body>

</html>
