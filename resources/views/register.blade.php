<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Panagea - Premium site template for travel agencies, hotels and restaurant listing.">
    <meta name="author" content="Ansonika">
    <title>Register</title>

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
	<style>
		#login_bg, #register_bg {
			background: url(../img/Paket_2.png) center center no-repeat fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			min-height: 100vh;
			width: 100%;
		}
	</style>
</head>

<body id="register_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
	<div id="login">
		<aside>
			<figure>
				<a href="index.html"><img src="{{ asset('img/Logo_SIWSS.png') }}" width="120" height="36" data-retina="true" alt="" class="logo_sticky"></a>
			</figure>
			<form autocomplete="off" method="POST" action="{{ url('/register') }}">
                @csrf
				<div class="form-group">
					<label>Nama</label>
					<input class="form-control" type="text" name="name">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Nama Panjang</label>
					<input class="form-control" type="text" name="lastname">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="email" name="email">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="password" id="password1" name="password">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="form-group">
					<label>Konfirmasi password</label>
					<input class="form-control" type="password" id="password2" name="repass">
					<i class="icon_lock_alt"></i>
				</div>
				<div id="pass-info" class="clearfix"></div>
				<button type="submit" class="btn_1 rounded full-width add_top_30">Daftar Sekarang!</button>
				<div class="text-center add_top_10">Sudah Punya Akun? <strong><a href="{{ url('/login') }}">Masuk</a></strong></div>
			</form>
		</aside>
	</div>
	<!-- /login -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/pw_strenght.js"></script>
	
  
</body>
</html>