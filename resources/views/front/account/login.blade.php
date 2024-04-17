<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Homepage</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />

	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />

	<meta property="og:locale" content="en_AU" />
	<meta property="og:type" content="website" />
	<meta property="fb:admins" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="" />
	<meta property="og:image:height" content="" />
	<meta property="og:image:alt" content="" />

	<meta name="twitter:title" content="" />
	<meta name="twitter:site" content="" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:image:alt" content="" />
	<meta name="twitter:card" content="summary_large_image" />
	

	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick-theme.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/video-js.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/style.css') }}">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">

	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />
</head>
<body data-instant-intensity="mousedown">

    

<div class="bg-light top-header">        
	<div class="container">
		<div class="row align-items-center py-3 d-none d-lg-flex justify-content-between">
			<div class="col-lg-4 logo">
				<a href="{{route('home')}}" class="text-decoration-none">
					<span class="h1 text-uppercase text-primary bg-dark px-2">tech</span>
					<span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">pinak</span>
				</a>
			</div>
			
		</div
	</div>
</div>


	
          <hr>

  	</div>



    
<br>


<main>
   




	<section class="section-10">
		<div class="container">
			@if(Session::has('success'))
				<div class="alert alert-success">
					{{ Session::get('success') }}
				</div>
			@endif
	
			@if(Session::has('error'))
				<div class="alert alert-danger">
					{{ Session::get('error') }}
				</div>
			@endif
	
			<div class="login-form">    
				<form action="{{ route('account.authenticate') }}" method="post">
					@csrf
					<h4 class="modal-title">Login to Your Account</h4>
					<div class="form-group">
						<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
						@error('email')
							<p class="invalid-feedback">{{ $message }}</p>
						@enderror
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
						@error('password')
							<p class="invalid-feedback">{{ $message }}</p>
						@enderror
					</div>
					<div class="form-group small">
						<a href="#" class="forgot-link"></a>
					</div> 
					<input type="submit" class="btn btn-dark btn-block btn-lg" value="Login">              
				</form>			
				<div class="text-center small">Don't have an account? <a href="{{ route('account.register') }}">Sign up</a></div>
			</div>
		</div>
	</section>
	
</main>
