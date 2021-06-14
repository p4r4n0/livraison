
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Safouane Quick Food</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body style="padding-bottom: 408px;">
	<div  id="footer"  ><a href="/" class="logo router-link-active"><img src="{{ asset('/img/logo.png') }}" alt="logo"></a> <div class="social_icons"><a href="https://www.facebook.com/TacosDeLyonpageofficiel/" class="fa fa-facebook" target="_blank"></a> <a href="#" class="fa fa-twitter"></a> <a href="#" class="fa fa-linkedin"></a> <a href="#" class="fa fa-instagram"></a></div> <div class="copyright">
        All rights reserved TACOS DE LYON 2020 © Developed by <a href="" class="" target="_blank">SAFOUANE</a> <br> <a href="#" class="small"> Avis de confidentialité </a></div></div>
        <div class="container-fluid">
    <div class="h-100 mx-auto row wrapper">
        <aside class="col-12 col-sm-3 h-100">
            <nav id="sidebar" class="navbar-expand-sm align-items-start flex-sm-column flex-row">
                <a href class="navbar-toggler" data-toggle="collapse" data-target=".sidebar">
                   <i class="fa fa-navicon fa-fw"></i>
                </a>

        <div class="collapse navbar-collapse sidebar">
        <ul class="flex-column navbar-nav w-100 justify-content-between">
				<div class=" text-center py-4">
	  			<div class="image d-none d-xl-block">
	  				<img src="{{ asset('img/logo.png') }}" />
	  			</div>
              </div>
              
			@if($user = Auth::user())
			<div class="img bg-wrap text-center py-4" style="background-image: url(img/bg_1.jpg);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url('{{$user->avatar}}');"></div>
            <h3>{{$user->name}}</h3>
            <form action="{{ route('logout') }}" method="POST" >
              @csrf
					    <button type="submit" class="btn btn-sm btn-login" href=""><span class="fa fa-sign-out mr-3"></span> Logout</button>
            </form>
	  			</div>
	  		</div>
			@else
					<div class="img bg-wrap text-center py-4" style="background-image: url(img/bg_1.jpg);">
						<a class="btn btn-lg btn-social btn-facebook" href="{{ url('/auth/redirect/facebook') }}"><span class="fa fa-facebook fa-fw"></span> Login</a>
					</div>
			@endif
		  <li id="sh" class="text-center" >
              <a class="" href="#"><span class="fa fa-shopping-cart mr-3 notif"><small class="d-flex align-items-center justify-content-center" >5</small></span></a>
          </li>
          <li class="active">
            <a href="#Accueil"><span class="fa fa-home mr-3"></span> Accueil</a>
          </li>
		  
		  	<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle dropdown-toggle-split" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa fa-tasks mr-3"></i> Categories
			  </a>
			  <div class="dropdown-menu" id="submenu_bar" aria-labelledby="navbardrop">
				<a class="dropdown-item" href="#Tacos">Tacos</a>
				<a class="dropdown-item" href="#Burger">Burger</a>
				<a class="dropdown-item" href="#Pizza">Pizza</a>
			  </div>
		  </li>
		  <hr/>
          <li>
              <a href="{{url('/Services')}}"><span class="fa fa-download mr-3"></span> Services</a>
          </li>
          <li>
            <a href="{{url('/A-Propos')}}"><span class="fa fa-info-circle mr-3"></span> A Propos</a>
          </li>
          <li>
            <a href="{{url('/Advantages')}}"><span class="fa fa-trophy mr-3"></span> Les Avantages</a>
          </li>
          <li>
            <a href="{{url('/Contact')}}"><span class="fa fa-envelope mr-3"></span> Contactez-vous</a>
          </li>
		  </ul>
		  </div>
            </nav>
        </aside>
        <main id="content" class="col bg-faded py-3">
            <div class="container" >
                @yield('content')
            </div>
        </main>
    </div>
</div>
</body>
<script src="{{ mix('/js/app.js') }}"></script>
</html>