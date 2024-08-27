<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

{{--    <link rel="preconnect" href="https://fonts.bunny.net">--}}
{{--    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />--}}

    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    @include('includes.header')

    <main class="min-h-[calc(100dvh-104px)]">
        @yield('content')
    </main>

    @include('includes.footer')

    @livewireScripts
</body>
</html>
