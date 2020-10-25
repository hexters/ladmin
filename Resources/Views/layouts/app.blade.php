<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }} | Administrator</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="noindex,nofollow">
  <link rel="stylesheet" href="{{ asset('/css/ladmin/app.css') }}">
</head>
<body>
  
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-0">
      <a class="navbar-brand mr-0 p-3" href="{{ route('administrator.index') }}">
        @if (config('ladmin.logo'))
          <img src="{{ config('ladmin.logo') }}" alt="Logo" width="150">
        @else 
          {{ config('app.name') }}
        @endif
      </a>
      
      <ul class="navbar-nav mr-auto">
        <li>
          <button class="border-0 btn btn-link ladmin-sidebar-toggle" type="button">
            <span class="navbar-toggler-icon"></span>
          </button>
        </li>
      </ul>
      
      <ul class="ladmin-navbar-nav ml-auto pr-3">
          <x-ladmin-notification />
          <li class="nav-item dropdown">
            
            <a id="navbarDropdown" class="nav-link dropdown-toggle pl-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Str::limit(auth()->user()->name, 10) }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu dropdown-menu-right ladmin-top-menu" aria-labelledby="navbarDropdown">
                <li class="ladmin-top-menu-body">
                  <x-ladmin-toprightmenu />
                </li>
            </ul>
        </li>
      </ul>
    </nav>
    
    <div class="ladmin-container">
      <div class="ladmin-sidebar">
        <strong class="ml-3">Main Menu</strong>
        <x-ladmin-sidebar />
      </div>

      <div class="ladmin-content">
        <div class="container">
          <x-ladmin-alert />
        </div>
        <div class="ladmin-page-title">
          <div class="container" style="position: relative;">

            <div class="row">
              <div class="col-lg-6">
                <h4>
                  @if(request()->has('back'))
                    <a href="{{ request()->get('back') }}" class="btn btn-outline-primary btn-sm mr-1 px-3">&larr;</a>
                  @endif
                  @yield('title', 'Page Title')
                </h4>
              </div>
              <div class="col-lg-6 breadcrumb-container">
                <x-ladmin-breadcrumb />
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          
          @yield('content')

        </div>
      </div>

    </div>

  </div>

  <script src="{{ asset('/js/ladmin/app.js') }}"></script>

</body>
</html>
