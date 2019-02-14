<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- <title>Larashop @yield('title')</title> --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- <link rel="stylesheet" href="http://localhost:3000/css/bootstrap4/dist/css/bootstrap-custom.css?v=datetime"> -->
  <link rel="stylesheet" href="{{asset('polished/polished.min.css')}}">
  <!-- <link rel="stylesheet" href="polaris-navbar.css"> -->
  <link rel="stylesheet" href="{{asset('polished/iconic/css/open-iconic-bootstrap.min.css')}}">

  <link rel="icon" href="{{asset('assets/polished-logo-small.png')}}">

  <style>
    .grid-highlight {
      padding-top: 1rem;
      padding-bottom: 1rem;
      background-color: #5c6ac4;
      border: 1px solid #202e78;
      color: #fff;
    }

    hr {
      margin: 6rem 0;
    }

    hr+.display-3,
    hr+.display-2+.display-3 {
      margin-bottom: 2rem;
    }
  </style>
  <script type="text/javascript">
    document.documentElement.className = document.documentElement.className.replace('no-js', 'js') + (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") ? ' svg' : ' no-svg');
  </script>
  <!-- Facebook Pixel Code -->
  {{-- <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '564839313686027');
    fbq('track', 'PageView');
  </script> --}}
  {{-- <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=564839313686027&ev=PageView&noscript=1"
  /></noscript> --}}
  <!-- End Facebook Pixel Code -->

</head>

<body>

    <nav class="navbar navbar-expand p-0">
     <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="#">Larashop</a>
      <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button" >
        <span class="oi oi-menu"></span>
      </button>
    </nav>

  <div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex align-items-stretch m-0">
        <div class="col-lg-10 col-md-9 p-4">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>