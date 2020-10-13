<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }} | Auth</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="noindex,nofollow">
  <link rel="stylesheet" href="{{ asset('/css/ladmin/app.css') }}">
</head>
<body>
  
  <div id="app">
    @yield('content')
  </div>

  <script src="{{ asset('/js/ladmin/app.js') }}"></script>
</body>
</html>
