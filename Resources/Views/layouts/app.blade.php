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
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-0">
      <a class="navbar-brand mr-0 p-3" href="/">
        Ladmin
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
                Jhone Due <span class="caret"></span>
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

        <ul>
          <li class="active other and other">
            <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
          </li>
          <li>
            <a href="#"><i class="fas fa-lock"></i> Role</a>
          </li>
          <li>
            <a href="#"><i class="fas fa-lock"></i> Permission</a>
          </li>
          <li>
            <a href="#"><i class="fas fa-line-chart"></i> Report</a>
          </li>
          <li>
            <a href="#"><i class="fas fa-help"></i> Help</a>
          </li>
          <li>
            <a href="#"><i class="fas fa-user-circle"></i>Account
              <!-- <span class="badge float-right mt-1 badge-danger">1</span> -->
            </a>
            <!-- Sub Menu -->
            <ul>
              <li>
                <a href="#">Admin
                  <span class="badge float-right mt-1 badge-danger">1</span>
                </a>
              </li>
              <li>
                <a href="#">Member</a>
              </li>
            </ul>
          </li>
        </ul>

      </div>
      <div class="ladmin-content">
        <div class="container">
          
          @include('ladmin::layouts._alert')
          @yield('content')

        </div>
      </div>
    </div>

  </div>

  <script src="{{ asset('/js/ladmin/app.js') }}"></script>

</body>
</html>