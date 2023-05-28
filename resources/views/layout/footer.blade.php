<footer>
	<style>
		.float{
			position:fixed;
			width:200px;
			height:70px;
		padding: 12px 20px;
			bottom:20px;
			right:20px;
			background-color:#54564F;
			color:#FFF;
			border-radius: 50px;
			text-align:center;
		font-size:17px;
			box-shadow: 0px 1px 1px #9f9f9f;
		z-index:100;
		}
		/* .float:after{
		content: '';
		background-color: hsl(11deg 80% 45%);
		padding: 6px;
		width: 2px;
		height: 2px;
		border-radius: 50%;
		position: absolute;
		left: 0;
		top: 0;
		} */
		.float small{
		line-height: initial;
		text-align: left;
		}
		a.float:hover{
		color: #fff!important;
			background-color:#54564F!important;
		}
		.my-float{
			margin-top:16px;
		}
		.img-project{
		height: 435px; 
		overflow: hidden;
		}
		.img-project img{
		width: 100%;
		height: 100%;
		object-fit: cover;
		}
	</style>
		
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-4 ">
					<p><img src="{{asset('img/Logo_SIWSS_1.png')}}" width="120" height="36" alt=""></p>
					<p>SIWSS adalah Sistem Informasi Wisata Susur Sungai Tambak cemandi yang bertujuan untuk memudahkan user dalam mencari informasi serta melakukan pemesanan tiket. </p>
					{{-- 
					<div class="follow_us">
						<ul>
							<li>Follow us</li>
							<li><a href="#0"><i class="ti-facebook"></i></a></li>
							<li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
							<li><a href="#0"><i class="ti-google"></i></a></li>
							<li><a href="#0"><i class="ti-pinterest"></i></a></li>
							<li><a href="#0"><i class="ti-instagram"></i></a></li>
						</ul>
					</div> 
					--}}
				</div>

				<div class="col-lg-4 ">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.6512043168477!2d112.80938497389522!3d-7.39292397278169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7eff293b55c5f%3A0x7238ce39d5bad08e!2scafe%20kalitekung!5e0!3m2!1sid!2sid!4v1683293279914!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>

				<div class="col-lg-2 ">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="{{ url('/login') }}">Login</a></li>
						<li><a href="{{ url('/register') }}">Register</a></li>
						<li><a href="{{ url('/cart1') }}">Cart</a></li>
					</ul>
				</div>
				<div class="col-lg-2">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://6283157578555"><i class="ti-mobile"></i> + 6283157578555</a></li>
						<li><a href="mailto:grahameeting@gmail.com"><i class="ti-email"></i> SIWSS@gmail.com</a></li>
					</ul>
				</div>
			</div>
			<!--/row-->

			{{--
			<hr>
			<div class="row">
				<div class="col-lg-6">
					<ul id="footer-selector">
						<li>
							<div class="styled-select" id="lang-selector">
								<select>
									<option value="English" selected>English</option>
									<option value="French">French</option>
									<option value="Spanish">Spanish</option>
									<option value="Russian">Russian</option>
								</select>
							</div>
						</li>
						<li>
							<div class="styled-select" id="currency-selector">
								<select>
									<option value="US Dollars" selected>US Dollars</option>
									<option value="Euro">Euro</option>
								</select>
							</div>
						</li>
						<li><img src="{{asset('img/cards_all.svg')}}" alt=""></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
						<li><span>© 2022</span></li>
					</ul>
				</div>
			</div>
			--}}

		</div>
	</footer>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<a href="https://api.whatsapp.com/send?phone=6283157578153&text=Halo" class="float" target="_blank">
			<div class="d-flex justify-content-between align-items-center">
				{{-- <small><i class='bx bxl-whatsapp bx-md bx-tada'></i></small>  --}}
				<img src="	https://storage.googleapis.com/gcs-portal-prod/public/img/icons/social/whatsapp.gif" alt="" style="width: 46px; height: 46px;">
				<small>Hubungi Kami</small>
		 </div>
	    </a>