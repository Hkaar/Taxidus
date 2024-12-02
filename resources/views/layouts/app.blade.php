<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title : config('app.name', 'Untitled App') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (isset($head) && $head->hasActualContent())
      {{ $head }}
    @endif
  </head>

  <body class="antialiased overflow-x-hidden scroll-smooth">
    {{ $slot }}

    @if (isset($end) && $end->hasActualContent())
      {{ $end }}
    @endif
  </body>
</html>
