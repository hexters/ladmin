<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $metaTitle }}</title>

    @stack('before-styles')
    <link rel="stylesheet" href="{{ mix('/css/bs-ladmin.css') }}">
    {{ $styles ?? null }}
    @stack('after-styles')

</head>

<body class="bg-dark ladmin-auth">

    {{ $slot }}

    @stack('before-scripts')
    <script src="{{ mix('/js/bs-ladmin.js') }}"></script>
    {{ $scripts ?? null }}
    @stack('after-scripts')
</body>

</html>
