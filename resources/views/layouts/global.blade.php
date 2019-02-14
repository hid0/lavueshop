<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title') | {{config('app.name')}}</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- <link rel="stylesheet" href="http://localhost:3000/css/bootstrap4/dist/css/bootstrap-custom.css?v=datetime"> -->
  <link rel="stylesheet" href="{{asset('polished/polished.min.css')}}">
  <!-- <link rel="stylesheet" href="polaris-navbar.css"> -->
  <link rel="stylesheet" href="{{asset('polished/iconic/css/open-iconic-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/material-icons.css')}}">

  <link rel="icon" href="{{asset('assets/polished-logo-small.png')}}">
  <script src="{{asset('js/vue.min.js')}}"></script>

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
    #preview {
        display: block;
        justify-content: center;
        align-items: center;
    }

    .preview img#gmbr{
        height: 80px;
        width: auto;
        border-radius: 10px;
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
     <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="/">Larashop</a>
      <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button" >
        <span class="oi oi-menu"></span>
      </button>

      <input class="border-dark bg-primary-darkest form-control d-none d-md-block w-50 ml-3 mr-2" type="text" placeholder="Search" aria-label="Search">
      <div class="dropdown d-none d-md-block">
        @if (\Auth::user())
            {{-- <img class="d-none d-lg-inline rounded-circle ml-1" width="32px" src="assets/azamuddin.jpg" alt="MA"/> --}}
            <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown">
                {{Auth::user()->name}}
            </button>
        @endif
        <div class="dropdown-menu dropdown-menu-right" id="navbar-dropdown">
            <a href="#" class="dropdown-item">Profile</a>
            <a href="#" class="dropdown-item">Setting</a>
            <div class="dropdown-divider"></div>
            <li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="dropdown-item" style="cursor:pointer;">Sign Out</button>
                </form>
            </li>
        </div>
      </div>
    </nav>

  <div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex align-items-stretch m-0">
        <div class="polished-sidebar bg-light col-12 col-md-3 col-lg-2 p-0 collapse d-md-inline" id="sidebar-nav">

            <ul class="polished-sidebar-menu ml-0 pt-4 p-0 d-md-block">
              <input class="border-dark form-control d-block d-md-none mb-4" type="text" placeholder="Search" aria-label="Search" />
              <li><a href="/home"><span class="oi oi-home"></span> Home</a></li>
              <li><a href="{{ route('categories.index') }}"><span class="oi oi-tag"></span> Manage Categories </a></li>
              <li><a href="{{ route('books.index') }}"><span class="oi oi-book"></span> Manage Books </a></li>
              <li><a href="{{ route('orders.index') }}"><span class="oi oi-inbox"></span> Manage Orders</a></li>
              <li>
                <a href="{{ route('users.index') }}"><span class="oi oi-people"></span> Manage Users
                </a>
              </li>

              {{-- <li>
                  <a href="#userCollapse" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="userCollapse"><span class="oi oi-person"></span> Users</a>
                  <div class="collapse" id="userCollapse">
                    <a href="{{route('users.create')}}">Create User</a>
                    <a href="{{route('users.index')}}">List User</a>
                  </div>
              </li> --}}
              {{-- <div class="pt-4">
                  <a href="#" class="pl-3 fs-smallest fw-bold text-muted">LAYOUT OPTIONS </a>
                  <ul class="list-unstyled">
                      <li class=""><a href="two-columns.html"><span class="oi oi-vertical-align-top"></span>Two Columns</a></li>
                      <li><a href="one-column.html"><span class="oi oi-monitor"></span>One Column</a></li>
                  </ul>
              </div> --}}
              <div class="d-block d-md-none">
                  <div class="dropdown-divider"></div>
                  <li><a href="#"> Profile</a></li>
                  <li><a href="#"> Setting</a></li>
                  {{-- <li><a href="#"> Sign Out</a></li> --}}
                <li>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="dropdown-item" style="cursor:pointer;">Sign Out</button>
                    </form>
                </li>
              </div>
            </ul>
            <div class="pl-3 d-none d-md-block position-fixed" style="bottom: 0px">
                <span class="oi oi-cog"></span> Setting
            </div>
        </div>

        <div class="col-lg-10 col-md-9 p-4">
            <div class="row">
                <div class="col-md-12 pl-3 pt-2">
                    <div class="pl-3">
                        <h3>@yield('title')</h3>
                        <br />
                    </div>
                </div>
            </div>

            @yield('content')

        </div>
    </div>
</div>
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
@yield('footer-script')
</body>
</html>