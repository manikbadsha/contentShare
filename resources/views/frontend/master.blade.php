<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Content Sharing</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/animate-3.7.0.css">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/fonts/flat-icon/flaticon.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/nice-select.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">
</head>

<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->




    <!-- Header Area Starts -->
    <header class="header-area main-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="{{url('/')}}">MANIK BADSHA</a>
                    </div>
                    <style>
                        .logo-area {
                            padding-top: 13px;

                        }

                        .logo-area a {
                            color: black;
                        }
                    </style>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="main-menu">
                        <ul>
                            <li class="active"><a href="{{url('/')}}">home</a></li>

                            <li><a href="{{url('story/index')}}">Story</a></li>

                            <li><a href="{{url('/home')}}">Dashboard</a></li>

                            <li class="menu-btn">
                                @if(!Auth::check())

                                <a href="{{ route('login') }}" class="login">log in</a>


                                @else

                                <a class="login" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                @endif
                                <a href="{{url('user/register')}}" class="template-btn">User Register</a>
                            </li>








                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->


    @yield('content')






    <!-- Footer Area Starts -->
    <footer class="footer-area section-padding">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-3">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">top products</h3>
                            <ul>
                                <li class="mb-2"><a href="#">managed website</a></li>
                                <li class="mb-2"><a href="#">managed reputation</a></li>
                                <li class="mb-2"><a href="#">power tools</a></li>
                                <li><a href="#">marketing service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-5 offset-xl-1 col-lg-6">
                        <div class="single-widget-home mb-5 mb-lg-0">
                            <h3 class="mb-4">news letter</h3>
                            <p class="mb-4">You can trust us. we only send promo offers, not a single.</p>
                            <form method="POST" action="{{ url('company/subscribe') }}">
                                @csrf
                                <input type="email" placeholder="Your email here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email here'" name="subscribe" required>
                                <button type="submit" class="template-btn">subscribe now</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 offset-xl-1 col-lg-3">
                        <div class="single-widge-home">
                            <h3 class="mb-4">instagram feed</h3>
                            <div class="feed">
                                <img src="{{url('/')}}/assets/images/feed1.jpg" alt="feed">
                                <img src="{{url('/')}}/assets/images/feed2.jpg" alt="feed">
                                <img src="{{url('/')}}/assets/images/feed3.jpg" alt="feed">
                                <img src="{{url('/')}}/assets/images/feed4.jpg" alt="feed">
                                <img src="{{url('/')}}/assets/images/feed5.jpg" alt="feed">
                                <img src="{{url('/')}}/assets/images/feed6.jpg" alt="feed">
                                <img src="{{url('/')}}/assets/images/feed7.jpg" alt="feed">
                                <img src="{{url('/')}}/assets/images/feed8.jpg" alt="feed">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <span>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved |
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="social-icons">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-github"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="{{url('/')}}/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="{{url('/')}}/assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="{{url('/')}}/assets/js/vendor/wow.min.js"></script>
    <script src="{{url('/')}}/assets/js/vendor/owl-carousel.min.js"></script>
    <script src="{{url('/')}}/assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="{{url('/')}}/assets/js/vendor/ion.rangeSlider.js"></script>
    <script src="{{url('/')}}/assets/js/main.js"></script>
</body>

</html>