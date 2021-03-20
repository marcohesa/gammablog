

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('iGamma/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('iGamma/css/material-kit.css') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('iGamma/demo/demo.css') }}" rel="stylesheet" />
  <link href="{{ asset('iGamma/demo/vertical-nav.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('iGamma/css/swiper.min.css') }}">
  @livewireStyles
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <style>
    .description, .card-description, .footer-big p {
        color: #000000;
    }

    #back {
    display: block!important;
    }

    @media (max-width: 600px) {
      #back {
        display: none!important;
      }
    }


    
  </style>
</head>
<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
  <div class="container">
    <div class="navbar-translate">
      <a class="navbar-brand" href="">
        <strong>Blog i-Gamma</strong> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="ml-auto navbar-nav">
        <li class="nav-item">
          <a href="{{ route('posts.index') }}" class="nav-link">
            INICIO
          </a>
        </li>
        @if (Route::has('login'))
            @auth
              <li class="dropdown nav-item">
                <a href="#pablo" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                  <div class="profile-photo-small">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="Circle Image" class="rounded-circle img-fluid">
                  </div>
                <div class="ripple-container"></div></a>
                <div class="dropdown-menu dropdown-menu-right hiding">
                  <h6 class="dropdown-header">{{ Auth::user()->name }}</h6>
                  <a href="{{ route('profile.show') }}" class="dropdown-item">Perfil</a>
                  @can('dashboard')
                     <a href="{{ route('admin') }}" class="dropdown-item">Panel de administración</a>
                  @endcan
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Cerrar session') }}
                    </a>
                </form>
                
                </div>
              </li>
            @else
              <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">
                  INICIAR SESIÓN
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">
                  REGISTRARSE
                </a>
              </li>
            @endauth
        @endif
        
      </ul>
    </div>
  </div>
</nav>

<body class="blog-posts sidebar-collapse">
  <div style="background-image: url('../img/bg13.jpg')" class="page-header header-filter header-small" data-parallax="true">
    <div class="container">
      <div class="row">
        <div class="ml-auto mr-auto text-center col-md-8">
       
          @yield('cover')
        
         
        </div>
      </div>
    </div>
  </div>
 
  @yield('content')


  <!--   Core JS Files   -->
  <script src="{{ asset('iGamma/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('iGamma/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('iGamma/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('iGamma/js/plugins/moment.min.js') }}"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset('iGamma/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('iGamma/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset('iGamma/js/plugins/bootstrap-tagsinput.js') }}"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset('iGamma/js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>
  <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset('iGamma/js/plugins/jasny-bootstrap.min.js') }}" type="text/javascript"></script>
  <!--	Plugin for Small Gallery in Product Page -->
  <script src="{{ asset('iGamma/js/plugins/jquery.flexisel.js') }}" type="text/javascript"></script>
  <!-- Plugins for presentation and navigation  -->
  <script src="{{ asset('iGamma/demo/modernizr.js') }}" type="text/javascript"></script>
  <script src="{{ asset('iGamma/demo/vertical-nav.js') }}" type="text/javascript"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
  <script src="{{ asset('iGamma/demo/demo.js') }}" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('iGamma/js/material-kit.js') }}" type="text/javascript"></script>
  <!--SwiperJS-->
  <script src="{{ asset('iGamma/js/swiper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
     // autoplay: {
       // delay: 3000,
      // },
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: '1',
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : false,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>.
    @livewireScripts
</body>


</html>
