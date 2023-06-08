<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Panagea - Premium site template for travel agencies, hotels and restaurant listing.">
    <meta name="author" content="Ansonika">
    <title>Galeri</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>
	
	<div id="page" class="theia-exception">
		
		@extends('layout.header')
		
	<main>
		<section class="hero_in general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Media Galeri</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Berbagai Foto dan Fasilitas Wisata Susur Sungai</h2>
				<p>Temukan Fasilitas dan Inspirasi foto disini </p>
			</div>
			<div class="grid">
				<ul class="magnific-gallery">
					<li style="margin: 20px">
						<figure>
							<img src="img/warung.jpg" alt="">
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
					<li style="margin: 20px">
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
					<li style="margin: 20px">
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
					<li style="margin: 20px">
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
                    <li style="margin: 20px">
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
                    <li style="margin: 20px">
						<figure>
							<img src="img/kalitekung.jpg" alt="">
							<figcaption>
								<div class="caption-content">
									<a href="img/kalitekung.jpg" title="Photo title" data-effect="mfp-zoom-in">
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
		
		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="main_title_2">
					<span><em></em></span>
					<h2>Berbagai Video Wisata Susur Sungai</h2>
					<p>.</p>
				</div>
				<div class="grid">
					<ul class="magnific-gallery">
						<li style="margin: 20px">
							<figure>
								{{-- <img src="img/gallery/large/pic_4.jpg" alt=""> --}}
								<iframe width="560" height="315" src="https://www.youtube.com/embed/8pNklGSRNzQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
								<figcaption>
								<div class="caption-content">
									<a href="https://youtu.be/8pNklGSRNzQ" class="video" title="Video Vimeo">
										<i class="pe-7s-film"></i>
										<p>Keterangan</p>
								</a>
								</div>
								</figcaption>
							</figure>
						</li>
				
						<li style="margin: 20px">
							<figure>
								{{-- <img src="img/gallery/large/pic_5.jpg" alt=""> --}}
								<iframe width="560" height="315" src="https://www.youtube.com/embed/ssbQwdCWbUg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
									<figcaption>
										<div class="caption-content">
											 <a href="https://www.youtube.com/watch?v=Zz5cu72Gv5Y" class="video" title="Video Youtube">
												<i class="pe-7s-film"></i>
												<p>Keterangan</p>
											</a>
										</div>
										</figcaption>
								</iframe>
								
							</figure>
						</li>
						<li style="margin: 20px">
							<figure>
								{{-- <img src="img/gallery/large/pic_3.jpg" alt=""> --}}
								<iframe width="560" height="315" src="https://www.youtube.com/embed/YtKAZ6Zq7iQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
								<figcaption>
								<div class="caption-content">
									<a href="https://youtu.be/YtKAZ6Zq7iQ" class="video" title="Video Vimeo">
										<i class="pe-7s-film"></i>
										<p>Keterangan</p>
									</a>
								</div>
								</figcaption>
							</figure>
						</li>
					</ul>
				</div>
				<!-- /grid -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
		
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
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>
	
	
</body>
</html>