<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="Shorif">
	<title>Molla - eCommerce </title>
	<link rel="shortcut icon" href="{{asset('content/website')}}/assets/images/icons/favicon.ico">
	<link rel="stylesheet" href="{{asset('content/website')}}/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
	<link rel="stylesheet" href="{{asset('content/website')}}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('content/website')}}/assets/css/plugins/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="{{asset('content/website')}}/assets/css/plugins/magnific-popup/magnific-popup.css">
	<link rel="stylesheet" href="{{asset('content/website')}}/assets/css/plugins/jquery.countdown.css">
	<link rel="stylesheet" href="{{asset('content/website')}}/assets/css/style.css">
	<link rel="stylesheet" href="{{asset('content/website')}}/assets/css/skins/skin-demo-3.css">
	<link rel="stylesheet" href="{{asset('content/website')}}/assets/css/demos/demo-3.css">
</head>
<body>
	<div class="page-wrapper">
		<header class="header header-intro-clearance header-3">
			<div class="header-top">
				<div class="container">
                    @php
                        $contactinfo = App\Models\Contactinfo::where('contact_status',1)->where('contact_id',1)->first();
                    @endphp
					<div class="header-left"> <a href="tel:#"><i class="icon-phone"></i>Call: {{ $contactinfo->contact_phone_two }}</a> </div>
					<!-- End .header-left -->
					<div class="header-right">
						<ul class="top-menu">
							<li> <a href="#">Links</a>
								<ul>
									<li>
										<div class="header-dropdown"> <a href="#">USD</a>
											<div class="header-menu">
												<ul>
													<li><a href="#">Eur</a></li>
													<li><a href="#">Usd</a></li>
												</ul>
											</div>
											<!-- End .header-menu -->
										</div>
									</li>
									<li>
										<div class="header-dropdown"> <a href="#">English</a>
											<div class="header-menu">
												<ul>
													<li><a href="#">English</a></li>
													<li><a href="#">French</a></li>
													<li><a href="#">Spanish</a></li>
												</ul>
											</div>
											<!-- End .header-menu -->
										</div>
									</li>
									@if (Auth::check())
									<li class="megamenu-container"> <a href="#" >My Account</a></li>
                                    <li class="megamenu-container"> <a href="#" >Log out</a></li>
									@else
                                    <li><a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a></li>
                                    <li class="megamenu-container"> <a href="{{ url('contact') }}" >Log in</a></li>
									@endif

								</ul>
							</li>
						</ul>
						<!-- End .top-menu -->
					</div>
					<!-- End .header-right -->
				</div>
				<!-- End .container -->
			</div>
			<!-- End .header-top -->
			<div class="header-middle">
				<div class="container">
					<div class="header-left">
						<button class="mobile-menu-toggler"> <span class="sr-only">Toggle mobile menu</span> <i class="icon-bars"></i> </button>
						<a href="{{route('website')}}" class="logo"> <img src="{{asset('content/website')}}/assets/images/demos/demo-3/logo.png" alt="Molla Logo" width="105" height="25"> </a>
					</div>
					<!-- End .header-left -->
					<div class="header-center">
						<div class="header-search header-search-extended header-search-visible d-none d-lg-block"> <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
							<form action="#" method="get">
								<div class="header-search-wrapper search-wrapper-wide">
									<label for="q" class="sr-only">Search</label>
									<button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
									<input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required> </div>
								<!-- End .header-search-wrapper -->
							</form>
						</div>
						<!-- End .header-search -->
					</div>
					<div class="header-right">
						<div class="dropdown compare-dropdown">
							<a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
								<div class="icon"> <i class="icon-random"></i> </div>
								<p>Compare</p>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<ul class="compare-products">
									<li class="compare-product"> <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
										<h4 class="compare-product-title"><a href="product.html">Blue Night Dress</a></h4> </li>
									<li class="compare-product"> <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
										<h4 class="compare-product-title"><a href="product.html">White Long Skirt</a></h4> </li>
								</ul>
								<div class="compare-actions"> <a href="#" class="action-link">Clear All</a> <a href="#" class="btn btn-outline-primary-2"><span>Compare</span><i class="icon-long-arrow-right"></i></a> </div>
							</div>
							<!-- End .dropdown-menu -->
						</div>
						<!-- End .compare-dropdown -->
						<div class="wishlist">
							<a href="{{ route('wishlist.index') }}" title="Wishlist">
                                @php
                                    $wishlist =  App\Models\Wishlist::where('wish_status',1)->get();
                                    $wishlist_count =  App\Models\Wishlist::where('wish_status',1)->get()->count();
                                @endphp
								<div class="icon"> <i class="icon-heart-o"></i> <span class="wishlist-count badge">{{ $wishlist_count }} </span> </div>
								<p>Wishlist</p>

							</a>
						</div>
						<!-- End .compare-dropdown -->
						<div class="dropdown cart-dropdown">
							<a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
								<div class="icon">
                                @php

                                @endphp
                                    <i class="icon-shopping-cart"></i> <span class="cart-count">2</span>
                                </div>
								<p>Cart</p>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="dropdown-cart-products">
                                    @php
                                        $allcart = Cart::getContent();
                                    @endphp
                                    @foreach ( $allcart as $cartitem)
                                    <div class="product">
										<div class="product-cart-details">
											<h4 class="product-title">
                                                <a href="#">{{ $cartitem->name }}</a>
                                            </h4> <span class="cart-product-info">
                                                <span class="cart-product-qty">{{ $cartitem->quantity }}</span> x ৳ {{ $cartitem->price }} </span>
										</div>
										<!-- End .product-cart-details -->
										<figure class="product-image-container">
											<a href="product.html" class="product-image"> <img src="{{asset('upload/product/'.$cartitem->attributes->image)}}" alt="product"> </a>
										</figure> <a href="{{ route('cart.destroy',$cartitem->id) }}" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                     </div>
                                     @endforeach
									<!-- End .product -->
									{{-- <div class="product">
										<div class="product-cart-details">
											<h4 class="product-title">
                                                <a href="product.html">Blue utility pinafore denim dress</a>
                                            </h4> <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span> x $76.00 </span>
										</div>
										<!-- End .product-cart-details -->
										<figure class="product-image-container">
											<a href="product.html" class="product-image"> <img src="{{asset('content/website')}}/assets/images/products/cart/product-2.jpg" alt="product"> </a>
										</figure> <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    </div> --}}
									<!-- End .product -->
								</div>
								<!-- End .cart-product -->
								<div class="dropdown-cart-total"> <span>Total</span> <span class="cart-total-price">৳ {{ Cart::getTotal(); }}</span> </div>
								<!-- End .dropdown-cart-total -->
								<div class="dropdown-cart-action"> <a href="{{ route('cart.index') }}" class="btn btn-primary">View Cart</a> <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a> </div>
								<!-- End .dropdown-cart-total -->
							</div>
							<!-- End .dropdown-menu -->
						</div>
						<!-- End .cart-dropdown -->
					</div>
					<!-- End .header-right -->
				</div>
				<!-- End .container -->
			</div>
			<!-- End .header-middle -->
        @php
            $categories = App\Models\Prodcategory::where('pro_cate_status', 1)->limit(10)->get();
        @endphp
			<div class="header-bottom sticky-header">
				<div class="container">
					<div class="header-left">
						<div class="dropdown category-dropdown"> <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                Browse Categories <i class="icon-angle-down"></i>
                            </a>
							<div class="dropdown-menu">
								<nav class="side-nav">
									<ul class="menu-vertical sf-arrows">
										<li class="item-lead"><a href="#">Daily offers</a></li>
										<li class="item-lead"><a href="#">Gift Ideas</a></li>
                                    @foreach ( $categories as $category)
                                    <li>
                                        <a href="#">{{ $category->pro_cate_name }}</a>
                                        @php
                                            $sub_category = App\Models\Prodcategory::where('pro_cate_status', 1)->where('pro_cate_parent', $category->pro_cate_id)->get();
                                            $sub_cat_count = App\Models\Prodcategory::where('pro_cate_status', 1)->where('pro_cate_parent', $category->pro_cate_id)->get()->count();
                                        @endphp
                                        @if ($sub_cat_count != 0)
                                        <ul>
                                            @foreach ($sub_category as $sub_cat)
                                            <li>
                                                <a href="about.html">{{ $sub_cat->pro_cate_name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                    {{-- <li><a href="#">{{ $category->pro_cate_name}}</a></li> --}}
                                    {{-- <li>
                                        <a href="#">Pages</a>
                                        <ul>
                                            <li>
                                                <a href="about.html">About</a>

                                                <ul>
                                                    <li><a href="about.html">About 01</a></li>
                                                    <li><a href="about-2.html">About 02</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="contact.html">Contact</a>

                                                <ul>
                                                    <li><a href="contact.html">Contact 01</a></li>
                                                    <li><a href="contact-2.html">Contact 02</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="faq.html">FAQs</a></li>
                                            <li><a href="404.html">Error 404</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                        </ul>
                                    </li> --}}
									</ul>
									<!-- End .menu-vertical -->
								</nav>
								<!-- End .side-nav -->
							</div>
							<!-- End .dropdown-menu -->
						</div>
						<!-- End .category-dropdown -->
					</div>
					<!-- End .header-left -->
					<div class="header-center">
						<nav class="main-nav">
							<ul class="menu sf-arrows">
								<li class=" {{ '/' == request()->path() ? 'active' : '' }}">
                                    <a href="{{ url('/') }}">Home</a>
                                </li >
                                <li class="{{ 'shop' == request()->path() ? 'active' : '' }}" >
                                    <a href="{{ url('shop') }}">Shop</a>
                                </li>
                                <li class=" {{ 'product' == request()->path() ? 'active' : '' }}">
                                    <a href="{{ url('product') }}" >Product</a>
                                </li>
                                <li class=" {{ 'about' == request()->path() ? 'active' : '' }}">
                                    <a href="{{ url('about') }}">About</a>
                                </li>
                                <li class=" {{ 'contact' == request()->path() ? 'active' : '' }}">
                                    <a href="{{ url('contact') }}">Contact</a>
                                </li>

							</ul>
							<!-- End .menu -->
						</nav>
						<!-- End .main-nav -->
					</div>
					<!-- End .header-center -->
					<div class="header-right"> <i class="la la-lightbulb-o"></i>
						<p>Clearance<span class="highlight">&nbsp;Up to 30% Off</span></p>
					</div>
				</div>
				<!-- End .container -->
			</div>
			<!-- End .header-bottom -->
		</header>

        @yield('content')

		<footer class="footer">
			<div class="footer-middle">
				<div class="container">
					<div class="row">
                        @php
                            $contactinfo = App\Models\Contactinfo::where('contact_status',1)->where('contact_id',1)->first();
                        @endphp
						<div class="col-sm-6 col-lg-3">
							<div class="widget widget-about"> <img src="{{asset('content/website')}}/assets/images/demos/demo-3/logo-footer.png" class="footer-logo" alt="Footer Logo" width="105" height="25">
								<p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>
								<div class="widget-call"> <i class="icon-phone"></i> Got Question? Call us 24/7 <a href="tel:#">{{ $contactinfo->contact_phone_one }}</a> </div>
								<!-- End .widget-call -->
							</div>
							<!-- End .widget about-widget -->
						</div>
						<!-- End .col-sm-6 col-lg-3 -->
						<div class="col-sm-6 col-lg-3">
							<div class="widget">
								<h4 class="widget-title">Useful Links</h4>
								<!-- End .widget-title -->
								<ul class="widget-list">
									<li><a href="{{ url('about') }}">About Molla</a></li>
									<li><a href="#">Our Services</a></li>
									<li><a href="#">How to shop on Molla</a></li>
									<li><a href="#">FAQ</a></li>
									<li><a href="{{ url('contact') }}">Contact us</a></li>
								</ul>
								<!-- End .widget-list -->
							</div>
							<!-- End .widget -->
						</div>
						<!-- End .col-sm-6 col-lg-3 -->
						<div class="col-sm-6 col-lg-3">
							<div class="widget">
								<h4 class="widget-title">Customer Service</h4>
								<!-- End .widget-title -->
								<ul class="widget-list">
									<li><a href="#">Payment Methods</a></li>
									<li><a href="#">Money-back guarantee!</a></li>
									<li><a href="#">Returns</a></li>
									<li><a href="#">Shipping</a></li>
									<li><a href="#">Terms and conditions</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
								<!-- End .widget-list -->
							</div>
							<!-- End .widget -->
						</div>
						<!-- End .col-sm-6 col-lg-3 -->
						<div class="col-sm-6 col-lg-3">
							<div class="widget">
								<h4 class="widget-title">My Account</h4>
								<!-- End .widget-title -->
								<ul class="widget-list">
									<li><a href="#">Sign In</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">My Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
								<!-- End .widget-list -->
							</div>
							<!-- End .widget -->
						</div>
						<!-- End .col-sm-6 col-lg-3 -->
					</div>
					<!-- End .row -->
				</div>
				<!-- End .container -->
			</div>
			<!-- End .footer-middle -->
			<div class="footer-bottom">
				<div class="container">
					<p class="footer-copyright">Copyright © 2022 Molla Store. All Rights Reserved.</p>
					<!-- End .footer-copyright -->
					<figure class="footer-payments"> <img src="{{asset('content/website')}}/assets/images/payments.png" alt="Payment methods" width="272" height="20"> </figure>
					<!-- End .footer-payments -->
				</div>
				<!-- End .container -->
			</div>
			<!-- End .footer-bottom -->
		</footer>
		<!-- End .footer -->
	</div>
	<!-- End .page-wrapper -->
	<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
	<!-- Mobile Menu -->
	<div class="mobile-menu-overlay"></div>
	<!-- End .mobil-menu-overlay -->
	<div class="mobile-menu-container">
		<div class="mobile-menu-wrapper"> <span class="mobile-menu-close"><i class="icon-close"></i></span>
			<form action="#" method="get" class="mobile-search">
				<label for="mobile-search" class="sr-only">Search</label>
				<input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
				<button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
			</form>
			<ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
				<li class="nav-item"> <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a> </li>
				<li class="nav-item"> <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a> </li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
					<nav class="mobile-nav">
						<ul class="mobile-menu">
							<li class=" {{ '/' == request()->path() ? 'active' : '' }}">
                                <a href="{{ url('/') }}">Home</a>
                            </li >
							<li {{ 'shop' == request()->path() ? 'active' : '' }}>
                                <a href="{{ url('shop') }}">Shop</a>
                            </li>
							<li class=" {{ 'product' == request()->path() ? 'active' : '' }}">
                                <a href="{{ url('product') }}" class="sf-with-ul">Product</a>
                            </li>
                            <li class=" {{ 'about' == request()->path() ? 'active' : '' }}">
                                <a href="{{ url('about') }}">About</a>
                            </li>
                            <li class=" {{ 'contact' == request()->path() ? 'active' : '' }}">
                                <a href="{{ url('contact') }}">Contact</a>
                            </li>
						</ul>
					</nav>
					<!-- End .mobile-nav -->
				</div>
				<!-- .End .tab-pane -->
        @php
            $categories = App\Models\Prodcategory::where('pro_cate_status', 1)->limit(6)->get();
        @endphp
				<div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
					<nav class="mobile-cats-nav">
						<ul class="mobile-cats-menu">
							<li><a class="mobile-cats-lead" href="#">Daily offers</a></li>
							<li><a class="mobile-cats-lead" href="#">Gift Ideas</a></li>
                            @foreach ( $categories as $category)
							<li><a href="#">{{ $category->pro_cate_name}}</a></li>
							@endforeach
						</ul>
						<!-- End .mobile-cats-menu -->
					</nav>
					<!-- End .mobile-cats-nav -->
				</div>
				<!-- .End .tab-pane -->
			</div>
			<!-- End .tab-content -->
			<div class="social-icons"> <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a> <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a> <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a> <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a> </div>
			<!-- End .social-icons -->
		</div>
		<!-- End .mobile-menu-wrapper -->
	</div>
	<!-- End .mobile-menu-container -->
	<!-- Sign in / Register Modal -->
	<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><i class="icon-close"></i></span> </button>
					<div class="form-box">
						<div class="form-tab">
							<ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
								<li class="nav-item"> <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a> </li>
								<li class="nav-item"> <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a> </li>

							</ul>
							<div class="tab-content" id="tab-content-5">
								<div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
									<form action="#">
										<div class="form-group">
											<label for="singin-email">Username or email address *</label>
											<input type="text" class="form-control" id="singin-email" name="singin-email" required> </div>
										<!-- End .form-group -->
										<div class="form-group">
											<label for="singin-password">Password *</label>
											<input type="password" class="form-control" id="singin-password" name="singin-password" required> </div>
										<!-- End .form-group -->
										<div class="form-footer">
											<button type="submit" class="btn btn-outline-primary-2"> <span>LOG IN</span> <i class="icon-long-arrow-right"></i> </button>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="signin-remember">
												<label class="custom-control-label" for="signin-remember">Remember Me</label>
											</div>
											<!-- End .custom-checkbox --><a href="#" class="forgot-link">Forgot Your Password?</a> </div>
										<!-- End .form-footer -->
									</form>
									<div class="form-choice">
										<p class="text-center">or sign in with</p>
										<div class="row">
											<div class="col-sm-6">
												<a href="#" class="btn btn-login btn-g"> <i class="icon-google"></i> Login With Google </a>
											</div>
											<!-- End .col-6 -->
											<div class="col-sm-6">
												<a href="#" class="btn btn-login btn-f"> <i class="icon-facebook-f"></i> Login With Facebook </a>
											</div>
											<!-- End .col-6 -->
										</div>
										<!-- End .row -->
									</div>
									<!-- End .form-choice -->
								</div>
								<!-- .End .tab-pane -->
								<div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
									<form action="#">
										<div class="form-group">
											<label for="register-email">Your email address *</label>
											<input type="email" class="form-control" id="register-email" name="register-email" required> </div>
										<!-- End .form-group -->
										<div class="form-group">
											<label for="register-password">Password *</label>
											<input type="password" class="form-control" id="register-password" name="register-password" required> </div>
										<!-- End .form-group -->
										<div class="form-footer">
											<button type="submit" class="btn btn-outline-primary-2"> <span>SIGN UP</span> <i class="icon-long-arrow-right"></i> </button>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="register-policy" required>
												<label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
											</div>
											<!-- End .custom-checkbox -->
										</div>
										<!-- End .form-footer -->
									</form>
									<div class="form-choice">
										<p class="text-center">or sign in with</p>
										<div class="row">
											<div class="col-sm-6">
												<a href="#" class="btn btn-login btn-g"> <i class="icon-google"></i> Login With Google </a>
											</div>
											<!-- End .col-6 -->
											<div class="col-sm-6">
												<a href="#" class="btn btn-login  btn-f"> <i class="icon-facebook-f"></i> Login With Facebook </a>
											</div>
											<!-- End .col-6 -->
										</div>
										<!-- End .row -->
									</div>
									<!-- End .form-choice -->
								</div>
								<!-- .End .tab-pane -->
							</div>
							<!-- End .tab-content -->
						</div>
						<!-- End .form-tab -->
					</div>
					<!-- End .form-box -->
				</div>
				<!-- End .modal-body -->
			</div>
			<!-- End .modal-content -->
		</div>
		<!-- End .modal-dialog -->
	</div>
	<!-- End .modal -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script>
	<!-- Plugins JS File -->
	<script src="{{asset('content/website')}}/assets/js/jquery.min.js"></script>
	<script src="{{asset('content/website')}}/assets/js/bootstrap.bundle.min.js"></script>
	<script src="{{asset('content/website')}}/assets/js/jquery.hoverIntent.min.js"></script>
	<script src="{{asset('content/website')}}/assets/js/jquery.waypoints.min.js"></script>
	<script src="{{asset('content/website')}}/assets/js/superfish.min.js"></script>
	<script src="{{asset('content/website')}}/assets/js/owl.carousel.min.js"></script>
	<script src="{{asset('content/website')}}/assets/js/bootstrap-input-spinner.js"></script>
	<script src="{{asset('content/website')}}/assets/js/jquery.plugin.min.js"></script>
	<script src="{{asset('content/website')}}/assets/js/jquery.magnific-popup.min.js"></script>
	<script src="{{asset('content/website')}}/assets/js/jquery.countdown.min.js"></script>
	<!-- Main JS File -->
	<script src="{{asset('content/website')}}/assets/js/main.js"></script>
	<script src="{{asset('content/website')}}/assets/js/demos/demo-3.js"></script>
</body>

</html>
