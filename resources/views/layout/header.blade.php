<header class="header menu_fixed">
    <div id="logo">
        <a href="{{url('/')}}">
            <img src="{{asset('img/Logo_SIWSS_1.png')}}" width="120" height="36" alt="" class="logo_normal">
            <img src="{{asset('img/Logo_SIWSS.png')}}" width="120" height="36" alt="" class="logo_sticky">
        </a>
    </div>
    <ul id="top_menu">
        <li><a href="{{url('/wishlist')}}" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
        <li><a href="{{url('/cart1')}}" class="cart-menu-btn" title="Cart">{{-- <strong>4</strong> --}}</a></li>
        @guest				
            <li><a href="{{ url('/login') }}" id="sign-in" class="login" title="Sign In">Masuk</a></li>
        @endguest
        @auth
            <li>
                <form action="{{ url('/logout') }}" method="post">
                    @csrf
                    <button type="submit" id="logout">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_101_148)">
                                <path d="M0.5 10.5H11.5M11.5 10.5L7.5 6.5M11.5 10.5L7.5 14.5M3.5 6V2.5C3.5 1.39543 4.39543 0.5 5.5 0.5H18.5C19.6046 0.5 20.5 1.39543 20.5 2.5V10.5V18.5C20.5 19.6046 19.6046 20.5 18.5 20.5H10H5.5V20.5C4.39543 20.5 3.5 19.6046 3.5 18.5V15" stroke="#D80C0C"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_101_148">
                                    <rect width="21" height="21" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </form>
            </li>
        @endauth
    </ul>
    <!-- /top_menu -->
    <a href="#menu" class="btn_mobile">
        <div class="hamburger hamburger--spin" id="hamburger">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </a>
    <nav id="menu" class="main-menu">
        <ul>
            <li><span><a href="{{url('/')}}">Beranda</a></span></li>
            <li><span><a href="{{url('/packages/grid')}}">Paket</a></span>
            <li><span><a href="{{url('/gallery')}}">Galeri</a></span>
            <li><span><a href="{{url('/recomendation')}}">Rekomendasi</a></span>
        </ul>
    </nav>

</header>
<!-- /header -->
