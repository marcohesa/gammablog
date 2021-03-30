

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('iGamma/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Blog I-GAMMA
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

    /* width */
    ::-webkit-scrollbar {
    width: 4px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
    background: #f1f1f1; 
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
    background: rgb(83, 83, 83); 
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: rgb(83, 83, 83); 
    }

    input[type=text], input[type=email], textarea {
      background-color: rgba(255, 255, 255, 0.5)!important;
      padding: 5px!important;
      border-radius: 10px!important;
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
        <li class="nav-item">
          <a href="#subscribe" class="nav-link">
            SUSCRIBIRSE
          </a>
        </li>
        <li class="nav-item">
          <a href="#contact" class="nav-link">
            CONTACTANOS
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

  <div-m-4 class="p-4"></div-m-4>
  <footer class="footer footer-transparent footer-big pt-4">
    <div class="container">
      <div class="content">
        <div class="row">
         <div class="row col-md-6">
            <div class="col-md-12">
              <h5>Redes sociales</h5>
              <ul class="links-vertical">
                <li>
                  <a href="#pablo">
                    <i style="font-size: 15px;" class="fab fa-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="#pablo">
                    <i style="font-size: 15px;" class="fab fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="#pablo">
                    <i style="font-size: 15px;" class="fab fa-instagram"></i>
                  </a>
                </li>
              </ul>
              <h5>Acerca de Blog i-gamma</h5>
              <ul class="links-vertical">
                <li>
                  
                    <p class="px-1">Blog i-gamma es el medio de comunicación de avances cientificos de integralidad gamma, puedes conocer más dando clic en el siguiente enlace:</p> 
                    <b><a href="">Integralidad Gamma</a></b>
                 
                </li>
              
              
              </ul>
            </div>
            <div id="subscribe" class="col-md-12">
              <h5>Suscribete a I-GAMMA</h5>
              <p style="margin-bottom: 36px!important;">
                ¡Únete a nuestra comunidad y recibe noticias en tu bandeja de entrada!
              </p>
              {!! Form::open(['route' => 'posts.store']) !!}
                <div class="form-group bmd-form-group">
                  {!! Form::email('email', null, ['class'=>'form-control', 'placeholder' => 'Correo electronico']) !!}
                </div>
                {!! Form::submit('Suscribete', ['class'=>'btn btn-primary btn-block']) !!}
              {!! Form::close() !!}
         
                
            </div>
          </div>
          <div id="contact" class="col-md-6">
            <h5>Contactanos</h5>
            <p>
              Conoce más acerca de Integralidad GAMMA
            </p>
            {!! Form::open(['route' => 'posts.contactUs']) !!}
              <div class="form-group bmd-form-group">
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Nombre completo']) !!}
              </div>
              <div class="form-group bmd-form-group">
                {!! Form::email('email', null, ['class'=>'form-control', 'placeholder' => 'Correo electronico']) !!}
              </div>
              <div class="form-group bmd-form-group">
                {!! Form::textarea('body', null, ['class'=>'form-control', 'placeholder' => 'Escribenos un mensaje']) !!}
              </div>
              {!! Form::submit('Enviar', ['class'=>'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
       
              
          </div>
       
          
        </div>
      </div>
      <hr>
      <ul class="social-buttons">
        <li>
          <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        <li>
          <a href="#pablo" class="btn btn-just-icon btn-link btn-facebook">
            <i class="fa fa-facebook-square"></i>
          </a>
        </li>
        <li>
          <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble">
            <i class="fa fa-dribbble"></i>
          </a>
        </li>
        <li>
          <a href="#pablo" class="btn btn-just-icon btn-link btn-google">
            <i class="fa fa-google-plus"></i>
          </a>
        </li>
        <li>
          <a href="#pablo" class="btn btn-just-icon btn-link btn-youtube">
            <i class="fa fa-youtube-play"></i>
          </a>
        </li>
      </ul>
      <div class="copyright pull-center">
        Copyright ©
        <script>
          document.write(new Date().getFullYear());
        </script>2021 Blog i-gamma All Rights Reserved.
      </div>
    </div>
  </footer>



  @include('sweetalert::alert')
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
  <script src="{{ asset('js/disabledButton.js') }}"></script>
  <!-- Initialize Swiper -->
  <script>
    var slides;
    if (screen.width > 968) {
        slides = '3';
    } else {
        slides = '1';
    }
    var swiper = new Swiper('.swiper-container', {
     autoplay: {
       delay: 3000,
      },
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: slides,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : false,
      },
   
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination'
      },
   
    });
  </script>
    @livewireScripts
</body>


</html>
