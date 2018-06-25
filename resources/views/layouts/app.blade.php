<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

<link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/css/usaf.css') }}" rel="stylesheet">
<link href="{{ asset('public/css/font-awesome.css') }}" rel="stylesheet" />
<script src="{{ asset('public/js/jquery-1.12.4.js') }}"></script>
<script src="{{ asset('public/js/jqueryUI-v1.12.1.js') }}"></script>
</head>
<script type="text/javascript">
  function hidemsg(){
    setTimeout(function() {
    $('#msg').fadeOut('slow');
}, 2000); // <-- time in milliseconds
  }
</script>
<body onload="hidemsg();">
    <div id="app">
        <nav class="navbar navbar-inverse" style="margin: 0px;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="glyphicon glyphicon-user" style="color: white;"></span><span class="caret" style="color: white;"></span>
        
      </button>
      <a class="navbar-brand" href="{{ url('/') }}"><font color="white">Mobile Store</font></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      
      <ul class="nav navbar-nav navbar-right">
        @guest
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Register</a></li>
        @else
        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
     Logout
    </a>
 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
    </form>
                                    </li>
                                </ul>
                            </li>
       @endguest
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




 @auth
<nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="{{ route('home') }}">Dashboard</a>
      
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
@if(Auth::user()->id==1)
<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
<ul class="nav navbar-nav">     
    <li>
<a  href="{{ route('add_product') }}">Add Product  <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-plus"></span></a>
    </li>
    <li>
<a  href="{{ route('product') }}">Product List<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a>
    </li>
     <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="imageGallery.php">Image Gallery</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="viewEducation.php">Education Posts</a></li>
            <li class="divider"></li>
            <li><a href="slider.php">Slider Images</a></li>
          </ul>
        </li>   
                     <li>
                        <a  href="{{ route('category.add') }}">Add Category<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-link"></span></a>
                    </li>
                    <li>
                        <a  href="{{ route('category.all') }}">All Categories<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-comment"></span></a>
                    </li>
                    
                     <li>
                        <a  href="{{ route('purchases') }}">purchases<span style="font-size:18px;" class="pull-right hidden-xs showopacity fa fa-user-plus"></span></a>
                    </li>
                      <li>
                        <a  href="story.php">Donor Stories<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
                    </li>
                      <li>
                        <a  href="email.php">Email<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a>
                    </li>
                     <li>
                        <a  href="news.php">News<span style="font-size:18px;" class="pull-right hidden-xs showopacity fa fa-bullhorn"></span></a>
                    </li>
                    
                    <li>
                        <a  href="sponsor.php">Sponsors<span class="pull-right hidden-xs showopacity "><i class="fa fa-handshake-o" style="font-size:18px;"> </i></span></a>
                    </li>
      </ul>
    </div>
@endif

  </div>
</nav>
 @endauth
<style type="text/css">
      body,html{
    height: 100%;
  }
  /* remove outer padding */
  .main .row{
    padding: 0px;
    margin: 0px;
  }
  /*Remove rounded coners*/
  nav.sidebar.navbar {
    border-radius: 0px;
  }
  nav.sidebar, .main{
    -webkit-transition: margin 200ms ease-out;
      -moz-transition: margin 200ms ease-out;
      -o-transition: margin 200ms ease-out;
      transition: margin 200ms ease-out;
  }
  /* Add gap to nav and right windows.*/
  .main{
    padding: 10px 10px 0 10px;
  }
  /* .....NavBar: Icon only with coloring/layout.....*/
  /*small/medium side display*/
  @media (min-width: 768px) {
    /*Allow main to be next to Nav*/
    .main{
      position: absolute;
      width: calc(100% - 40px); /*keeps 100% minus nav size*/
      margin-left: 40px;
      float: right;
    }
    /*lets nav bar to be showed on mouseover*/
    nav.sidebar:hover + .main{
      margin-left: 200px;
    }
    /*Center Brand*/
    nav.sidebar.navbar.sidebar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
      margin-left: 0px;
    }
    /*Center Brand*/
    nav.sidebar .navbar-brand, nav.sidebar .navbar-header{
      text-align: center;
      width: 100%;
      margin-left: 0px;
    }
    /*Center Icons*/
    nav.sidebar a{
      padding-right: 13px;
    }
    /*adds border top to first nav box */
    nav.sidebar .navbar-nav > li:first-child{
      border-top: 1px #e5e5e5 solid;
    }
    /*adds border to bottom nav boxes*/
    nav.sidebar .navbar-nav > li{
      border-bottom: 1px #e5e5e5 solid;
    }
    /* Colors/style dropdown box*/
    nav.sidebar .navbar-nav .open .dropdown-menu {
      position: static;
      float: none;
      width: auto;
      margin-top: 0;
      background-color: transparent;
      border: 0;
      -webkit-box-shadow: none;
      box-shadow: none;
    }
    /*allows nav box to use 100% width*/
    nav.sidebar .navbar-collapse, nav.sidebar .container-fluid{
      padding: 0 0px 0 0px;
    }
    /*colors dropdown box text */
    .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
      color: #777;
    }
    /*gives sidebar width/height*/
    nav.sidebar{
      width: 200px;
      height: 100%;
      margin-left: -160px;
      float: left;
      z-index: 8000;
      margin-bottom: 0px;
    }
    /*give sidebar 100% width;*/
    nav.sidebar li {
      width: 100%;
    }
    /* Move nav to full on mouse over*/
    nav.sidebar:hover{
      margin-left: 0px;
    }
    /*for hiden things when navbar hidden*/
    .forAnimate{
      opacity: 0;
    }
  }
  /* .....NavBar: Fully showing nav bar..... */
  @media (min-width: 1330px) {
    /*Allow main to be next to Nav*/
    .main{
      width: calc(100% - 200px); /*keeps 100% minus nav size*/
      margin-left: 200px;
    }
    /*Show all nav*/
    nav.sidebar{
      margin-left: 0px;
      float: left;
    }
    /*Show hidden items on nav*/
    nav.sidebar .forAnimate{
      opacity: 1;
    }
  }
  nav.sidebar .navbar-nav .open .dropdown-menu>li>a:hover, nav.sidebar .navbar-nav .open .dropdown-menu>li>a:focus {
    color: #CCC;
    background-color: transparent;
  }
  nav:hover .forAnimate{
    opacity: 1;
  }
  section{
    padding-left: 15px;
  }
</style>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
   
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
</body>
</html>
