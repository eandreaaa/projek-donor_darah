<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo-wk.png')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


	<!-- CSS here -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/progressbar_barfiller.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated-headline.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/slick.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/login.css')}}">
</head>
<body>
    <main>
        <!-- login Area Start -->
        <div class="login-form-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 mt-5">
                        <div class="login-form">
                            @if ($errors->any())
                            <div class="alert alert-warning" role="alert">
                               Silakan periksa dan coba lagi!
                              </div>
                            @endif

                            @if (Session::get('failed'))
                            <div class="alert alert-danger" role="alert">
                                {{Session::get('failed')}}
                              </div>
                            @endif
                            <form action="{{route('auth')}}" method="POST">
                                @csrf
                                <div class="login-heading">
                                    <span>Login</span>
                                    <p>Login hanya untuk staff (admin dan dukes)</p>
                                </div>
                                <div class="input-box">
                                    <div class="single-input-fields">
                                        <label>Email Address</label>
                                        <input type="text" name="email" id="email" placeholder="Email address">
                                    </div>
                                    <div class="single-input-fields">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" placeholder="Enter Password">
                                    </div>
                            </div>
                            <div class="login-footer">                
                                <button class="submit-btn3" type="submit">Login</button>
                                    <a class="exit3" href="/">Exit</a>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('./assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('./assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{ asset('./assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('./assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('./assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('./assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('./assets/js/slick.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('./assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('./assets/js/animated.headline.js')}}"></script>
    <script src="{{ asset('./assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('./assets/js/gijgo.min.js')}}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('./assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('./assets/js/jquery.sticky.js')}}"></script>
    <!-- Progress -->
    <script src="{{ asset('./assets/js/jquery.barfiller.js')}}"></script>
    
    <!-- counter , waypoint,Hover Direction -->
    <script src="{{ asset('./assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('./assets/js/waypoints.min.js')}}"></script>
    <script src="{{ asset('./assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('./assets/js/hover-direction-snake.min.js')}}"></script>

    <!-- contact js -->
    <script src="{{ asset('./assets/js/contact.js')}}"></script>
    <script src="{{ asset('./assets/js/jquery.form.js')}}"></script>
    <script src="{{ asset('./assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('./assets/js/mail-script.js')}}"></script>
    <script src="{{ asset('./assets/js/jquery.ajaxchimp.min.js')}}"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{ asset('./assets/js/plugins.js')}}"></script>
    <script src="{{ asset('./assets/js/main.js')}}"></script>
    
    </body>
</html>