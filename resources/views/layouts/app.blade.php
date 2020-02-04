<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Airlangga Education Center</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .image{
      background-image: url('../argon/assets/img/theme/p4.JPG');
      background-color: #cccccc;
      height: 1000px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;  
    }
    .text{
      text-align: center;
      position: absolute;
      top: 60%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
    }
    </style>
</head>
<body class="image">
  <div id="app">
    <nav class="navbar fixed-top navbar-expand-md navbar-dark" id="sidenav-main" style="background-color:rgba(259,258,255,0.2)">
      <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
          <img width="150px" height="40px" src="{{ asset('argon/assets/img/theme/mbi_logo.png') }}">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">

              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
                      <li class="nav-item">
                      <i class="ni ni-key-25"></i>
                          <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                          <i class="ni ni-circle-08"></i>
                              <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>hallo!  
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div> -->
                      </li>
                  @endguest
              </ul>
        </div>
      </div>
    </nav>
      <main class="py-4">
          @yield('content')
      </main>
  </div>
  <div class="jumbotron jumbotron-fluid mt-3 mb-3" style="background-color:rgba(259,258,255,0.1);">
    <div class="container">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
          <br>
            <img src="{{ asset('argon/assets/img/theme/airlangga.png') }}" class="offset-md-3 w-50 d-inline-block" alt="...">
            <div class="carousel-caption d-none d-sm-block">
            </div>
          </div>
          <div class="carousel-item">
          <br>
            <img src="{{ asset('argon/assets/img/theme/mbi_logo.png') }}" class="offset-md-3 d-block w-50" alt="...">
            <div class="carousel-caption d-none d-sm-block">
            </div>
          </div>
        </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
    </div> 
  </div>
  <div class="text">
    <h1 style="font-size:50px; text-shadow: 2px 2px grey;">Admin</h1>
    <h5>untuk keamanan data masuk dengan login!</h5><br>
      <ul class="navbar-nav ml-auto">
        @guest
        <li class="nav-item">
        <i class="ni ni-key-25"></i>
            <a class="btn btn-outline-primary" style="box-shadow: 2px 2px grey;" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <br>
          @if (Route::has('register'))
            <!-- <li class="nav-item">
            <i class="ni ni-circle-08"></i>
                <a class="btn btn-outline-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li> -->
          @endif
    
          @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>hallo!  
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
    
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
      </ul>
  </div>
  <footer class="footer fixed-bottom pt-3 pb-3" style="background-color:rgba(259,258,255,0.1)">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2018 <a href="#" class="font-weight-bold ml-1 text-light" target="_blank">TeamQdev </a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="#" class="nav-link text-light" target="_blank">Team Qdev Pt.MBI</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-light" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link text-light" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link text-light" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
</body>
</html>
