<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>my orders</title>
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
</div><hr>

 <section class="section-4 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="#">Accounts</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="#">{{ auth()->user()->name }}</a></li>
                    <li class="breadcrumb-item">Orders</li>
                </ol>
            </div>
        </div>
    </section>      
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
               
            </div>
            <div class="col-sm-6 text-right">
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                   
                </div><br>
            </div>
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>  
                            
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Delivery Address</th>
                            <th>Order On</th>
                            
                         
                            {{-- <th>Address</th>
                            <th>city</th>
                            <th>State</th>
                            <th>Zip</th>
                            <th>Mobile</th>
                            <th>Transaction Id</th>
                            <th>Amount</th> --}}

                            
                        </tr>
                    </thead>
                    <tbody>     @foreach ($Details as $Detail)
                           
                        <tr>
                            <td>{{$Detail->last_name}}</td>
                            <td>{{$Detail->amount}}</td>
                            <td>{{$Detail->address}} </td>
                            <td>{{$Detail->created_at}} </td>
                            {{-- <td>{{$Detail->first_name}}</td>														
                            <td>{{$Detail->last_name}}</td>
                            <td>{{$Detail->email}}</td>
                           <
                            <td>{{$Detail->address}}</td>
                            <td>{{$Detail->city}}</td>
                            <td>{{$Detail->state}}</td>
                            <td>{{$Detail->zip}}</td>
                            <td>{{$Detail->mobile}}</td>
                            <td>{{$Detail->source}}</td>
                            <td>{{$Detail->amount}}</td> --}}
                        </tr>
                        
                  
                    
                      @endforeach
                    </tbody>
                </table>										
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination m-0 float-right">
                  {{-- <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
</div>