@extends('layouts.website')
@section('content')

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('{{asset('content/website')}}/assets/images/backgrounds/login-bg.jpg')">
            	<div class="container">
            		<div class="form-box">
            			<div class="form-tab">
	            			<ul class="nav nav-pills nav-fill" role="tablist">
							    <li class="nav-item">
							        <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
							    </li>
							    <li class="nav-item">
							        <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
							    </li>
							</ul>
							<div class="tab-content">
							    <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">

                                    <form method="get" action="{{ route('user_login_access') }}">
                                        @csrf
										<div class="form-group">
											<label  for="email" :value="__('Email')">Email address *</label>
											<input type="text" class="form-control" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus> </div>
										<!-- End .form-group -->
										<div class="form-group">
											<label for="password" :value="__('Password')" >Password *</label>
											<input class="form-control" id="password" type="password" name="password"
                                            required autocomplete="current-password"> </div>
										<!-- End .form-group -->
										<div class="form-footer">
											<button type="submit" class="btn btn-outline-primary-2"> <span>LOG IN</span> <i class="icon-long-arrow-right"></i> </button>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="signin-remember">
												<label class="custom-control-label" for="signin-remember">
                                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
											</div>
											<!-- End .custom-checkbox -->
                                            @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="forgot-link">Forgot Your Password?</a>
                                             @endif
                                             </div>
										<!-- End .form-footer -->
									</form>

							    	<div class="form-choice">
								    	<p class="text-center">or sign in with</p>
								    	<div class="row">
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login btn-g">
								    				<i class="icon-google"></i>
								    				Login With Google
								    			</a>
								    		</div><!-- End .col-6 -->
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login btn-f">
								    				<i class="icon-facebook-f"></i>
								    				Login With Facebook
								    			</a>
								    		</div><!-- End .col-6 -->
								    	</div><!-- End .row -->
							    	</div><!-- End .form-choice -->
							    </div><!-- .End .tab-pane -->
							    <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">

                                    <form method="POST" action="{{ route('user_register_access') }}">
                                        @csrf
                                        <div class="form-group">
											<label for="name" :value="__('Name')">Name *</label>
											<input  class="form-control" id="name" type="text" name="name" :value="old('name')" required autofocus>
                                        </div>
										<div class="form-group">
											<label for="email" :value="__('Email')" >Your email address *</label>
											<input class="form-control" id="email" type="email" name="email" :value="old('email')" required>
                                        </div>
										<!-- End .form-group -->
										<div class="form-group">
											<label for="password" :value="__('Password')">Password *</label>
											<input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" >
                                         </div>
                                         <div class="form-group">
											<label for="password_confirmation" :value="__('Confirm Password')" >Confrim Password *</label>
											<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                         </div>
										<!-- End .form-group -->
										<div class="form-footer">
											<button type="submit" class="btn btn-outline-primary-2"> <span>SIGN UP</span> <i class="icon-long-arrow-right"></i> </button>

											<!-- End .custom-checkbox -->
										</div>
										<!-- End .form-footer -->
									</form>

							    	<div class="form-choice">
								    	<p class="text-center">or sign in with</p>
								    	<div class="row">
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login btn-g">
								    				<i class="icon-google"></i>
								    				Login With Google
								    			</a>
								    		</div><!-- End .col-6 -->
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login  btn-f">
								    				<i class="icon-facebook-f"></i>
								    				Login With Facebook
								    			</a>
								    		</div><!-- End .col-6 -->
								    	</div><!-- End .row -->
							    	</div><!-- End .form-choice -->
							    </div><!-- .End .tab-pane -->
							</div><!-- End .tab-content -->
						</div><!-- End .form-tab -->
            		</div><!-- End .form-box -->
            	</div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->

@endsection
