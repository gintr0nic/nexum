<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Nexum</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    </head>

    <body>
        @yield('content')

        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>