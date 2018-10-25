<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ecomwmece</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100">
  <!-- owl carousel-->
  <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.theme.default.css')}}">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  <!-- Favicon-->
  <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
  <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet"/>
  <!-- Tweaks for older IEs--><!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    @yield('styles')
</head>
<body>
  @include('includes.header')

  @yield('content')

  @include('includes.footer')


<!-- *** COPYRIGHT END ***-->
<!-- JavaScript files-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/popper.js/umd/popper.min.js')}}"> </script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
<script src="{{asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script src="{{asset('js/front.js')}}"></script>

@if (session()->has('error'))
  <script>
    toastr.error('{{session()->get('error')}}');
  </script>
@endif

@if (session()->has('info'))
  <script>
    toastr.info('{{session()->get('info')}}');
  </script>
@endif

@if (session()->has('success'))
  <script>
    toastr.success('{{session()->get('success')}}');
  </script>
@endif

@yield('scripts')

</body>
</html>
