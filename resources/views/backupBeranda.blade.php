<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Panagea - Premium site template for travel agencies, hotels and restaurant listing.">
    <meta name="author" content="Ansonika">
    @extends('layout.title')

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/vendors.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
	<style>
		.hero_single.version_2:before {
			background: url({{asset('img/home_section_1.jpg')}}) center center no-repeat;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
	</style>
</head>

<body class="datepicker_mobile_full"><!-- Remove this class to disable datepicker full on mobile -->
		
	<div id="page">
		
		@extends('layout.header')
	
		<main>
			<section class="hero_single version_2">
				<div class="wrapper">
					<div class="container">
						<h3>Package experiences</h3>
						<p>Enjoy a safe, comfortable package for your activities</p>
						<form action="{{url('/search')}}" method="POST">
							@csrf
							<div class="row no-gutters custom-search-input-2">
								<div class="col-lg-4">
									<div class="form-group">
										<input class="form-control" type="text" name="packageName" placeholder="Nama Paket">
										<i class="icon_pin_alt"></i>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<input class="form-control" type="text" name="maxpeople" placeholder="Kapasitas Paket">
										<i class="icon_plus"></i>
									</div>
								</div>
								<div class="col-lg-4">
									<input type="submit" class="btn_search" value="Cari">
								</div>
							</div>
							<!-- /row -->
						</form>
					</div>
				</div>
			</section>
			<!-- /hero_single -->

			<div class="container container-custom margin_80_0">
				<div class="main_title_2">

					<span><em></em></span>
					<h2>Paket Populer Kami</h2>
					<p>Berbagai jenis paket yang bisa Anda pilih.</p>
				</div>
				<div id="reccomended" class="owl-carousel owl-theme owl-loaded owl-drag">
                    {{--
					 @foreach ($packages as $package)
					<div class="item">
						<div class="box_grid">
							<figure>
								@auth
									@if ($package['wishlisted'])
										<a href="#0" class="wish_bt liked" onclick="unwishlist('{{$package['wishlistId']}}')"></a>
									@else
										<a href="#0" class="wish_bt" onclick="wishlist('{{$package['id']}}')"></a>
									@endif
								@endauth
								@guest
									<a href="#0" class="wish_bt" onclick="wishlist('{{$package['id']}}')"></a>
								@endguest
								<a href="{{url('/package'.'/'.$package['id'])}}"><img src="{{asset($package['image'])}}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Baca Selengkapnya</span></div></a>
							</figure>
							<div class="wrapper">
								<h3><a href="{{url('/package'.'/'.$package['id'])}}">{{ $package['package_name'] }}</a></h3>
								<p>{{ $package['description'] }}</p>
								<span class="price"><strong>Rp.{{ $package['price'] }}</strong> /per Hari</span>
							</div>
							<ul>
								<li></li>
								<li>
									<div class="score">
										<span>
											Superb
											<em>{{ $package['ratingCount'] }} Ulasan</em>
										</span>
										<strong>{{ $package['rating'] }}</strong>
									</div>
								</li>
							</ul>
						</div>
					</div>
					@endforeach
                    --}}
				</div>
				<!-- /carousel -->
				<p class="btn_home_align"><a href="{{ url('/packages/grid') }}" class="btn_1 rounded">View all packages</a></p>
				{{-- some random line --}}
				{{-- <hr class="large"> --}}
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
							<img src="img/gallery/large/pic_1.jpg" alt="">
							<figcaption>
								<div class="caption-content">
									<a href="img/gallery/large/pic_1.jpg" title="Photo title" data-effect="mfp-zoom-in">
										<i class="pe-7s-albums"></i>
										<p>Keterangan</p>
									</a>
								</div>
							</figcaption>
						</figure>
					</li>
					<li>
						<figure>
							<img src="img/gallery/large/pic_2.jpg" alt="">
							<figcaption>
								<div class="caption-content">
									<a href="img/gallery/large/pic_2.jpg" title="Photo title" data-effect="mfp-zoom-in">
										<i class="pe-7s-albums"></i>
										<p>Keterangan</p>
									</a>
								</div>
							</figcaption>
						</figure>
					</li>
					<li>
						<figure>
							<img src="img/gallery/large/pic_3.jpg" alt="">
							<figcaption>
								<div class="caption-content">
									<a href="img/gallery/large/pic_3.jpg" title="Photo title" data-effect="mfp-zoom-in">
										<i class="pe-7s-albums"></i>
										<p>Keterangan</p>
									</a>
								</div>
							</figcaption>
						</figure>
					</li>
					<li>
						<figure>
							<img src="img/gallery/large/pic_4.jpg" alt="">
							<figcaption>
								<div class="caption-content">
									<a href="img/gallery/large/pic_1.jpg" title="Photo title" data-effect="mfp-zoom-in">
										<i class="pe-7s-albums"></i>
										<p>Keterangan</p>
									</a>
								</div>
							</figcaption>
						</figure>
					</li>
                    <li>
						<figure>
							<img src="img/gallery/large/pic_4.jpg" alt="">
							<figcaption>
								<div class="caption-content">
									<a href="img/gallery/large/pic_1.jpg" title="Photo title" data-effect="mfp-zoom-in">
										<i class="pe-7s-albums"></i>
										<p>Keterangan</p>
									</a>
								</div>
							</figcaption>
						</figure>
					</li>
                    <li>
						<figure>
							<img src="img/gallery/large/pic_4.jpg" alt="">
							<figcaption>
								<div class="caption-content">
									<a href="img/gallery/large/pic_1.jpg" title="Photo title" data-effect="mfp-zoom-in">
										<i class="pe-7s-albums"></i>
										<p>Keterangan</p>
									</a>
								</div>
							</figcaption>
						</figure>
					</li>
				</ul>
			</div>
			<!-- /grid gallery -->
		</div>
		<!-- /container -->
		</main>
		<!-- /main -->

		@extends('layout.footer')
		<!--/footer-->
	
	</div>
	<!-- page -->
	
	<!-- Sign In Popup -->
	@extends('layout.signinpop')
	<!-- /Sign In Popup -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="{{asset('js/common_scripts.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
	<script src="{{asset('assets/validate.js')}}"></script>
	<script>
		function wishlist(packageId) {
			let form = document.createElement("form");

			let csrf = document.createElement("input");
			csrf.setAttribute("type", "hidden");
			csrf.setAttribute("name", "_token");
			csrf.setAttribute("value", "{{csrf_token()}}")
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

			form.action = "{{url('/wishlist/delete')}}";
			form.method = "POST";
			form.submit();
		}
	</script>
	
</body>
</html>