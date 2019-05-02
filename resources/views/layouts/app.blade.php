<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" defer></script>
    <script src="{{ asset('js/todos.js') }}" defer></script>
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/todo-mvc-app.css') }}">
</head>
<body>
    @yield('content')

    <!-- Scripts here. Don't remove ↓ -->
    {{-- <script src="{{ asset('js/base.js') }}"></script> --}}
    {{-- <script src="/js/app.js"></script> --}}
</body>
</html>
