<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WEM</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ URL::asset('/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{ URL::asset('/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->
</head>
<body>
  

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center blue-grey-text text-lighten-4" style="font-weight: bolder; font-family: 'Libre Baskerville', serif;">World E Metro</h1>
        <div class="row center">
          <h5 class="header col s12 light" style="font-weight: bolder">Luxury and sophistication at your wrist</h5>
        </div>
        <div class="row center">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" id="download-button" class="btn-large waves-effect waves-light grey darken-4 white-text pulse">Home</a>
                    @else
                        <a href="{{ route('login') }}" id="download-button" class="btn-large waves-effect waves-light grey lighten-5 black-text pulse">Login</a>
                        <a href="{{ route('register') }}" id="download-button" class="btn-large waves-effect waves-light grey darken-4 white-text pulse">Register</a>
                    @endauth
                </div>
            @endif
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="{{ URL::asset('/css/background1.jpg') }}" alt="Unsplashed background img 1"></div>
  </div>

    <div class="">
    <div class="section" >

      <!--   Icon Section   -->
      <div class="carousel carousel-slider" style="height:500px;">
        <a class="carousel-item" ><img src="{{ URL::asset('/css/buy.jpg') }}"></a>
        <a class="carousel-item" ><img src="{{ URL::asset('/css/sell.jpg') }}"></a>
        <a class="carousel-item" ><img src="{{ URL::asset('/css/trade.jpg') }}"></a>
        <a class="carousel-item" ><img src="{{ URL::asset('/css/pawn.jpg') }}"></a>
      </div>

    </div>
  </div>

  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
        <div style="height:90px"> </div>
        <div class="row center">
            
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" id="download-button" class="btn-large waves-effect waves-light grey lighten-5 black-text pulse">Home</a>
                    @else
                        <a href="{{ route('login') }}" id="download-button" class="btn-large waves-effect waves-light grey darken-4 white-text pulse">Login</a>
                        <a href="{{ route('register') }}" id="download-button" class="btn-large waves-effect waves-light grey lighten-5 black-text pulse">Register</a>
                    @endauth
                </div>
            @endif
        
        </div>

        <div class="row center">
          <h5 class="header col s12 grey-text text-darken-3" style="font-weight: bolder;">Boldness and elegance within your grasp</h5>
        </div>
        <h1 class="header center grey-text text-darken-3" style="font-weight: bolder; font-family: 'Libre Baskerville', serif;">BAGAHOLIC</h1>
      </div>

    <div class="parallax"><img src="{{ URL::asset('/css/background2.jpg') }}" alt="Unsplashed background img 2"></div>
  </div>



<!--  Scripts-->
  <script src="{{ URL::asset('https://code.jquery.com/jquery-2.1.1.min.js') }}"></script>
  <script src="{{ URL::asset('/js/materialize.js') }}"></script>
  <script src="{{ URL::asset('js/init.js') }}"></script>

  <script>
    $('.carousel.carousel-slider').carousel({
    fullWidth: true
  });
  </script>
</body>
</html>