<!doctype html>
<html lang="en">
<head>
    <!--meta tags-->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="portfolio">
    <meta name="keywords" content="developer, resume, cv, personal, portfolio, personal resume, hossain, bhat,Md Hossain Bhat">
    <meta name="hossain" content="Md Hossain Bhat">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Md Hossain Bhat | Profile</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--==========Favicon==========-->
	<link rel="icon" href="{{asset('Front/images/favicon-16x16.png')}}" type="image/gif" sizes="16x16">

    <link rel="manifest" href="{{asset('Front/images/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!--========== Theme Fonts ==========-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,600,700,800" rel="stylesheet">

    <!--Font Awesome css-->
    <link rel="stylesheet" href="{{asset('Front/css/font-awesome.min.css')}}">

    <!--Bootstrap css-->
    <link rel="stylesheet" href="{{asset('Front/css/bootstrap.min.css')}}">

    <!--Animated headline css-->
    <link rel="stylesheet" href="{{asset('Front/css/jquery.animatedheadline.css')}}">
    
    <!--Owl carousel css-->
    <link rel="stylesheet" href="{{asset('Front/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('Front/css/owl.theme.default.css')}}">
    
    <!--Magnific popup css-->
    <link rel="stylesheet" href="{{asset('Front/css/magnific-popup.css')}}">

    <!--animate css-->
    <link rel="stylesheet" href="{{asset('Front/css/animate.css')}}">
    
    <!--Normalizer css-->
    <link rel="stylesheet" href="{{asset('Front/css/normalize.css')}}">

    <!--Theme css-->
    <link rel="stylesheet" href="{{asset('Front/css/style.css')}}">

    <!--Responsive css-->
    <link rel="stylesheet" href="{{asset('Front/css/responsive.css')}}">
