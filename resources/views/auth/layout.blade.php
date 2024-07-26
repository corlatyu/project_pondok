<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

    <title>@yield('title', 'Autentikasi')</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @stack('styles')
</head>
<body>
    @yield('content')
</body>
</html>