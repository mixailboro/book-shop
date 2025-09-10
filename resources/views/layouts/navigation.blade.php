<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Header -->
    <header id="wn__header" class="header__area header__absolute">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                    <div class="logo">
                        <a href="{{route('index')}}">
                            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo images">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-lg-block">
                    <nav class="mainmenu__nav">
                        <ul class="meninmenu d-flex justify-content-start">
                            <li class="drop with--one--item">
                                <a href="{{route('index')}}">Home</a>
                            </li>
                            <li class="drop">
                                <a href="{{route('books.index')}}">Shop</a>
                                <div class="megamenu mega03">
                                    <ul class="item item03">
                                        @foreach($genres as $key => $value)
                                            <a href="{{ route('genres.show', $key) }}">
                                                <li class="title">{{ $value }}</li>
                                            </a>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('contacts.show') }}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                    <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                        <li class="shopcart">
                            <a class="cartbox_active" href="#">
                                <span class="product_qun">{{$cart->count ?? ''}}</span>
                            </a>
                            <!-- Start Shopping Cart -->
                            <div class="block-minicart minicart__active">
                                <div class="minicart-content-wrapper">
                                    <div class="micart__close">
                                        <span>close</span>
                                    </div>
                                    @if(!$cart || $cart->count <= 0)
                                        <div class="content">
                                            <h6>Your cart is empty!</h6>
                                        </div>
                                    @else
                                        <div class="items-total d-flex justify-content-between">
                                            <span>{{$cart->count}} items</span>
                                            <span>Cart Subtotal</span>
                                        </div>
                                        <div class="total_amount text-right">
                                            <span>&#x20bd; {{$cart->total_cost}}</span>
                                        </div>
                                        <div class="mini_action checkout">
                                            <a class="checkout__btn" href="cart.html">Go to Checkout</a>
                                        </div>
                                        <div class="single__items">
                                            <div class="miniproduct">
                                                @foreach($cart->books as $book)
                                                    <div class="item01 d-flex">
                                                        <div class="thumb">
                                                            <a href="product-details.html"><img src="images/product/sm-img/1.jpg" alt="product images"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h6><a href="product-details.html">{{$book->title}}</a></h6>
                                                            <span class="prize">&#x20bd; {{$book->price}}</span>
                                                            <div class="product_prize d-flex justify-content-between">
                                                                <span class="qun">Qty: {{$book->pivot->quantity}}</span>
                                                                <ul class="d-flex justify-content-end">
                                                                    <li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
                                                                    <li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mini_action cart">
                                            <a class="cart__btn" href="cart.html">View and edit cart</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- End Shopping Cart -->
                        </li>
                        <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
                            <div class="searchbar__content setting__block">
                                <div class="content-inner">
                                    @auth
                                        <div class="switcher-currency">
                                            <strong class="label switcher-label">
                                                <span>{{ Auth::user()->name ?? '' }}</span>
                                            </strong>
                                            <div class="switcher-options">
                                                <div class="switcher-currency-trigger">
                                                    <div class="setting__menu">
                                                        <span><a href="{{route('profile.edit')}}">Profile</a></span>
                                                        <span>
                                                            <form method="POST" action="{{ route('logout') }}">
                                                                @csrf

                                                                <x-dropdown-link :href="route('logout')"
                                                                                 onclick="event.preventDefault();
                                                                                    this.closest('form').submit();">
                                                                    Log Out
                                                                </x-dropdown-link>
                                                            </form>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{route('login')}}">Log In</a>
                                    @endauth
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Start Mobile Menu -->
            <div class="row d-none">
                <div class="col-lg-12 d-none">
                    <nav class="mobilemenu__nav">
                        <ul class="meninmenu">
                            <li><a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html">Home Style Default</a></li>
                                    <li><a href="index-2.html">Home Style Two</a></li>
                                    <li><a href="index-box.html">Home Box Style</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul>
                                    <li><a href="about.html">About Page</a></li>
                                    <li><a href="portfolio.html">Portfolio</a>
                                        <ul>
                                            <li><a href="portfolio.html">Portfolio</a></li>
                                            <li><a href="portfolio-three-column.html">Portfolio 3 Column</a></li>
                                            <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="cart.html">Cart Page</a></li>
                                    <li><a href="checkout.html">Checkout Page</a></li>
                                    <li><a href="wishlist.html">Wishlist Page</a></li>
                                    <li><a href="error404.html">404 Page</a></li>
                                    <li><a href="faq.html">Faq Page</a></li>
                                    <li><a href="team.html">Team Page</a></li>
                                </ul>
                            </li>
                            <li><a href="shop-grid.html">Shop</a>
                                <ul>
                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                    <li><a href="shop-list.html">Shop List</a></li>
                                    <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                    <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                    <li><a href="shop-no-sidebar.html">Shop No sidebar</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog Page</a></li>
                                    <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                    <li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- End Mobile Menu -->
            <div class="mobile-menu d-block d-lg-none">
            </div>
            <!-- Mobile Menu -->
        </div>
    </header>
    <!-- //Header -->
</nav>
