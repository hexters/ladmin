<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ asset('/css/ladmin/app.css') }}">
</head>
<body>
  
  <div id="app">
    @include('ladmin::layouts._alert')
    @yield('content')
  </div>

  <script src="{{ asset('/js/ladmin/app.js') }}"></script>

</body>
</html>