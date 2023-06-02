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
        .hero_single.version_2:before {
            background: url({{ asset('img/Siwss.jpg') }}) center center no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>

<body class="datepicker_mobile_full">

    <div id="page">

        @extends('layout.header')

        <main>
            <section class="hero_single version_2">
                <div class="wrapper">
                    <div class="container">
                        <h3>Wisata Susur Sungai Tambak Cemandi</h3>
                        <p>Lengkapi Akhir Pekan anda dengan Paket Wisata yang Menarik</p>
                        <form action="{{ url('/search') }}" method="POST">
                            @csrf
                            <div class="row no-gutters custom-search-input-2">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="packageName"
                                            placeholder="Nama Paket">
                                        <i class="icon_pin_alt"></i>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="maxpeople"
                                            placeholder="Kapasitas Orang">
                                        <i class="icon_plus"></i>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <input type="submit" class="btn_search" value="Cari">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <div class="container container-custom margin_80_0">
                <div class="main_title_2">

                    <span><em></em></span>
                    <h2>Paket Populer Kami</h2>
                    <p>Berbagai jenis paket yang bisa Anda pilih.</p>
                </div>

                <div id="reccomended" class="row">


                    @foreach ($packages as $package)
                        <div class="item col-3 ">
                            <div class="box_grid">
                                <figure>
                                    <a href="#0`" class="wish_bt"></a>
                                    <a href="{{ route('package-detail.show', $package->id) }}">
                                        <img src={{ asset($package->thumbnail) }} class="img-fluid" alt=""
                                            width="800" height="533">
                                        <div class="read_more"><span>Lihat Detail</span>
                                        </div>
                                    </a>
                                </figure>
                                <div class="wrapper">
                                    <h3><a href="{{ route('package-detail') }}">{{ $package->package_name }}</a></h3>
                                    <p>{{ $package->description }}</p>
                                    <span class="price">Mulai <strong>Rp {{ $package->price }}</strong> /per
                                        paket</span>
                                </div>
                                <ul>
                                    <li><i class="icon_clock_alt"></i> {{ $package->maxpeople }} Orang</li>
                                    <li>
                                        <div class="score"><span>Menyenangkan<em>350
                                                    Reviews</em></span><strong>4.9</strong>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach








                </div>

                <p class="btn_home_align"><a href="{{ url('/packages/grid') }}" class="btn_1 rounded">Lihat Semua
                        Paket</a></p>

            </div>

            <div class="container margin_60_35">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h2>Berbagai Foto dan Fasilitas Wisata Susur Sungai</h2>
                    <p>Temukan Fasilitas dan Inspirasi foto disini </p>
                </div>
                <div class="grid">
                    <ul class="magnific-gallery">
                        <li>
                            <figure>
                                <img src="{{ asset('img/warung.jpg') }}" alt="">
                                <figcaption>
                                    <div class="caption-content">
                                        <a href="img/warung.jpg" title="Photo title" data-effect="mfp-zoom-in">
                                            <i class="pe-7s-albums"></i>
                                            <p>Keterangan</p>
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="img/peresmian.jpg" alt="">
                                <figcaption>
                                    <div class="caption-content">
                                        <a href="img/peresmian.jpg" title="Photo title" data-effect="mfp-zoom-in">
                                            <i class="pe-7s-albums"></i>
                                            <p>Keterangan</p>
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="img/Pemancingan.jpg" alt="">
                                <figcaption>
                                    <div class="caption-content">
                                        <a href="img/Pemancingan.jpg" title="Photo title" data-effect="mfp-zoom-in">
                                            <i class="pe-7s-albums"></i>
                                            <p>Keterangan</p>
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="img/PetikLaut.jpg" alt="">
                                <figcaption>
                                    <div class="caption-content">
                                        <a href="img/PetikLaut.jpg" title="Photo title" data-effect="mfp-zoom-in">
                                            <i class="pe-7s-albums"></i>
                                            <p>Keterangan</p>
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="img/Religi.jpg" alt="">
                                <figcaption>
                                    <div class="caption-content">
                                        <a href="img/Religi.jpg" title="Photo title" data-effect="mfp-zoom-in">
                                            <i class="pe-7s-albums"></i>
                                            <p>Keterangan</p>
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="img/kalitekung.jpg" alt="">
                                <figcaption>
                                    <div class="caption-content">
                                        <a href="img/cafe kalitekung.jpg" title="Photo title"
                                            data-effect="mfp-zoom-in">
                                            <i class="pe-7s-albums"></i>
                                            <p>Keterangan</p>
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                    </ul>
                </div>

            </div>

        </main>

        @extends('layout.footer')


    </div>

    @extends('layout.signinpop')


    <div id="toTop"></div>

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


</body>

</html>
