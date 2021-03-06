<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rangeslider.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-2 bg-white" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-11 col-xl-2">
                    <h1 class="mb-0 site-logo"><a href="index.html" class="text-black h2 mb-0">{{ config('app.name') }}</a></h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            @if (Route::has('login'))
                                    @auth
                                        <li class="active"><a href="{{ url('/') }}"><span>Home</span></a></li>
                                        <li class=""><a href="{{ url('/home') }}"><span>Dashboard</span></a></li>
                                    @else
                                        <li> <a href="{{ route('login') }}"><span>Login</span></a></li>
                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}"><span>Register</span></a></li>
                                        @endif
                                    @endauth
                            @endif
                            <li>
                                <a href="#"><span>About</span></a>
                            </li>
                            <li><a href="#"><span>Blog</span></a></li>
                            <li><a href="#"><span>Contact</span></a></li>
                            @auth
                                    <li class="nav-item dropdown">
                                        <a  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span>{{ __('Logout') }}</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                            @endauth
                        </ul>
                    </nav>
                </div>


                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

            </div>

        </div>
    </header>



<div class="site-blocks-cover overlay" style="background-image: url({{ asset('img/banner.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10">


                <div class="row justify-content-center mb-4">
                    <div class="col-md-8 text-center">
                        <h1 data-aos="fade-up">Find Nearby <span class="typed-words"></span></h1>
                        <p data-aos="fade-up" data-aos-delay="100">Drop off your luggage or vehicle in our partner shops and hotels and enjoy your day!</p>
                    </div>
                </div>

                <div class="form-search-wrap p-2" data-aos="fade-up" data-aos-delay="200">
                    <form method="GET" action="{{ route('customer.dashboard') }}">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-xl-10 no-sm-border border-right">
                                <div class="wrap-icon">
                                    <span class="icon icon-room"></span>
                                    <input type="text" class="form-control" placeholder="Location">
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-2 ml-auto text-right">
                                <input type="submit" class="btn btn-primary" value="Search">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="site-section" data-aos="fade">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">How It Works</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4  col-lg-4 text-center">
                <img src="{{ asset('img/phone.svg') }}" alt="Image" class="img-fluid">
                <h2 class="mb-1"><a href="#">Book Online</a></h2>
                <span class="address">Find the location closest to you. We have locations all around the city.</span>
            </div>
            <div class="col-md-6 mb-4  col-lg-4 text-center">
                    <img src="{{ asset('img/bags.svg') }}" alt="Image" class="img-fluid">
                    <h2 class="mb-1"><a href="#">Drop Off Items</a></h2>
                    <span class="address">Show your booking receipt and you're good to go. Secured and insured.</span>
            </div>
            <div class="col-md-6 mb-4  col-lg-4 text-center">
                    <img src="{{ asset('img/city.svg') }}" alt="Image" class="img-fluid">
                    <h2 class="mb-1"><a href="#">Enjoy the City</a></h2>
                    <span class="address">Go about your day without lugging around your things.</span>
            </div>
        </div>
    </div>
</div>

