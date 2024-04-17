
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;




//public routes 
Route::get('/', [FrontController::class, 'index'])->name('home'); // show main site front end page --homepage
Route::get('/about', [FrontController::class, 'about'])->name('about'); //about us
Route::get('/contact', [FrontController::class, 'contact'])->name('contact'); // contact us
Route::get('/front/product/{title}', [ShopController::class, 'single_product'])->name('front.product'); // show product detail page 

Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); //cart page show 
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update'); //update count of cart item
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');  //cart item removed

//Route::get('/checkout', [AuthController::class, 'checkout'])->name('checkout'); //for testing only





// prefix = account means related to user

Route::group(['prefix' => 'account'], function () {

    Route::group(['middleware' => 'guest'], function () {

        // user login is not require for them
        Route::get('/register', [AuthController::class, 'register'])->name('account.register'); // register user account
        Route::post('/store', [AuthController::class, 'store'])->name('account.store'); // store account info into DB
        Route::get('/login', [AuthController::class, 'login'])->name('account.login'); //  login user account -frontend
        Route::post('/login', [AuthController::class, 'authenticate'])->name('account.authenticate'); // process user login
    



    });


    Route::group(['middleware' => 'auth'], function () {

        // User should be authenticated 
        Route::get('/profile', [AuthController::class, 'profile'])->name('account.profile');  //show user profile
        Route::get('/logout', [AuthController::class, 'logout'])->name('account.logout');     //log out user
        Route::post('/cart/add{id}', [CartController::class, 'add'])->name('cart.add');       //add a item into cart
        Route::get('/stripe-payment', [StripeController::class, 'handleGet'])->name('stripeLoad'); // show payment page
        Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment'); //process payment
        Route::get('/myorder', [AuthController::class, 'orders'])->name('userOrder'); // show user orders details

    });
});




Route::group(['prefix' => 'admin'], function () {

    //public routes for admin 

    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {

        // Add your authenticated admin routes here

        //homecontroller routes (admin)

        Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [HomeController::class, 'logout'])->name('admin.logout');

        //categories routes(admin)

        Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::get('categories/list', [CategoryController::class, 'index'])->name('categories.list');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');



        //products related routes (admin)

        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // create new blade show 
        Route::get('/products/index', [ProductController::class, 'index'])->name('products.index'); // show all product admin table
        Route::post('/products/store', [ProductController::class, 'store'])->name('products.store'); // product store in db
        Route::get('/products/destroy/{id}', [ProductController::class, 'show'])->name('products.destroy');// products delelete single


        Route::resource('products', ProductController::class); // product resource controller
        Route::get('/product/{productId}/images/create', [ProductImageController::class, 'create'])->name('product.images.create'); // product image 
        Route::post('/product/images/store', [ProductImageController::class, 'store'])->name('product.images.store'); // product image store

        //orders related routes
        Route::get('/orders', [OrderController::class, 'show'])->name('orders'); // show all orders details admin side

    });
});