</head>
<body>

    <!--preloader starts-->


    <div class="loader_bg"><div class="loader"></div></div>


    <!--preloader ends-->

        <header class="nav-area navbar-fixed-top">
        <div class="container">
            <div class="row">
                <!--main menu starts-->

                <div class="col-md-12">
                    <div class="main-menu">
                        <div class="navbar navbar-cus">
                            <div class="navbar-header">
                                <a href="{{route('index')}}" class="navbar-brand"><span class="logo">HOSSAIN BHAT</span></a>
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse">
                                <nav>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active"><a class="smooth-menu" href="#home">Home</a></li>
                                        <li><a class="smooth-menu" href="#about">About</a></li>
                                        <li><a class="smooth-menu" href="#services">Services</a></li>
                                        <li><a class="smooth-menu" href="#portfolio">Portfolio</a></li>
                                        <li><a class="smooth-menu" href="#testimonial">Testimonial</a></li>
                                        <li><a class="smooth-menu" href="#contact">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!--main menu ends-->
            </div>
        </div>
    </header>

    <!--navigation area ends-->

    <!--Banner area starts-->

    <div class="banner-area" id="home">
        <div class="banner-table">
            <div class="banner-table-cell">
                <div class="welcome-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="intro animate-scale">

                                    <h3>I am a</h3>

                                    <h1 class="ah-headline">

                                        <span class="ah-words-wrapper">
                                            <b class="is-visible">Web Developer</b>
                                            <b>Web Designer &</b>
                                            <b>Web Developer</b>
                                            
                                        </span>
                                    </h1>

                                    <a href="#contact" class="banner-btn">Contact me</a>


                                </section>

                                <div class="clearfix"></div>

                                <a class="mouse-scroll hidden-xs" href="#about">
                                    <span class="mouse">
                                        <span class="mouse-movement"></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Banner area ends-->

    <!--about area starts-->

    <div class="about-area section-padding" id="about">
        <div class="container">

            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    
                    <div class="about-text-left">
                        <h2>{{$user['name']}}</h2> <!--edit name-->
                        <h3>{{$user['designation']}}</h3> <!--edit designation-->
                        <p style="word-break: break-all;">{{$user['bio']}}</p>
                        <a href="{{asset($user['cv'])}}" target="_blanck">Download CV &nbsp; &nbsp;<i class="fa fa-download"></i></a>
                    </div>
                   
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <img src="{{asset('Front/images/about/Md Hossain Bhat.jpg')}}" class="img-responsive" alt="about image"> <!--add your image here-->
                </div>

                <div class="col-md-4 col-xs-12 col-sm-12 col-lg-4">
                    <div class="about-text-right">

                        <div id="skills">

                            <h3>My Skills</h3>

                            <div class="row">

                                <div class="col-md-12">
                                   @if($skills->count()>0)
                                        @foreach ($skills as $skill)
                                            <!-- skillbar -->
                                            <div class="skillbar" data-percent="{{$skill['persent']}}%"> <!--edit percentage-->

                                                <h6 class="skillbar-title">{{$skill['title']}}</h6> <!--edit skills-->
                                                <h6 class="skillbar-percent">{{$skill['persent']}}%</h6> <!--edit percentage-->

                                                <div class="skillbar-bar">
                                                    <div class="skillbar-child"></div>
                                                </div>

                                            </div>
                                            <!-- end skillbar -->
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <!--about area ends-->
    
    <!--Services Area Starts-->

    <div id="services" class="services-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header wow fadeInDown" data-wow-delay="0.2s">
                        <p class="line-one"></p>
                        <h2>What I Offer</h2>
                        <p class="line-one"></p>

                    </div>
                </div>
            </div>
            <div class="row">
                <div id="services-carousel" class="owl-carousel owl-theme">
                   @if($services->count()>0)
                        @foreach($services as $service)
                            <div class="single-services text-center item">
                                <div class="services-content">
                                    <h3>{{$service['title']}}</h3> <!--edit the service you give-->
                                    <p style="word-break: break-all;">{{$service['description']}}</p>
                                </div>

                            </div>
                        @endforeach
                    @endif 
                </div>

            </div>
        </div>
    </div>

    <!--Services Area Ends-->

   
    <!--Portfolio Area Starts-->

    <div id="portfolio" class="portfolio-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header wow fadeInDown" data-wow-delay="0.2s">
                        <p class="line-one"></p>
                        <h2>My Works</h2>
                        <p class="line-one"></p>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="portfolio-items">
                    @if($portfolios->count()>0)
                        @foreach($portfolios as $portfolio)
                            <div class="col-md-4 col-sm-6 col-xs-12 no-pad">
                                <div id="inline-popups" class="port-box">
                                    <a href="#{{$portfolio['id']}}" data-effect="mfp-zoom-out">
                                        <div class="hovereffect">

                                            <img src="{{asset($portfolio['image'])}}" alt="portfolio image" class="img-responsive"> <!--edit image-->
                                            <div class="overlay">
                                                <h2>{{$portfolio['title']}}</h2> <!--your project name-->
                                                <p>{{$portfolio['description']}}</p>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                                <div id="{{$portfolio['id']}}" class="white-popup mfp-with-anim mfp-hide">
                                    <div class="row">
                                        <div class="col-md-7 col-xs-12">
                                            <div class="por-img">
                                                <img src="{{asset($portfolio['image'])}}" alt="portfolio image" class="img-responsive"> <!--edit image-->
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-xs-12">
                                            <div class="por-text">
                                                <h2>{{$portfolio['title']}}</h2> <!--your project name-->
                                                <p>{{$portfolio['description']}}</p>
                                                <div class="por-text-details">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <p>link:</p>
                                                        </div>
                                                        <div class="col-xs-offset-1 col-xs-7">
                                                            <p><a target="_blank" href="{{$portfolio['link']}}">View</a></p> <!--edit here-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @endif 

                </div> <!--end portfolio grid -->

            </div>


        </div>
    </div>

    <!--Portfolio Area Ends-->
   
    <!--Testimonial Section Starts-->

    <div id="testimonial" class="testimonial-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header wow fadeInDown" data-wow-delay="0.2s">
                        <p class="line-one"></p>
                        <h2>What Clients Say</h2>
                        <p class="line-one"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="review-area">
                        <div id="testimonial-carousel" class="owl-carousel owl-theme">
                            @if($testmonials->count()>0)
                                @foreach($testmonials as $testmonial)
                                    <div class="single-testi text-center item">
                                        <div class="testi-img">
                                            <img src="{{asset($testmonial['image'])}}" alt="testimonial image"> <!--edit image-->
                                        </div>
                                        <div class="block-quote">
                                        <p>{{$testmonial['description']}}</p> <!--edit here-->
                                            <h2>{{$testmonial['name']}}</h2> <!--edit here-->
                                            <h3>{{$testmonial['company']}}</h3> <!--edit here-->
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Testimonial Section Ends-->

    <!--contact area starts-->
    
    <div class="contact-area section-padding" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header wow fadeInDown" data-wow-delay="0.2s">
                        <p class="line-one"></p>
                        <h2>Contact Us</h2>
                        <p class="line-one"></p>
                    </div>
                </div>
            </div>

         
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-contact text-center wow fadeInDown" data-wow-delay="0.2s">
                        <i class="fa fa-home"></i>
                        <h2>Location</h2>
                        <p>{{$user['location']}}</p> <!--edit here-->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-contact text-center wow fadeInDown" data-wow-delay="0.4s">
                        <i class="fa fa-phone"></i>
                        <h2>Phone: </h2>
                        <p>+88{{$user['phone']}}</p> <!--edit here-->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-contact text-center wow fadeInDown" data-wow-delay="0.6s">
                        <i class="fa fa-envelope-o"></i>
                        <h2>Email</h2>
                        <p>{{$user['email']}}</p> <!--edit here-->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-contact text-center wow fadeInDown" data-wow-delay="0.8s">
                        <i class="fa fa-gg"></i>
                        <h2>Social Media: </h2>
                        <div class="socials">
                            <a href="{{$user['facebook']}}" target="_blank"><i class="fa fa-facebook"></i></a> <!--your facebook profile link here-->
                            <a href="{{$user['linkdin']}}" target="_blank"><i class="fa fa-linkedin"></i></a> <!--your linkedin profile link here-->
                            <a href="{{$user['twitter']}}" target="_blank"><i class="fa fa-twitter"></i></a> <!--your twitter profile link here-->
                            <a href="{{$user['github']}}" target="_blank"><i class="fa fa-gitlab"></i></a> <!--your pinterest profile link here-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                 
                    <form method="post" action="{{route('index.send')}}" class="wow fadeInDown" data-wow-delay="1s">
                        @csrf

                        <div class="controls" id="contact-form">
                            <div class="row">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Enter your full name *" required="required" data-error="Fullname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="subject" class="form-control" placeholder="Enter Suject *" required="required" data-error="Suject is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Enter your email *" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Your Message *" rows="4" required="required" data-error="Leave a message for me"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                             <div class="col-md-12">
                                <input type="submit"  class="btn btn-send" value="Send message">
                            </div>
                        </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <!--contact area ends-->

    <!--Brand area starts-->

    <div class="brand-area section-padding">
        <div class="container">
                @if($logos->count()>0)
                    @foreach($logos as $logo)
                        <div class="col-md-3 col-xs-6 col-sm-3">
                            <div class="brand-logo-img wow fadeInDown" data-wow-delay="0.2s">
                                <img src="{{$logo['image']}}" width="70" alt="brand image"> 
                            </div>
                        </div>
                    @endforeach
                @endif
        </div>
    </div>

    <!--Footer Area Starts-->

    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <p><?php echo date('Y'); ?> &copy; All Right Reserved</p> <!--edit here-->
                </div>
            </div>
        </div>
    </div>

    <!--Footer Area Ends-->

    
    <!--Latest version JQuery-->
    <script src="{{asset('Front/js/jquery-3.2.1.min.js')}}"></script>

    <!--Bootstrap js-->
    <script src="{{asset('Front/js/bootstrap.min.js')}}"></script>

    <!--Magnific popup js-->
    <script src="{{asset('Front/js/jquery.magnific-popup.js')}}"></script>

    <!--Owl Carousel js-->
    <script src="{{asset('Front/js/owl.carousel.js')}}"></script>

    <!--wow js-->
    <script src="{{asset('Front/js/wow.min.js')}}"></script>

    <!--Animated headline js-->
    <script src="{{asset('Front/js/jquery.animatedheadline.js')}}"></script>
    

    <script src="{{asset('Front/js/custom.js')}}"></script>
    
    <!--Validator js-->
    <script src="{{asset('Front/js/jquery.waypoints.js')}}"></script>
    
    <!--counter up js-->
    <script src="{{asset('Front/js/jquery.counterup.min.js')}}"></script>

    <!--Validator js-->
    <script src="{{asset('Front/js/validator.js')}}"></script>

    <!--Contact js-->
    <script src="{{asset('Front/js/contact.js')}}"></script>

    <!--Main js-->
    <script src="{{asset('Front/js/main.js')}}"></script>
    
    <script>

    </script>
</body>

</html>