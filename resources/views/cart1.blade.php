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

</head>

<body>

    <div id="page" class="theia-exception">

        @extends('layout.header')
        <main>
            <div class="hero_in cart_section">
                <div class="wrapper">
                    {{-- <div class="container">
						<div class="bs-wizard clearfix">
							<div class="bs-wizard-step active">
								<div class="text-center bs-wizard-stepnum">Your cart</div>
								<div class="progress">
									<div class="progress-bar"></div>
								</div>
								<a href="#0" class="bs-wizard-dot"></a>
							</div>

							<div class="bs-wizard-step disabled">
								<div class="text-center bs-wizard-stepnum">Payment</div>
								<div class="progress">
									<div class="progress-bar"></div>
								</div>
								<a href="#0" class="bs-wizard-dot"></a>
							</div>

							<div class="bs-wizard-step disabled">
								<div class="text-center bs-wizard-stepnum">Finish!</div>
								<div class="progress">
									<div class="progress-bar"></div>
								</div>
								<a href="#0" class="bs-wizard-dot"></a>
							</div>
						</div>
						<!-- End bs-wizard -->
					</div> --}}
                </div>
            </div>
            <!--/hero_in-->

            <div class="bg_color_1">
                <div class="container margin_60_35">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="box_cart">
                                <table class="table table-striped cart-list">
                                    <thead>
                                        <tr>
                                            <th>
                                                Pesanan
                                            </th>
                                            <th>
                                                Harga
                                            </th>
                                            <th>
                                                Opsi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts['carts'] as $cart)
                                            <tr>
                                                <td>
                                                    <div class="thumb_cart">
                                                        <img src="{{ $cart['image_icon'] }}" alt="Image">
                                                    </div>
                                                    <span class="item_cart">{{ $cart['package_name'] }}</span>
                                                </td>
                                                <td>
                                                    <strong>Rp. {{ $cart['price'] }}</strong>
                                                </td>
                                                <td class="options" style="width:5%; text-align:center;">
                                                    <a href="#0" onclick="deletecart('{{ url('/cart1/delete/' . $cart['id']) }}')"><i class="icon-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="cart-options clearfix">
                                    <div class="float-left">
                                        {{-- <div class="apply-coupon">
										<div class="form-group">
											<input type="text" name="coupon-code" value="" placeholder="Your Coupon Code" class="form-control">
										</div>
										<div class="form-group">
											<button type="button" class="btn_1 outline">Apply Coupon</button>
										</div>
									</div> --}}
                                    </div>
                                    <div class="float-right fix_mobile">
                                        {{-- <button type="button" class="btn_1 outline">Update Cart</button> --}}
                                    </div>
                                </div>
                                <!-- /cart-options -->
                            </div>
                        </div>
                        <!-- /col -->

                        <aside class="col-lg-4" id="sidebar">
                            <div class="box_detail">
                                {{-- <div id="total_cart">
									Total <span class="float-right">Rp.{{$carts['total_price']}}</span>
								</div> --}}
                                {{-- <ul class="cart_details">
									<li>From <span>{{$carts['from']}}</span></li>
									<li>To <span>{{$carts['to']}}</span></li>
									<li>Guest <span>{{$carts['total_guest']}}</span></li>
								</ul> --}}
                                <button class="btn_1 full-width purchase" id="pay-button">Bayar Sekarang</button>

                                {{-- <a href="{{ url('/invoice') }}" class="btn_1 full-width purchase">Checkout</a> --}}
                                {{-- <div class="text-center"><small>No money charged in this step</small></div> --}}
                            </div>
                        </aside>
                    </div>
                    <!-- /row -->
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
    <script src="{{ asset('js/common_scripts.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('assets/validate.js') }}"></script>
    <script>
        function deletecart(action) {
            let form = document.createElement("form");

            let csrf = document.createElement("input");
            csrf.setAttribute("type", "hidden");
            csrf.setAttribute("name", "_token");
            csrf.setAttribute("value", "{{ csrf_token() }}");
            form.append(csrf);

            let method = document.createElement("input");
            method.setAttribute("type", "hidden");
            method.setAttribute("name", "_method");
            method.setAttribute("value", "DELETE");
            form.append(method);

            form.style.display = 'none';
            document.body.appendChild(form);

            form.action = action;
            form.method = "POST";
            form.submit();
        }
    </script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        function backtocart() {
            window.location.href = "{{ url('/cart1') }}"
        }
        const payButton = document.querySelector('#pay-button');

        payButton.addEventListener('click', function(e) {
            e.preventDefault();

            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {

                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                    //send ajax to apiTransaction
                    $.ajax({
                        url: "{{ url('/api/transaction/' . $userId) }}",
                        type: "POST",
                        data: result,
                        success: function(resultTransaction) {
                            console.log(resultTransaction)
                            window.location.href = "{{ url('/invoice') }}"
                        },
                        error: function(resultTransaction) {
                            console.log(resultTransaction)
                        }
                    });


                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                }
            });
        });
    </script>

</body>

</html>
