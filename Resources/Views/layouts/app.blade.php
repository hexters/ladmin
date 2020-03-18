<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }} | Administrator</title>
  <link rel="stylesheet" href="{{ asset('/css/ladmin/app.css') }}">
</head>
<body>
  
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-0">
      <a class="navbar-brand mr-0 p-3" href="{{ route('administrator.index') }}">
        {{ config('app.name') }}
      </a>
      
      <ul class="navbar-nav mr-auto">
        <li>
          <button class="border-0 btn btn-link ladmin-sidebar-toggle" type="button">
            <span class="navbar-toggler-icon"></span>
          </button>
        </li>
      </ul>
      
      <ul class="ladmin-navbar-nav ml-auto pr-3">
          <li class="nav-item dropdown">
              
              <a id="navbarDropdown" class="nav-link dropdown-toggle pl-0 ladmin-notification-menu" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="fa fa-bell"></i>
                  <span class="badge badge-danger">1</span>
              </a>

              <ul class="dropdown-menu dropdown-menu-right ladmin-top-menu ladmin-notification-menu-component" aria-labelledby="navbarDropdown">
                  <li class="ladmin-top-menu-header text-center">
                    <strong>Notifications</strong>
                  </li>
                  <li class="ladmin-top-menu-body-notification">
                    
                    <div class="list-unstyled ladmin-notification-item">
                      <a href="#" class="media">
                        <div class="media-body ladmin-substr">
                          <small class="text-muted float-right">1 minutes a go</small>
                          <strong class="mt-0 mb-1">Notification Title</strong>
                          <p class="m-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                        </div>
                      </a>
                      <a href="#" class="media my-4">
                        <img src="https://via.placeholder.com/50" class="mr-3">
                        <div class="media-body ladmin-substr">
                          <small class="text-muted float-right">1 minutes a go</small>
                          <strong class="mt-0 mb-1">Notification Title</strong>
                          <p class="m-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                        </div>
                      </a>
                      <a href="#" class="media">
                        <img src="https://via.placeholder.com/50" class="mr-3">
                        <div class="media-body ladmin-substr">
                          <small class="text-muted float-right">1 minutes a go</small>
                          <strong class="mt-0 mb-1">Notification Title</strong>
                          <p class="m-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                        </div>
                      </a>
                      <a href="#" class="media">
                        <img src="https://via.placeholder.com/50" class="mr-3">
                        <div class="media-body ladmin-substr">
                          <small class="text-muted float-right">1 minutes a go</small>
                          <strong class="mt-0 mb-1">Notification Title</strong>
                          <p class="m-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                        </div>
                      </a>
                      <a href="#" class="media">
                        <div class="media-body ladmin-substr">
                          <small class="text-muted float-right">1 minutes a go</small>
                          <strong class="mt-0 mb-1">Notification Title</strong>
                          <p class="m-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                        </div>
                      </a>
                      <a href="#" class="media">
                        <img src="https://via.placeholder.com/50" class="mr-3">
                        <div class="media-body ladmin-substr">
                          <small class="text-muted float-right">1 minutes a go</small>
                          <strong class="mt-0 mb-1">Notification Title</strong>
                          <p class="m-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
                        </div>
                      </a>
                    </div>

                  </li>
                  <li class="ladmin-top-menu-footer">
                    <a href="#">
                      View All
                    </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item dropdown">
            
            <a id="navbarDropdown" class="nav-link dropdown-toggle pl-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Str::limit(auth()->user()->name, 10) }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu dropdown-menu-right ladmin-top-menu" aria-labelledby="navbarDropdown">
                <li class="ladmin-top-menu-body">
                  <ul class="ladmin-top-menu-list">
                    <li>
                      <a href="#">Profile</a>
                    </li>
                    <li>
                      <a href="#">Withdrawal</a>
                    </li>
                    <li>
                      <a href="#">Logout</a>
                    </li>
                  </ul>
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
        @include('ladmin::layouts._alert')
        <div class="ladmin-page-title">
          <div class="container-fluid" style="position: relative;">
            <x-ladmin-breadcrumb />
            <h4>@yield('title', 'Page Title')</h4>
          </div>
        </div>
        <div class="container-fluid">
          
          @yield('content')

        </div>
      </div>

    </div>

  </div>

  <script src="{{ asset('/js/ladmin/app.js') }}"></script>

</body>
</html>