<div class="site-section" data-aos="fade">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Top Locations</h2>
                <p class="color-black-opacity-5">The world's largest network of luggage storage 2000+ places in more than 250 cities</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="{{ asset('img/kerala.jpg') }}" alt="Image" class="img-fluid" width="400px" height="400px">
                    </div>
                    <div class="listing-item-content">
                        <a href="#" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
                        <span class="address">Kerala</span>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="{{ asset('img/Chennai.jpg') }}" alt="Image" class="img-fluid" width="400px" height="400px">
                    </div>
                    <div class="listing-item-content">
                        <a href="#" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
                        <span class="address">Tamil Nadu</span>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="{{ asset('img/ahmedabad.jpg') }}" alt="Image" class="img-fluid" width="400px" height="400px">
                    </div>
                    <div class="listing-item-content">
                        <a href="#" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
                        <span class="address">Gujarat</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="site-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('img/mark.jpg') }}" alt="Image" class="img-fluid rounded">
            </div>
            <div class="col-md-5 ml-auto">
                <h2 class="text-primary mb-3">Why Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam voluptates a explicabo delectus sed labore dolor enim optio odio at!</p>
                <p class="mb-4">Adipisci dolore reprehenderit est et assumenda veritatis, ex voluptate odio consequuntur quo ipsa accusamus dicta laborum exercitationem aspernatur reiciendis perspiciatis!</p>

                <ul class="ul-check list-unstyled success">
                    <li>Checked luggage storages</li>
                    <li>available 24/7</li>
                    <li>Insurance</li>
                    <li>Secure payment</li>
                    <li>Customer service</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">

        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Testimonials</h2>
            </div>
        </div>

        <div class="slide-one-item home-slider owl-carousel">
            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="{{ asset('img/person_3.jpg' ) }}" alt="Image" class="img-fluid mb-3">
                        <p>John Smith</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                </div>
            </div>
            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="{{ asset('img/person_2.jpg') }}" alt="Image" class="img-fluid mb-3">
                        <p>Christine Aguilar</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                </div>
            </div>

            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="{{ asset('img/person_4.jpg') }}" alt="Image" class="img-fluid mb-3">
                        <p>Robert Spears</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                </div>
            </div>

            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="{{ asset('img/person_5.jpg') }}" alt="Image" class="img-fluid mb-3">
                        <p>Bruce Rogers</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Our Blog</h2>
                <p class="color-black-opacity-5">See Our Daily News &amp; Updates</p>
            </div>
        </div>
        <div class="row mb-3 align-items-stretch">
            <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
                <div class="h-entry">
                    <img src="{{ asset('img/hero_1.jpg') }}" alt="Image" class="img-fluid">
                    <h2 class="font-size-regular"><a href="#">How To List Your Hotel</a></h2>
                    <div class="meta mb-4">by Theresa Winston <span class="mx-2">&bullet;</span> Jan 18, 2019 at 2:00 pm <span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
                <div class="h-entry">
                    <img src="{{ asset('img/hero_1.jpg') }}" alt="Image" class="img-fluid">
                    <h2 class="font-size-regular"><a href="#">How To List Your Parking Space</a></h2>
                    <div class="meta mb-4">by Theresa Winston <span class="mx-2">&bullet;</span> Jan 18, 2019 at 2:00 pm <span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Frequently Ask Question</h2>
                <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-8">
                <div class="border p-3 rounded mb-2">
                    <a data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1" class="accordion-item h5 d-block mb-0">Do I need Cash?</a>

                    <div class="collapse" id="collapse-1">
                        <div class="pt-2">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                        </div>
                    </div>
                </div>

                <div class="border p-3 rounded mb-2">
                    <a data-toggle="collapse" href="#collapse-4" role="button" aria-expanded="false" aria-controls="collapse-4" class="accordion-item h5 d-block mb-0">Is this available in my country?</a>

                    <div class="collapse" id="collapse-4">
                        <div class="pt-2">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                        </div>
                    </div>
                </div>

                <div class="border p-3 rounded mb-2">
                    <a data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false" aria-controls="collapse-2" class="accordion-item h5 d-block mb-0">Can I store my items for a week or a month?</a>

                    <div class="collapse" id="collapse-2">
                        <div class="pt-2">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                        </div>
                    </div>
                </div>

                <div class="border p-3 rounded mb-2">
                    <a data-toggle="collapse" href="#collapse-3" role="button" aria-expanded="false" aria-controls="collapse-3" class="accordion-item h5 d-block mb-0">What can I store?</a>

                    <div class="collapse" id="collapse-3">
                        <div class="pt-2">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti esse voluptates deleniti, ratione, suscipit quam cumque beatae, enim mollitia voluptatum velit excepturi possimus odio dolore molestiae officiis aspernatur provident praesentium.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="py-5 bg-primary">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h2 class="mb-2 text-white">Let's get started. Create your account</h2>
                <p class="mb-4 lead text-white-opacity-05">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, fugit?</p>
                <p class="mb-0"><a href="{{ route('register') }}" class="btn btn-outline-white text-white btn-md font-weight-bold">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <h2 class="footer-heading mb-4">Quick Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h2 class="footer-heading mb-4">Products</h2>
                        <ul class="list-unstyled">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h2 class="footer-heading mb-4">Features</h2>
                        <ul class="list-unstyled">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h2 class="footer-heading mb-4">Follow Us</h2>
                        <a href="#" class="pl-0 pr-3"><span class="fa fa-facebook"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="fa fa-instagram"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="fa fa-twitter"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary text-white" type="button" id="button-addon2">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <div class="border-top pt-5">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved   <i class="icon-heart" aria-hidden="true"></i> by <a href="#" target="_blank" >Leave Your Stuff</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>
</div>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js')  }}'"></script>
<script src="{{ asset('js/owl.carousel.min.js')  }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js')  }}"></script>
<script src="{{ asset('js/jquery.countdown.min.js')  }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js')  }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js')  }}"></script>
<script src="{{ asset('js/aos.js')  }}"></script>
<script src="{{ asset('js/rangeslider.min.js')  }}"></script>


<script src="{{ asset('js/typed.js') }}"></script>
<script>
    var typed = new Typed('.typed-words', {
        strings: ["Storage Location", "Vehicle Parking"],
        typeSpeed: 80,
        backSpeed: 80,
        backDelay: 4000,
        startDelay: 1000,
        loop: true,
        showCursor: true
    });
</script>

<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
