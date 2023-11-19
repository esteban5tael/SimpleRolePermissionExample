<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', '')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bs5.css') }}">


    @yield('styles')
</head>

<body>
    <header>
        @include('layouts.partials.navbar')
        <h3 class="text-center rounded m-1">@yield('h3', '')</h3>
    </header>
    <main>
        <div class="m-1">
            @yield('content')
        </div>
    </main>

    @include('layouts.partials.footer')
    <script src="{{ asset('assets/js/bs5.js') }}"></script>
    @yield('scripts')
</body>

</html>
