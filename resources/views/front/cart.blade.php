<!DOCTYPE html>
<html class="no-js" lang="en_AU">
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
        </div>
    </div>
</div>
<main>
    <section class="section-4 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="#">Shop</a></li>
                    <li class="breadcrumb-item">Cart</li>
                </ol>
            </div>
        </div>
    </section>                        
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif


   
    

    <section class="section-9 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="cart">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Remove</th>
                                    {{-- <th>Quantity</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                            @php
                            $subtotal = 0;
                            @endphp
                            @foreach ($cart as $item)
                            @php
                                $subtotal += $item['product']->price;
                            @endphp
                               
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            

                                            <h2>{{ $item['product']->title }}</h2>
                                            
                                         


                                        </div>
                                    </td>
                                    <td>                             {{ $item['product']->price }}</td>
                                    
                                        {{-- <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm border-0 text-center" value="1">
                                            <div class="input-group-btn">

                                                <form action="" method="post">
                                                <button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </form>
                                            </div>
                                        </div> --}}
                                    
                                    <td>
                                        @if ($item['product']->productImage)
                                        <img src="{{ asset($item['product']->productImage->image) }}" width="100" height="100">
                                    @else
                                        <span>No Image Available</span>
                                    @endif
                                    </td>              
                                    
                                    @php 
                                    
                                    $id = $item['product']->id;  
                                    @endphp

                                    <td>
                                        <form method="get" action="{{ route('cart.remove',$id)}}">
                                            @csrf
                                        <button href="" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                        
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">            
                    <div class="card cart-summery">
                        <div class="sub-title">
                            <h2 class="bg-white">Cart Summary</h2>
                        </div> 
                        <div class="card-body">
                            <div class="d-flex justify-content-between pb-2">
                                <div>Subtotal</div>
                                <div>&#8377;{{ $subtotal }}</div> 
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <div>Shipping</div>
                                <div><i class="bi bi-currency-rupee">&#8377;100</i></div>
                            </div>
                            <div class="d-flex justify-content-between summery-end">
                                <div>Total</div>
                                <div>&#8377;{{ $subtotal +  100}}</div>
                            </div>
                            <div class="pt-5">
                                <a href="{{ route('stripeLoad'),$subtotal}}" class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>
</main>

<footer class="bg-dark mt-5">
    <div class="container pb-5 pt-3">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-card">
                    <h3>Get In Touch</h3>
                    <p>Sector 21, Kaithal, Haryana <br>
                    pardeepsharma@gmail.com <br>
                    8708003431</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-card">
                    <h3>Important Links</h3>
                    <ul>
                        <li><a href="about-us.php" title="About">About</a></li>
                        <li><a href="contact-us.php" title="Contact Us">Contact Us</a></li>                        
                        <li><a href="#" title="Privacy">Privacy</a></li>
                        <li><a href="#" title="Privacy">Terms & Conditions</a></li>
                        <li><a href="#" title="Privacy">Refund Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-card">
                    <h3>My Account</h3>
                    <ul>                        
                        <li><a href="{{route('account.login')}}" title="Sell">Login</a></li>
                        <li><a href="{{route('account.register')}}" title="Advertise">Register</a></li>
                        <li><a href="#" title="My Orders">My Orders</a></li>                        
                    </ul>
                </div>
            </div>          
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="copy-right text-center">
                        <p>© Copyright Tech Pinak. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('front-assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('front-assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/slick.min.js') }}"></script>
<script src="{{ asset('front-assets/js/custom.js') }}"></script>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
</body>
</html>