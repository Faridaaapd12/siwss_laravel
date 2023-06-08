<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Panagea - Premium site template for travel agencies, hotels and restaurant listing.">
    <meta name="author" content="Ansonika">
    @extends('layout.title')

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendors.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        .hero_in.tours:before {
            background: url({{ asset('img/Siwss.jpg') }}) center center no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div id="page">

        @extends('layout.header')
        <!-- /header -->

        <main>

            <section class="hero_in tours">
                <div class="wrapper">
                </div>
            </section>
            <!--/hero_in-->

            <div class="filters_listing sticky_horizontal">
                <div class="container">
                    <ul class="clearfix">
                        <li>
                            {{-- preserve for layout --}}
                        </li>
                    </ul>
                </div>
                <!-- /container -->
            </div>
            <!-- /filters -->

            <div class="collapse" id="collapseMap">
                <div id="map" class="map"></div>
            </div>
            <!-- End Map -->

            <div class="container margin_60_35">
                <form class="col-lg-12" method="POST" action="{{ url('/search/grid') }}">
                    @csrf
                    <div class="row no-gutters custom-search-input-2 inner">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Nama Paket"
                                    name="packageName">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="number" name="maxpeople" class="form-control" min="1"
                                    placeholder="Kapasitas Orang">
                                <i class="icon_profile"></i>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <input type="submit" class="btn_search" value="Cari
                            ">
                        </div>
                    </div>
                    <!-- /row -->
                </form>
                <!-- /custom-search-input-2 -->

                <div class="isotope-wrapper">
                    <div class="row">
                        @foreach ($packages as $package)
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="box_grid">
                                    <figure>
                                        @auth
                                            @if ($package['wishlisted'])
                                                <a href="#0" class="wish_bt liked"
                                                    onclick="unwishlist('{{ $package['wishlistId'] }}')"></a>
                                            @else
                                                <a href="#0" class="wish_bt"
                                                    onclick="wishlist('{{ $package['id'] }}')"></a>
                                            @endif
                                        @endauth
                                        @guest
                                            <a href="#0" class="wish_bt"
                                                onclick="wishlist('{{ $package['id'] }}')"></a>
                                        @endguest
                                        <a href="{{ asset('/package/' . $package['id']) }}"><img
                                                src="{{ asset($package['image']); }}" class="img-fluid"
                                                alt="" width="800" height="533">
                                            <div class="read_more"><span>Lihat Detail</span></div>
                                        </a>
                                    </figure>
                                    <div class="wrapper">
                                        <h3><a
                                                href="{{ asset('/package/' . $package['id']) }}">{{ $package['package_name'] }}</a>
                                        </h3>
                                        <p>{{ $package['description'] }}</p>
                                        <span class="price">Rp.<strong>{{ $package['price'] }}</strong> /per
                                            Orang</span>
                                    </div>
                                    <ul>
                                        <li></li>
                                        <li>
                                            <div class="score"><span>Superb<em>{{ $package['ratingCount'] }}
                                                        Ulasan</em></span><strong>{{ $package['rating'] }}</strong>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /row -->
                </div>
                <!-- /isotope-wrapper -->

                <!-- <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p> -->

            </div>
            <!-- /container -->

        </main>
        <!--/main-->

        @extends('layout.footer')
        <!--/footer-->
    </div>
    <!-- page -->

    <!-- Sign In Popup -->
    @extends('layout.signinpop')
    <!-- /Sign In Popup -->

    <div id="toTop"></div><!-- Back to top button -->

    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('js/common_scripts.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('assets/validate.js') }}"></script>
    <script>
        function wishlist(packageId) {
            let form = document.createElement("form");

            let csrf = document.createElement("input");
            csrf.setAttribute("type", "hidden");
            csrf.setAttribute("name", "_token");
            csrf.setAttribute("value", "{{ csrf_token() }}")
            form.append(csrf);

            let packageIdInput = document.createElement("input");
            packageIdInput.setAttribute("type", "hidden");
            packageIdInput.setAttribute("name", "package_id");
            packageIdInput.setAttribute("value", packageId)
            form.append(packageIdInput);

            form.style.display = 'none';
            document.body.appendChild(form);

            form.action = "{{ url('/wishlist/add') }}";
            form.method = "POST";
            form.submit();
        }

        function unwishlist(wishlistId) {
            let form = document.createElement("form");

            let csrf = document.createElement("input");
            csrf.setAttribute("type", "hidden");
            csrf.setAttribute("name", "_token");
            csrf.setAttribute("value", "{{ csrf_token() }}");
            form.append(csrf)

            let wishlistIdInput = document.createElement("input");
            wishlistIdInput.setAttribute("type", "hidden");
            wishlistIdInput.setAttribute("name", "wishlist_id");
            wishlistIdInput.setAttribute("value", wishlistId);
            form.append(wishlistIdInput);

            form.style.display = 'none';
            document.body.appendChild(form);

            form.action = "{{ url('/wishlist/delete') }}";
            form.method = "POST";
            form.submit();
        }
    </script>


    <!-- Map -->
    {{-- <script src="http://maps.googleapis.com/maps/api/js"></script> --}}
    {{-- <script src="{{asset('js/markerclusterer.js')}}"></script> --}}
    {{-- <script src="{{asset('js/map_tours.js')}}"></script> --}}
    {{-- <script src="{{asset('js/infobox.js')}}"></script>	 --}}


</body>

</html>
