<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'default') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="d-flex flex-column min-vh-100">
        <header>
            @include('statics.header')
        </header>
        <hr class="m-0">

        <main class=" flex-grow-1">
            <!-- Authentication forms -->
            @yield('login-form')
            @yield('register-form')
            <!-- Submission form -->
            @yield('story-upload')
            <!-- Main content -->
            @yield('story-cards')
            @yield('story-content')
            <!-- Profile content -->
            @yield('profile-content')
        </main>

        @include('statics.footer')
    </body>
</html>
