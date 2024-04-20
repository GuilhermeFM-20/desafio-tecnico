<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>{{ $title ?? 'Page Title' }}</title>
        @livewireStyles
    </head>
    <body>
        {{ $slot }}
        @livewireScripts
        @livewireScriptConfig 
    </body>
</html>
