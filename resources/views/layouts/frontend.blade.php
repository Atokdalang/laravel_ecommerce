<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.png') }}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/easyzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/stylecontact.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/newsletter.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
</head>

<body>

    <!-- header start -->
    <header>
        <div class="header-top-furniture wrapper-padding-2 res-header-sm">
            <div class="container-fluid">
                <div class="header-bottom-wrapper">
                    <div class="logo-2 furniture-logo ptb-30">
                        <a href="/">
                            <img height="45" style="transform:scale(1.5);object-fit: cover;"
                                src="{{ asset('storage/images/assets/Gadget.png') }}" alt="">
                        </a>
                    </div>
                    <div class="menu-style-2 furniture-menu menu-hover">
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{ route('homepage') }}">home</a>
                                </li>
                                <li>
                                    <a href="{{ route('shop.index') }}">shop</a>
                                </li>
                                <li><a href="#">Categories</a>
                                    <ul class="single-dropdown">
                                        @foreach ($categories_menu as $category_menu)
                                            <li><a
                                                    href="{{ route('shop.index', $category_menu->slug) }}">{{ $category_menu->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.companyprofile') }}">Company Profile</a>
                                </li>
                                <li><a href="#footer">About</a></li>
                                <li>
                                    <a href="{{ route('frontend.contact') }}">contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-cart">
                        <a class="icon-cart-furniture" href="{{ route('cart.index') }}">
                            <i class="ti-shopping-cart"></i>
                            <span class="shop-count-furniture green">{{ \Cart::getTotalQuantity() }}</span>
                        </a>
                        @if (!\Cart::isEmpty())
                            <ul class="cart-dropdown">
                                @foreach (\Cart::getContent() as $item)
                                    @php
                                        $product = $item->associatedModel;
                                        $image = !empty($product->firstMedia) ? asset('storage/images/products/' . $product->firstMedia->file_name) : asset('frontend/assets/img/cart/3.jpg');
                                    @endphp
                                    <li class="single-product-cart">
                                        <div class="cart-img">
                                            <a href="{{ route('product.show', $product->slug) }}"><img
                                                    src="{{ $image }}" alt="{{ $product->name }}"
                                                    style="width:100px"></a>
                                        </div>
                                        <div class="cart-title">
                                            <h5><a
                                                    href="{{ route('product.show', $product->slug) }}">{{ $item->name }}</a>
                                            </h5>
                                            <span>{{ number_format($item->price) }} x {{ $item->quantity }}</span>
                                        </div>
                                        <div class="cart-delete">
                                            <form id="deleteCart" action="{{ route('cart.destroy', $item->id) }}"
                                                method="POST" class="d-none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a href=""
                                                onclick="event.preventDefault();document.getElementById('deleteCart').submit();"
                                                class="delete"><i class="ti-trash"></i></a>
                                        </div>
                                    </li>
                                @endforeach
                                <li class="cart-space">
                                    <div class="cart-sub">
                                        <h4>Subtotal</h4>
                                    </div>
                                    <div class="cart-price">
                                        <h4>{{ number_format(\Cart::getSubTotal()) }}</h4>
                                    </div>
                                </li>
                                <li class="cart-btn-wrapper">
                                    <a class="cart-btn btn-hover" href="{{ route('cart.index') }}">view cart</a>
                                    <a class="cart-btn btn-hover" href="{{ route('checkout.process') }}">checkout</a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li>
                                        <a href="{{ route('homepage') }}">HOME</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('shop.index') }}">shop</a>
                                    </li>
                                    <li><a href="#">categories</a>
                                        <ul>
                                            @foreach ($categories_menu as $category_menu)
                                                <li><a
                                                        href="{{ route('shop.index', $category_menu->slug) }}">{{ $category_menu->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.companyprofile') }}">Company Profile</a>
                                    </li>
                                    <li><a href="#footer">About</a></li>
                                    <li><a href="{{ route('frontend.contact') }}"> Contact </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom-furniture wrapper-padding-2 border-top-3" style="border-bottom: 1px solid #e0e0e0;">
            <div class="container-fluid">
                <div class="furniture-bottom-wrapper">
                    <div class="furniture-login">
                        <ul>
                            @guest
                                <li>Get Access: <a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li>Hello: <a href="{{ route('profile.index') }}">{{ auth()->user()->username }}</a></li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                        </ul>
                    </div>
                    <div class="furniture-search">
                        <form>
                            <input placeholder="I am Searching for . . ." type="text" name="q"
                                autocomplete="off" id="search">
                            <button disabled>
                                <i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="furniture-wishlist">
                        <ul>
                            <li>
                                <a href="{{ route('favorite.index') }}"><i class="ti-heart"></i> Favorites</a>
                            </li>
                            @auth
                                <li>
                                    <a href="{{ route('orders.index') }}"><i class="ti-money"></i> Orders</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    @yield('content')

    <!-- footer -->
    <footer id="footer" class="footer-area">
        <div class="footer-top-area pt-70 pb-35 wrapper-padding-5 bg">
            <div class="container-fluid">
                <div class="widget-wrapper">
                    <div class="row">
                        <div class="footer-widget mb-30">
                            <hr class="divider-line mt-4 mb-4 ml-3 mr-3">
                            <div class="col-md-10 offset-md-1 border-top1 d-flex flex-column align-items-center mb-3">
                                <img src="{{ asset('storage/images/assets/Gadget.png') }}" width="100px"
                                    alt="logo">
                                <br>
                                <p class="text-justify">
                                    Bird Gadget Store provides quality products from various well-known brands
                                    in
                                    electronics industry, such as smartphones, tablets, laptops, cameras, audio devices,
                                    And
                                    much more. This shop also offers various supporting accessories, such as cases,
                                    charger, earphones and spare battery.
                                    In recent years, Bird Gadget Store has grown its presence
                                    in a manner
                                    online through their e-commerce platform and official website. It is possible
                                    customers to easily buy the electronic products they want
                                    from
                                    the comfort of their own home.
                                    <br><br>
                                    Bird Gadget Store is always committed to providing the best service to customers
                                    customer
                                    they. They have a well-trained and knowledgeable sales team
                                    their products, ready to assist customers in selecting and understanding the
                                    features of
                                    the product they want.
                                    With a good reputation and guaranteed product quality, Bird Gadget Store continues
                                    growing and becoming a favorite destination for those looking for electronic devices
                                    quality and up to date.
                                </p>
                            </div>
                            <hr class="divider-line mt-4 mb-4 ml-3 mr-3">
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="footer-widget mb-30">
                                <h3 class="footer-widget-title-5 text-center">Newsletter</h3>
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        <i class="fa fa-check-circle"></i> Thank you for subscribing to Bird Gadget
                                        Store's newsletter! Stay tuned for the latest updates and exclusive offers.
                                    </div>
                                @endif
                                <div class="footer-newsletter-2">
                                    <p class="text-center">Send us your email for exciting news and special promotions.
                                    </p>
                                    <div id="mc_embed_signup" class="subscribe-form-5">
                                        <form action="{{ route('newsletter.subscribe') }}" method="POST"
                                            class="validate">
                                            @csrf
                                            <div class="mc-form">
                                                <div class="input-group">
                                                    <input type="email" value="" name="email"
                                                        class="email" placeholder="Enter your email address"
                                                        required>
                                                    <button type="submit" class="btn-subscribe">
                                                        <i class="fa fa-paper-plane"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom ptb-20 gray-bg-8">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted"><strong>© 2023 Bird Gadget Store — <a href="{{ url('/') }}"
                                style="text-decoration: none; color: gray;">
                                @Bird_Gadget_Store</a>.</strong> All rights
                        reserved.</div>
                    <div>
                        <div>
                            <div class="contact-button-container">
                                <button class="button">
                                    <div class="button-container">
                                        <span class="button-text">
                                            <span>Contact</span>
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        <span class="button-links">
                                            <a
                                                href="https://maps.google.com/maps?q=Jl.+Pendidikan,+Sidomulyo+Barat,+Tampan,+Pekanbaru,+Riau">
                                                <i class="fa-regular fas fa-location-arrow"></i>
                                            </a>
                                            <a href="https://wa.me/6282248847135">
                                                <i class="fas fa-mobile-alt"></i>
                                            </a>
                                            <a href="mailto:fadlypku1email@gmail.com">
                                                <i class="fa-solid far fa-envelope"></i>
                                            </a>
                                            <a
                                                href="https://www.privacypolicyonline.com/live.php?token=rahXz0okhrRvXSSum6K60xYQ2vlM3h4k">
                                                <i class="fas fa-shield-alt"></i>
                                            </a>
                                        </span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    @livewireScripts
    <!-- all js here -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/app.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        $(document).ready(function() {
            let bloodhound = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '{{ url('search') }}?productName=%QUERY%', //'/user/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
            });

            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'products',
                source: bloodhound,
                limit: 10,
                display: function(data) {
                    return data.name //Input value to be set when you select a suggestion.
                },
                templates: {
                    empty: [
                        '<div class="list-group-item">There are no matching search results</div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function(data) {
                        return '<div style="font-weight:normal; width:100%" class="list-group-item"><a href="{{ url('product') }}/' +
                            data.slug + '">' + data.name + '</a></div></div>'
                    }
                }
            });
        });
    </script>
</body>

</html>
