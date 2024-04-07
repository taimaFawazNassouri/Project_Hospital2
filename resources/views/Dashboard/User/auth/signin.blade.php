@extends('Dashboard.layouts.master2')
@section('css')
<style>
	.loginform{display: none;}
</style>
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('Dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
										
															<ul>
																@foreach ($errors->all() as $error)
																	<li class="alert alert-danger">{{ $error }}</li>
																@endforeach
															</ul>
											
														<h2>{{trans('Dashboard/login_trans.Welcome')}}</h2>
												<h5 class="font-weight-semibold mb-4">{{trans('Dashboard/login_trans.Select_Enter')}}</h5>
												<div class="form-group">
													<label for="exampleFormControlSelect1">{{trans('Dashboard/login_trans.Choose_list')}}</label>
													<select class="form-control" id="SectionChooser">
													  <option value="" selected>{{trans('Dashboard/login_trans.Choose_list')}}</option>
													  <option value="users">{{trans('Dashboard/login_trans.user')}}</option>
													  <option value="admin">{{trans('Dashboard/login_trans.admin')}}</option>
													  <option value="doctors">{{trans('Dashboard/login_trans.doctor')}}</option>
													  <option value="ray_employee">{{trans('login_trans.Ray_employee')}}</option>
													  <option value="laboratorie_employee">{{trans('Dashboard/login_trans.laboratorie_employee')}}</option>
													  <option value="patient">{{trans('Dashboard/login_trans.patient')}}</option>



													
													</select>
												  </div>
											<!--form user(patients) -->
											 <div class="loginform" id="users">
												<h5 class="font-weight-semibold mb-4">Log In As User</h5>
												<form method="POST" action="{{ route('login.user') }}">
													@csrf
													<div class="form-group">
														<x-input-label for="email" :value="__('Email')" />
														<x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
														<x-input-error :messages="$errors->get('email')" class="mt-2" />
													</div>
													<div class="form-group">
															<x-input-label for="password" :value="__('Password')" />

															<x-text-input id="password" class="form-control"
																			type="password"
																			name="password"
																			required autocomplete="current-password" />
												
															<x-input-error :messages="$errors->get('password')" class="mt-2" />
													</div>
													<button class="btn btn-main-primary btn-block" type="submit" >Sign In</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
														</div>
													</div>
												</form>
												<div class="main-signin-footer mt-5">
														@if (Route::has('password.request'))
														<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
															{{ __('Forgot your password?') }}
														</a>
													@endif
										
												</div>
											</div>
											 <!--form admin -->
											<div class="loginform" id="admin">
													<h5 class="font-weight-semibold mb-4">Log In As Admin</h5>
														<form method="POST" action="{{ route('login_admin') }}">
															@csrf
															<div class="form-group">
																<x-input-label for="email" :value="__('Email')" />
																<x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
																<x-input-error :messages="$errors->get('email')" class="mt-2" />
															</div>
															<div class="form-group">
																	<x-input-label for="password" :value="__('Password')" />
		
																	<x-text-input id="password" class="form-control"
																					type="password"
																					name="password"
																					required autocomplete="current-password" />
														
																	<x-input-error :messages="$errors->get('password')" class="mt-2" />
															</div>
															<button class="btn btn-main-primary btn-block" type="submit" >Sign In</button>
															<div class="row row-xs">
																<div class="col-sm-6">
																	<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
																</div>
																<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																	<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
																</div>
															</div>
														</form>
														<div class="main-signin-footer mt-5">
																@if (Route::has('password.request'))
																<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
																	{{ __('Forgot your password?') }}
																</a>
															@endif
												
														</div>
											</div>
											<!--form doctor -->
											<div class="loginform" id="doctors">
													<h5 class="font-weight-semibold mb-4">Log In As Doctor</h5>
													<form method="POST" action="{{ route('login_doctor') }}">
														@csrf
														<div class="form-group">
															<x-input-label for="email" :value="__('Email')" />
															<x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
															<x-input-error :messages="$errors->get('email')" class="mt-2" />
														</div>
														<div class="form-group">
																<x-input-label for="password" :value="__('Password')" />
	
																<x-text-input id="password" class="form-control"
																				type="password"
																				name="password"
																				required autocomplete="current-password" />
													
																<x-input-error :messages="$errors->get('password')" class="mt-2" />
														</div>
														<button class="btn btn-main-primary btn-block" type="submit" >Sign In</button>
														<div class="row row-xs">
															<div class="col-sm-6">
																<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
															</div>
														</div>
													</form>
													<div class="main-signin-footer mt-5">
															@if (Route::has('password.request'))
															<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
																{{ __('Forgot your password?') }}
															</a>
														@endif
											
													</div>
											</div>
											<!--form ray_employee -->
											<div class="loginform" id="ray_employee">
												<h5 class="font-weight-semibold mb-4">Log In As RayEmployee</h5>
												<form method="POST" action="{{ route('login_RayEmployee') }}">
													@csrf
													<div class="form-group">
														<x-input-label for="email" :value="__('Email')" />
														<x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
														<x-input-error :messages="$errors->get('email')" class="mt-2" />
													</div>
													<div class="form-group">
															<x-input-label for="password" :value="__('Password')" />

															<x-text-input id="password" class="form-control"
																			type="password"
																			name="password"
																			required autocomplete="current-password" />
												
															<x-input-error :messages="$errors->get('password')" class="mt-2" />
													</div>
													<button class="btn btn-main-primary btn-block" type="submit" >Sign In</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
														</div>
													</div>
												</form>
												<div class="main-signin-footer mt-5">
														@if (Route::has('password.request'))
														<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
															{{ __('Forgot your password?') }}
														</a>
													@endif
										
												</div>
											</div>
											<!--form laboratorie_employee -->

											<div class="loginform" id="laboratorie_employee">
													<h5 class="font-weight-semibold mb-4">Log In As LaborstorieEmployee</h5>
													<form method="POST" action="{{ route('login_LaboratorieEmployee') }}">
														@csrf
														<div class="form-group">
															<x-input-label for="email" :value="__('Email')" />
															<x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
															<x-input-error :messages="$errors->get('email')" class="mt-2" />
														</div>
														<div class="form-group">
																<x-input-label for="password" :value="__('Password')" />
	
																<x-text-input id="password" class="form-control"
																				type="password"
																				name="password"
																				required autocomplete="current-password" />
													
																<x-input-error :messages="$errors->get('password')" class="mt-2" />
														</div>
														<button class="btn btn-main-primary btn-block" type="submit" >Sign In</button>
														<div class="row row-xs">
															<div class="col-sm-6">
																<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
															</div>
														</div>
													</form>
													<div class="main-signin-footer mt-5">
															@if (Route::has('password.request'))
															<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
																{{ __('Forgot your password?') }}
															</a>
														@endif
											
													</div>
											</div>
											<!--form Patient -->

											<div class="loginform" id="patient">
													<h5 class="font-weight-semibold mb-4">Log In As LaborstorieEmployee</h5>
													<form method="POST" action="{{ route('login_Patient') }}">
														@csrf
														<div class="form-group">
															<x-input-label for="email" :value="__('Email')" />
															<x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
															<x-input-error :messages="$errors->get('email')" class="mt-2" />
														</div>
														<div class="form-group">
																<x-input-label for="password" :value="__('Password')" />
	
																<x-text-input id="password" class="form-control"
																				type="password"
																				name="password"
																				required autocomplete="current-password" />
													
																<x-input-error :messages="$errors->get('password')" class="mt-2" />
														</div>
														<button class="btn btn-main-primary btn-block" type="submit" >Sign In</button>
														<div class="row row-xs">
															<div class="col-sm-6">
																<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
															</div>
														</div>
													</form>
													<div class="main-signin-footer mt-5">
															@if (Route::has('password.request'))
															<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
																{{ __('Forgot your password?') }}
															</a>
														@endif
											
													</div>
											</div>

										</div>
										</div> 
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
<script>
	$("#SectionChooser").change(function(){
		var myId = $(this).val();
		$(".loginform").each(function(){
			myId === $(this).attr("id") ?$(this).show() :$(this).hide();


		});
	});
</script>
@endsection