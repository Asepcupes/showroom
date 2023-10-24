<div class="topbar">
    <div class="container-topbar">
        <div class="menu-topbar-left d-none d-xl-block">
            <ul class="nav-small">
                <li><a class="font-xs" href="{{ route('buyer.about') }}">Tentang Kami</a></li>
                <li><a class="font-xs" href="{{ route('buyer.register') }}">Open a shop</a></li>
            </ul>
        </div>
        <div class="info-topbar text-center d-none d-xl-block"><span class="font-xs color-brand-3">Free shipping for all
                orders over</span><span class="font-sm-bold color-success"> $75.00</span></div>
        <div class="menu-topbar-right"><span class="font-xs color-brand-3">Need help? Call Us:</span><span
                class="font-sm-bold color-success"> + 1800 900</span>
            <div class="dropdown dropdown-language">
                <button class="btn dropdown-toggle" id="dropdownPage" type="button" data-bs-toggle="dropdown"
                    aria-expanded="true" data-bs-display="static"><span
                        class="dropdown-right font-xs color-brand-3"><img src="{{ asset('ecom/imgs/template/en.svg') }}" alt="Ecom">
                        English</span></button>
                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownPage" data-bs-popper="static">
                    <li><a class="dropdown-item" href="#"><img src="{{ asset('ecom/imgs/template/flag-en.svg') }}" alt="Ecom">
                            English</a></li>
                    <li><a class="dropdown-item" href="#"><img src="{{ asset('ecom/imgs/template/flag-fr.svg') }}" alt="Ecom">
                            Français</a></li>
                    <li><a class="dropdown-item" href="#"><img src="{{ asset('ecom/imgs/template/flag-es.svg') }}" alt="Ecom">
                            Español</a></li>
                    <li><a class="dropdown-item" href="#"><img src="{{ asset('ecom/imgs/template/flag-pt.svg') }}" alt="Ecom">
                            Português</a></li>
                    <li><a class="dropdown-item" href="#"><img src="{{ asset('ecom/imgs/template/flag-cn.svg') }}" alt="Ecom">
                            中国人</a></li>
                </ul>
            </div>
            <div class="dropdown dropdown-language">
                <button class="btn dropdown-toggle" id="dropdownPage2" type="button" data-bs-toggle="dropdown"
                    aria-expanded="true" data-bs-display="static"><span
                        class="dropdown-right font-xs color-brand-3">USD</span></button>
                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="dropdownPage2"
                    data-bs-popper="static">
                    <li><a class="dropdown-item active" href="#">USD</a></li>
                    <li><a class="dropdown-item" href="#">EUR</a></li>
                    <li><a class="dropdown-item" href="#">AUD</a></li>
                    <li><a class="dropdown-item" href="#">SGP</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo"><a class="d-flex" href="index.html"><img alt="Ecom"
                            src="{{ asset('ecom/imgs/template/logo.svg') }}"></a></div>
                <div class="header-search">
                    <div class="box-header-search">
                        <form class="form-search" method="post" action="#">
                            <div class="box-category">
                                <select class="select-active select2-hidden-accessible">
                                    <option>All categories</option>
                                    <option value="Computers Accessories">Computers Accessories</option>
                                    <option value="Cell Phones">Cell Phones</option>
                                    <option value="Gaming Gatgets">Gaming Gatgets</option>
                                    <option value="Smart watches">Smart watches</option>
                                    <option value="Wired Headphone">Wired Headphone</option>
                                    <option value="Mouse &amp; Keyboard">Mouse Keyboard</option>
                                    <option value="Headphone">Headphone</option>
                                    <option value="Bluetooth devices">Bluetooth devices</option>
                                    <option value="Cloud Software">Cloud Software</option>
                                </select>
                            </div>
                            <div class="box-keysearch">
                                <input class="form-control font-xs" type="text" value="" placeholder="Search for items">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu d-none d-xl-block">
                        <ul class="main-menu">
                            <li><a class="active" href="{{ route('buyer.home') }}">Beranda</a></li>
                            <li><a class="active" href="{{ route('buyer.login') }}">Masuk</a></li>
                            <li><a class="active" href="{{ route('buyer.register') }}">Mendaftar</a></li>

                            <li class="has-children"><a href="shop-grid.html">Shop</a>
                                <ul class="sub-menu two-col">
                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                    <li><a href="shop-grid-2.html">Shop Grid 2</a></li>
                                    <li><a href="shop-list.html">Shop list - Left sidebar</a></li>
                                    <li><a href="shop-list-2.html">Shop list - Right sidebar</a></li>
                                    <li><a href="shop-fullwidth.html">Shop Fullwidth</a></li>
                                    <li><a href="shop-single-product.html">Single Product</a></li>
                                    <li><a href="shop-single-product-2.html">Single Product 2</a></li>
                                    <li><a href="shop-single-product-3.html">Single Product 3</a></li>
                                    <li><a href="shop-single-product-4.html">Single Product 4</a></li>
                                    <li><a href="shop-cart.html">Shop Cart</a></li>
                                    <li><a href="shop-checkout.html">Shop Checkout</a></li>
                                    <li><a href="shop-compare.html">Shop Compare</a></li>
                                    <li><a href="shop-wishlist.html">Shop Wishlist</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="#">Selengkapnya</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('buyer.about') }}">Tentang Kami</a></li>
                                    <li><a href="{{ route('buyer.contact') }}">Kontak Kami</a></li>
                                    <li><a href="{{ route('buyer.term') }}">Syarat dan Ketentuan</a></li>
                                </ul>
                            </li>
                            {{-- <li class="has-children"><a href="blog.html">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">Blog - No Sidebar</a></li>
                                    <li><a href="blog-2.html">Blog - Right Sidebar</a></li>
                                    <li><a href="blog-list.html">Blog List</a></li>
                                    <li><a href="blog-big.html">Blog category big</a></li>
                                    <li><a href="blog-single.html">Blog Single - Left sidebar</a></li>
                                    <li><a href="blog-single-2.html">Blog Single - Right sidebar</a></li>
                                    <li><a href="blog-single-3.html">Blog Single - No sidebar</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </nav>
                    <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                            class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
                </div>
                <div class="header-shop">
                    <div class="d-inline-block box-dropdown-cart"><span
                            class="font-lg icon-list icon-account"><span>Account</span></span>
                        <div class="dropdown-account">
                            <ul>
                                <li><a href="page-account.html">My Account</a></li>
                                <li><a href="page-account.html">Order Tracking</a></li>
                                <li><a href="page-account.html">My Orders</a></li>
                                <li><a href="page-account.html">My Wishlist</a></li>
                                <li><a href="page-account.html">Setting</a></li>
                                <li><a href="{{ route('buyer.login') }}">Sign out</a></li>
                            </ul>
                        </div>
                    </div><a class="font-lg icon-list icon-wishlist"
                        href="shop-wishlist.html"><span>Wishlist</span><span class="number-item font-xs">5</span></a>
                    <div class="d-inline-block box-dropdown-cart"><span
                            class="font-lg icon-list icon-cart"><span>Cart</span><span
                                class="number-item font-xs">2</span></span>
                        <div class="dropdown-cart">
                            <div class="item-cart mb-20">
                                <div class="cart-image"><img src="{{ asset('ecom/imgs/page/homepage1/imgsp5.png') }}" alt="Ecom">
                                </div>
                                <div class="cart-info"><a class="font-sm-bold color-brand-3"
                                        href="shop-single-product.html">2022 Apple iMac with Retina 5K Display 8GB RAM,
                                        256GB SSD</a>
                                    <p><span class="color-brand-2 font-sm-bold">1 x $2856.4</span></p>
                                </div>
                            </div>
                            <div class="item-cart mb-20">
                                <div class="cart-image"><img src="{{ asset('ecom/imgs/page/homepage1/imgsp4.png') }}" alt="Ecom">
                                </div>
                                <div class="cart-info"><a class="font-sm-bold color-brand-3"
                                        href="shop-single-product-2.html">2022 Apple iMac with Retina 5K Display 8GB
                                        RAM, 256GB SSD</a>
                                    <p><span class="color-brand-2 font-sm-bold">1 x $2856.4</span></p>
                                </div>
                            </div>
                            <div class="border-bottom pt-0 mb-15"></div>
                            <div class="cart-total">
                                <div class="row">
                                    <div class="col-6 text-start"><span class="font-md-bold color-brand-3">Total</span>
                                    </div>
                                    <div class="col-6"><span class="font-md-bold color-brand-1">$2586.3</span></div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-6 text-start"><a class="btn btn-cart w-auto"
                                            href="shop-cart.html">View cart</a></div>
                                    <div class="col-6"><a class="btn btn-buy w-auto"
                                            href="shop-checkout.html">Checkout</a></div>
                                </div>
                            </div>
                        </div>
                    </div><a class="font-lg icon-list icon-compare" href="shop-compare.html"><span>Compare</span></a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="mobile-logo"><a class="d-flex" href="index.html"><img alt="Ecom"
                        src="{{ asset('ecom/imgs/template/logo.svg') }}"></a></div>
            <div class="perfect-scroll">
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav class="mt-15">
                        <ul class="mobile-menu font-heading">
                            <li><a class="active" href="{{ route('buyer.home') }}">Beranda</a></li>
                            <li><a class="active" href="{{ route('buyer.login') }}">Masuk</a></li>
                            <li><a class="active" href="{{ route('buyer.register') }}">Mendaftar</a></li>

                            <li class="has-children"><a href="shop-grid.html">Shop</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                    <li><a href="shop-grid-2.html">Shop Grid 2</a></li>
                                    <li><a href="shop-list.html">Shop List</a></li>
                                    <li><a href="shop-list-2.html">Shop List 2</a></li>
                                    <li><a href="shop-fullwidth.html">Shop Fullwidth</a></li>
                                    <li><a href="shop-single-product.html">Single Product</a></li>
                                    <li><a href="shop-single-product-2.html">Single Product 2</a></li>
                                    <li><a href="shop-single-product-3.html">Single Product 3</a></li>
                                    <li><a href="shop-single-product-4.html">Single Product 4</a></li>
                                    <li><a href="shop-cart.html">Shop Cart</a></li>
                                    <li><a href="shop-checkout.html">Shop Checkout</a></li>
                                    <li><a href="shop-compare.html">Shop Compare</a></li>
                                    <li><a href="shop-wishlist.html">Shop Wishlist</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="#">Selengkapnya</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('buyer.about') }}">Tentang Kami</a></li>
                                    <li><a href="{{ route('buyer.contact') }}">Kontak Kami</a></li>
                                    <li><a href="{{ route('buyer.term') }}">Syarat dan Ketentuan</a></li>
                                </ul>
                            </li>
                            {{-- <li class="has-children"><a href="blog.html">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">Blog Grid</a></li>
                                    <li><a href="blog-2.html">Blog Grid 2</a></li>
                                    <li><a href="blog-list.html">Blog List</a></li>
                                    <li><a href="blog-big.html">Blog Big</a></li>
                                    <li><a href="blog-single.html">Blog Single - Left sidebar</a></li>
                                    <li><a href="blog-single-2.html">Blog Single - Right sidebar</a></li>
                                    <li><a href="blog-single-3.html">Blog Single - No sidebar</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <div class="mobile-header-top">
                        <div class="user-account"><a href="page-account.html"><img src="{{ asset('ecom/imgs/template/ava_1.png') }}"
                                    alt="Ecom"></a>
                            <div class="content">
                                <h6 class="user-name">Hello<span class="text-brand"> Steven !</span></h6>
                                <p class="font-xs text-muted">You have 3 new messages</p>
                            </div>
                        </div>
                    </div>
                    <ul class="mobile-menu">
                        <li><a href="page-account.html">My Account</a></li>
                        <li><a href="page-account.html">Order Tracking</a></li>
                        <li><a href="page-account.html">My Orders</a></li>
                        <li><a href="page-account.html">My Wishlist</a></li>
                        <li><a href="page-account.html">Setting</a></li>
                        <li><a href="{{ route('buyer.login') }}">Sign out</a></li>
                    </ul>
                </div>
                <div class="mobile-banner">
                    <div class="bg-5 block-iphone"><span class="color-brand-3 font-sm-lh32">Starting from $899</span>
                        <h3 class="font-xl mb-10">iPhone 12 Pro 128Gb</h3>
                        <p class="font-base color-brand-3 mb-10">Special Sale</p><a class="btn btn-arrow"
                            href="shop-grid.html">learn more</a>
                    </div>
                </div>
                <div class="site-copyright color-gray-400 mt-30">Copyright 2022 &copy; Ecom - Marketplace
                    Template.<br>Designed by<a href="http://alithemes.com" target="_blank">&nbsp; AliThemes</a></div>
            </div>
        </div>
    </div>
</div>
<div class="sidebar-left"><a class="btn btn-open" href="#"></a>
    <ul class="menu-icons hidden">
        <li><a href="javascript:void(0)"><img src="{{ asset('ecom/imgs/template/monitor.svg') }}" alt="Ecom"></a></li>
        <li><a href="javascript:void(0)"><img src="{{ asset('ecom/imgs/template/mobile.svg') }}" alt="Ecom"></a></li>
        <li><a href="#"><img src="{{ asset('ecom/imgs/template/game.svg') }}" alt="Ecom"></a></li>
        <li><a href="#"><img src="{{ asset('ecom/imgs/template/clock.svg') }}" alt="Ecom"></a></li>
        <li><a href="#"><img src="{{ asset('ecom/imgs/template/airpod.svg') }}" alt="Ecom"></a></li>
        <li><a href="#"><img src="{{ asset('ecom/imgs/template/airpods.svg') }}" alt="Ecom"></a></li>
        <li><a href="#"><img src="{{ asset('ecom/imgs/template/mouse.svg') }}" alt="Ecom"></a></li>
        <li><a href="#"><img src="{{ asset('ecom/imgs/template/music-play.svg') }}" alt="Ecom"></a></li>
        <li><a href="#"><img src="{{ asset('ecom/imgs/template/bluetooth.svg') }}" alt="Ecom"></a></li>
        <li><a href="#"><img src="{{ asset('ecom/imgs/template/clound.svg') }}" alt="Ecom"></a></li>
        <li><a href="#"><img src="{{ asset('ecom/imgs/template/electricity.svg') }}" alt="Ecom"></a></li>
        <li><a href="#"><img src="{{ asset('ecom/imgs/template/cpu.svg') }}" alt="Ecom"></a></li>
        <li><a href="#"><img src="{{ asset('ecom/imgs/template/devices.svg') }}" alt="Ecom"></a></li>
        <li><a href="#"><img src="{{ asset('ecom/imgs/template/driver.svg') }}" alt="Ecom"></a></li>
        <li><a href="#"><img src="{{ asset('ecom/imgs/template/lamp.svg') }}" alt="Ecom"></a></li>
    </ul>
    <ul class="menu-texts menu-close">
        <li class="has-children"><a href="shop-grid-2.html"><span class="img-link"><img
                        src="{{ asset('ecom/imgs/template/monitor.svg') }}" alt="Ecom"></span><span class="text-link">Computers &amp;
                    Accessories</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">Computer Accessories</a></li>
                <li><a href="shop-grid.html">Computer Cases</a></li>
                <li><a href="shop-grid.html">Laptop</a></li>
                <li><a href="shop-grid.html">HDD</a></li>
                <li><a href="shop-grid.html">RAM</a></li>
                <li><a href="shop-grid.html">Headphone</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="#"><span class="img-link"><img src="{{ asset('ecom/imgs/template/mobile.svg') }}"
                        alt="Ecom"></span><span class="text-link">Cell Phones</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">Phone Accessories</a></li>
                <li><a href="shop-grid.html">Phone Cases</a></li>
                <li><a href="shop-grid.html">Postpaid Phones</a></li>
                <li><a href="shop-grid.html">Unlocked Phones</a></li>
                <li><a href="shop-grid.html">Prepaid Phones</a></li>
                <li><a href="shop-grid.html">Prepaid Plans</a></li>
                <li><a href="shop-grid.html">Refurbished Phones</a></li>
                <li><a href="shop-grid.html">Straight Talk</a></li>
                <li><a href="shop-grid.html">iPhone</a></li>
                <li><a href="shop-grid.html">Samsung Galaxy</a></li>
                <li><a href="shop-grid.html">Samsung Galaxy</a></li>
                <li><a href="shop-grid.html">Samsung Galaxy</a></li>
                <li><a href="shop-grid.html">Samsung Galaxy</a></li>
                <li><a href="shop-grid.html">Samsung Galaxy</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="shop-grid.html"><span class="img-link"><img
                        src="{{ asset('ecom/imgs/template/game.svg') }}" alt="Ecom"></span><span class="text-link">Gaming
                    Gatgets</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">Wireless Routers</a></li>
                <li><a href="shop-grid.html">Cool New Gadgets</a></li>
                <li><a href="shop-grid.html">Tech and Gadgets</a></li>
                <li><a href="shop-grid.html">Geek Gifts and Gadgets</a></li>
                <li><a href="shop-grid.html">Xbox Accessories</a></li>
                <li><a href="shop-grid.html">PlayStation Accessories</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="shop-grid.html"><span class="img-link"><img
                        src="{{ asset('ecom/imgs/template/clock.svg') }}" alt="Ecom"></span><span class="text-link">Smart
                    watches</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">Smart Watches</a></li>
                <li><a href="shop-grid.html">Fashion Smart Watches</a></li>
                <li><a href="shop-grid.html">Smart Bracelets</a></li>
                <li><a href="shop-grid.html">Pocket Watches</a></li>
                <li><a href="shop-grid.html">Smart Rings</a></li>
                <li><a href="shop-grid.html">Other Watches</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="shop-grid.html"><span class="img-link"><img
                        src="{{ asset('ecom/imgs/template/airpods.svg') }}" alt="Ecom"></span><span class="text-link">Wired
                    Headphone</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">On-Ear Headphones</a></li>
                <li><a href="shop-grid.html">Earbud & In-Ear</a></li>
                <li><a href="shop-grid.html">DJ Headphones</a></li>
                <li><a href="shop-grid.html">PC Accessories</a></li>
                <li><a href="shop-grid.html">PC Game Headsets</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="shop-grid.html"><span class="img-link"><img
                        src="{{ asset('ecom/imgs/template/mouse.svg') }}" alt="Ecom"></span><span class="text-link">Mouse &amp;
                    Keyboard</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">Logitech</a></li>
                <li><a href="shop-grid.html">Redragon</a></li>
                <li><a href="shop-grid.html">Amazon Basics</a></li>
                <li><a href="shop-grid.html">Microsoft</a></li>
                <li><a href="shop-grid.html">MageGee</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="shop-grid.html"><span class="img-link"><img
                        src="{{ asset('ecom/imgs/template/music-play.svg') }}" alt="Ecom"></span><span
                    class="text-link">Headphone</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">Car Audio Systems</a></li>
                <li><a href="shop-grid.html">Cellphones</a></li>
                <li><a href="shop-grid.html">Desktops</a></li>
                <li><a href="shop-grid.html">Gaming Consoles</a></li>
                <li><a href="shop-grid.html">Telephones</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="shop-grid.html"><span class="img-link"><img
                        src="{{ asset('ecom/imgs/template/bluetooth.svg') }}" alt="Ecom"></span><span class="text-link">Bluetooth
                    devices</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">Player Accessories</a></li>
                <li><a href="shop-grid.html">Computer Accessories</a></li>
                <li><a href="shop-grid.html">Speakers & Audio</a></li>
                <li><a href="shop-grid.html">Computer Networking</a></li>
                <li><a href="shop-grid.html">Movies & Films</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="shop-grid.html"><span class="img-link"><img
                        src="{{ asset('ecom/imgs/template/clound.svg') }}" alt="Ecom"></span><span class="text-link">Cloud
                    Software</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">Android</a></li>
                <li><a href="shop-grid.html">Linux & Unix</a></li>
                <li><a href="shop-grid.html">Macintosh</a></li>
                <li><a href="shop-grid.html">Windows</a></li>
                <li><a href="shop-grid.html">iPhone & iOS</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="shop-grid.html"><span class="img-link"><img
                        src="{{ asset('ecom/imgs/template/electricity.svg') }}" alt="Ecom"></span><span class="text-link">Electric
                    accessories</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">Antenna Toppers</a></li>
                <li><a href="shop-grid.html">Automotive Body Armor</a></li>
                <li><a href="shop-grid.html">Power Inverter</a></li>
                <li><a href="shop-grid.html">Gas Tank Doors</a></li>
                <li><a href="shop-grid.html">Hood Scoops & Vents</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="shop-grid.html"><span class="img-link"><img src="{{ asset('ecom/imgs/template/cpu.svg') }}"
                        alt="Ecom"></span><span class="text-link">Mainboard &amp; CPU</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">Computer CPU Processors</a></li>
                <li><a href="shop-grid.html">Internal Fans & Cooling</a></li>
                <li><a href="shop-grid.html">Graphics Cards</a></li>
                <li><a href="shop-grid.html">Network I/O Port Cards</a></li>
                <li><a href="shop-grid.html">Internal Memory Card</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="shop-grid.html"><span class="img-link"><img
                        src="{{ asset('ecom/imgs/template/devices.svg') }}" alt="Ecom"></span><span class="text-link">Desktop
                    PC</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">Graphic PC</a></li>
                <li><a href="shop-grid.html">Office PC</a></li>
                <li><a href="shop-grid.html">Gaming PC</a></li>
                <li><a href="shop-grid.html">Server</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="shop-grid.html"><span class="img-link"><img
                        src="{{ asset('ecom/imgs/template/driver.svg') }}" alt="Ecom"></span><span
                    class="text-link">Speaker</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">JBL</a></li>
                <li><a href="shop-grid.html">Anker</a></li>
                <li><a href="shop-grid.html">Pyle</a></li>
                <li><a href="shop-grid.html">Bose</a></li>
                <li><a href="shop-grid.html">Logitech</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="shop-grid.html"><span class="img-link"><img
                        src="{{ asset('ecom/imgs/template/airpod.svg') }}" alt="Ecom"></span><span class="text-link">Bluetooth
                    Headphone</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">On-Ear Headphones</a></li>
                <li><a href="shop-grid.html">In-Ear Headphones</a></li>
                <li><a href="shop-grid.html">Earbud</a></li>
                <li><a href="shop-grid.html">Over-Ear Headphones</a></li>
                <li><a href="shop-grid.html">Other</a></li>
            </ul>
        </li>
        <li class="has-children"><a href="shop-grid.html"><span class="img-link"><img
                        src="{{ asset('ecom/imgs/template/lamp.svg') }}" alt="Ecom"></span><span class="text-link">Computer
                    Decor</span></a>
            <ul class="sub-menu">
                <li><a href="shop-grid.html">Copyholders</a></li>
                <li><a href="shop-grid.html">Office Bookends</a></li>
                <li><a href="shop-grid.html">Business Card Holders</a></li>
                <li><a href="shop-grid.html">Lap Desks</a></li>
                <li><a href="shop-grid.html">Mouse Pads</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="mobile-logo"><a class="d-flex" href="index.html"><img alt="Ecom"
                        src="{{ asset('ecom/imgs/template/logo.svg') }}"></a></div>
            <div class="perfect-scroll">
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav class="mt-15">
                        <ul class="mobile-menu font-heading">
                            <li><a class="active" href="{{ route('buyer.home') }}">Beranda</a></li>
                            <li><a class="active" href="{{ route('buyer.login') }}">Masuk</a></li>
                            <li><a class="active" href="{{ route('buyer.register') }}">Mendaftar</a></li>
                            <li class="has-children"><a href="shop-grid.html">Shop</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                    <li><a href="shop-grid-2.html">Shop Grid 2</a></li>
                                    <li><a href="shop-list.html">Shop List</a></li>
                                    <li><a href="shop-list-2.html">Shop List 2</a></li>
                                    <li><a href="shop-fullwidth.html">Shop Fullwidth</a></li>
                                    <li><a href="shop-single-product.html">Single Product</a></li>
                                    <li><a href="shop-single-product-2.html">Single Product 2</a></li>
                                    <li><a href="shop-single-product-3.html">Single Product 3</a></li>
                                    <li><a href="shop-single-product-4.html">Single Product 4</a></li>
                                    <li><a href="shop-cart.html">Shop Cart</a></li>
                                    <li><a href="shop-checkout.html">Shop Checkout</a></li>
                                    <li><a href="shop-compare.html">Shop Compare</a></li>
                                    <li><a href="shop-wishlist.html">Shop Wishlist</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="#">Selengkapnya</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('buyer.about') }}">Tentang Kami</a></li>
                                    <li><a href="{{ route('buyer.contact') }}">Kontak Kami</a></li>
                                    <li><a href="{{ route('buyer.term') }}">Syarat dan Ketentuan</a></li>
                                </ul>
                            </li>
                            {{-- <li class="has-children"><a href="blog.html">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">Blog Grid</a></li>
                                    <li><a href="blog-2.html">Blog Grid 2</a></li>
                                    <li><a href="blog-list.html">Blog List</a></li>
                                    <li><a href="blog-big.html">Blog Big</a></li>
                                    <li><a href="blog-single.html">Blog Single - Left sidebar</a></li>
                                    <li><a href="blog-single-2.html">Blog Single - Right sidebar</a></li>
                                    <li><a href="blog-single-3.html">Blog Single - No sidebar</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <div class="mobile-header-top">
                        <div class="user-account"><a href="page-account.html"><img src="{{ asset('ecom/imgs/template/ava_1.png') }}"
                                    alt="Ecom"></a>
                            <div class="content">
                                <h6 class="user-name">Hello<span class="text-brand"> Steven !</span></h6>
                                <p class="font-xs text-muted">You have 3 new messages</p>
                            </div>
                        </div>
                    </div>
                    <ul class="mobile-menu">
                        <li><a href="page-account.html">My Account</a></li>
                        <li><a href="page-account.html">Order Tracking</a></li>
                        <li><a href="page-account.html">My Orders</a></li>
                        <li><a href="page-account.html">My Wishlist</a></li>
                        <li><a href="page-account.html">Setting</a></li>
                        <li><a href="{{ route('buyer.login') }}">Sign out</a></li>
                    </ul>
                </div>
                <div class="mobile-banner">
                    <div class="bg-5 block-iphone"><span class="color-brand-3 font-sm-lh32">Starting from $899</span>
                        <h3 class="font-xl mb-10">iPhone 12 Pro 128Gb</h3>
                        <p class="font-base color-brand-3 mb-10">Special Sale</p><a class="btn btn-arrow"
                            href="shop-grid.html">learn more</a>
                    </div>
                </div>
                <div class="site-copyright color-gray-400 mt-30">Copyright 2022 &copy; Ecom - Marketplace
                    Template.<br>Designed by<a href="http://alithemes.com" target="_blank">&nbsp; AliThemes</a></div>
            </div>
        </div>
    </div>
</div>
