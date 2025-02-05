<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SGA Project')</title>
    @vite(['resources/css/app.css'])

    
    <style>
        .bg-navbar {
            background-color: #94cc83
        }
    </style>
</head>

@yield('page-style')

<body>
    @include('layouts.navbar')
    @yield('content')
</body>

@vite(['resources/js/app.js'])

@yield('page-script')

</html>