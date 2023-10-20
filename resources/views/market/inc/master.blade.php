<!DOCTYPE html>
<html>
  <head>
    <title>{{ config('settings.site_title') }}</title>
    <meta charset="utf-8">
    <meta name="{{ config('settings.site_name') }}" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('market')}}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('market')}}/css/animate.css">

    <link rel="stylesheet" href="{{asset('market')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('market')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('market')}}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{asset('market')}}/css/aos.css">

    <link rel="stylesheet" href="{{asset('market')}}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{asset('market')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('market')}}/css/jquery.timepicker.css">


    <link rel="stylesheet" href="{{asset('market')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('market')}}/css/icomoon.css">
    <link rel="stylesheet" href="{{asset('market')}}/css/style.css">
    @livewireStyles
  </head>
  <body class="goto-here">




    {{-- {{ dd($settings)}} --}}
    {{-- {{ config('settings.site_name') }} --}}
        <div class="py-1 bg-primary">
        @if (session()->has('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}
        </div>
        @endif
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">{{ (config('settings.default_phone')) }}</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">{{ config('settings.default_email_address') }}</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    {{-- <span class="text">3-5 Business days delivery &amp; Free Returns</span> --}}
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        @livewire('success')

	    <div class="container">
            {{-- <a class="" href="{{ route('Lang') }}?lang=en">English</a>
            <a class="" href="{{ route('Lang') }}?lang=ar">العربية</a> --}}
	      <a class="navbar-brand" href="{{url('/')}}">{{ config('settings.site_title') }}</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">{{trans('srtings.HOME')}}</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="{{route('shop')}}">Shop</a>
              	<a class="dropdown-item" href="{{route('favorite')}}">Wishlist</a>
              	<a class="dropdown-item" href="{{route('contact.index')}}">contact</a>
                <a class="dropdown-item" href="{{route('show.cart')}}">Cart</a>
                {{-- <a class="dropdown-item" href="{{route('order')}}">Checkout</a> --}}
              </div>
            </li>
	          {{-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> --}}
	          <li class="nav-item"><a href="{{route('shop')}}" class="nav-link">Shop</a></li>
	          <li class="nav-item"><a href="{{route('favorite')}}" class="nav-link">Wishlist</a></li>
	          <li class="nav-item"><a href="{{route('contact.index')}}" class="nav-link">Contact</a></li>
              @livewire('qtyCart')


            @auth()
              <form action="{{route('logout')}}" method="post" class="form-inline my-2 my-lg-0">
                  @csrf
                  <li class="nav-item">
                      <button class="btn btn-outline my-2 my-sm-0" type="submit">
                          Logout
                      </button>
                  </li>
              </form>
            @endauth
            @guest()
	          <li class="nav-item cta cta-colored"><a href="{{route('login')}}" class="nav-link">login</a></li>


            @endguest




	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->



    @yield('container')





    <footer class="ftco-footer ftco-section">
        <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">

            @auth()
            <div class="container py-4">
              <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Submit complaints and suggestions</h2>
                    <span></span>
                </div>
                <div class="col-md-6 d-flex align-items-center">

                <form method="POST" action="{{route('home')}}" class="subscribe-form">
                    @csrf
                    <div class="form-group d-flex">
                        <input name="message" type="text" class="form-control" placeholder="suggestions">
                        <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                </form>
                @endauth

                </div>
              </div>
            </div>
          <!-- </section> -->
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">{{ config('settings.site_title') }}</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                {{-- <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li> --}}
                <li class="ftco-animate"><a href="{{ config('settings.social_facebook') }}"><span class="icon-facebook"></span></a></li>
                {{-- <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li> --}}
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="{{route('shop')}}" class="py-2 d-block">Shop</a></li>
                {{-- <li><a href="#" class="py-2 d-block">About</a></li> --}}
                {{-- <li><a href="#" class="py-2 d-block">Journal</a></li> --}}
                <li><a href="{{route('contact.index')}}" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          {{-- <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div> --}}
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                {{-- <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li> --}}
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{ config('settings.default_phone') }}</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{ config('settings.default_email_address') }}</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          {{-- <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div> --}}
        </div>
      </div>
    </section>

    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  {{-- <script src="{{asset('market')}}/js/code.jquery.com_jquery-3.7.1.min.js"></script> --}}
  <script src="{{asset('market')}}/js/jquery.min.js"></script>
  <script src="{{asset('market')}}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{asset('market')}}/js/popper.min.js"></script>
  <script src="{{asset('market')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('market')}}/js/jquery.easing.1.3.js"></script>
  <script src="{{asset('market')}}/js/jquery.waypoints.min.js"></script>
  <script src="{{asset('market')}}/js/jquery.stellar.min.js"></script>
  <script src="{{asset('market')}}/js/owl.carousel.min.js"></script>
  <script src="{{asset('market')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{asset('market')}}/js/aos.js"></script>
  <script src="{{asset('market')}}/js/jquery.animateNumber.min.js"></script>
  <script src="{{asset('market')}}/js/bootstrap-datepicker.js"></script>
  <script src="{{asset('market')}}/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('market')}}/js/google-map.js"></script>
  <script src="{{asset('market')}}/js/main.js"></script>
  {{-- @yield('script') --}}
  @livewireScripts
  </body>
  </html>
