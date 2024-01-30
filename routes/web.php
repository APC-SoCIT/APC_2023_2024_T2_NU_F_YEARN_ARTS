<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



route::get('/',[HomeController::class,'index']);


//USER SIDE
route::get('/Products',[HomeController::class,'Products']);
route::get('/product_details/{id}',[HomeController::class,'product_details']);
route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
route::get('/product_details/{id}',[HomeController::class,'product_details']);
route::get('/About',[HomeController::class,'About']);
route::get('/show_cart',[HomeController::class,'show_cart']);
route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
route::get('/cash_order',[HomeController::class,'cash_order']);
route::get('/show_orders',[HomeController::class,'show_orders']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


/* Routes */

Route::get('/Signup', function () {
    return view('YearnArt.Signup');
})->name('Signup');

Route::get('/FAQ', function () {
    return view('YearnArt.FAQ');
})->name('FAQ');

// Route::get('/Products', function () {
//     return view('YearnArt.Products');
// })->name('Products');

// Route::get('/About', function () {
//     return view('YearnArt.About');
// })->name('About');

// Route::get('/MyOrders', function () {
//     return view('YearnArt.MyOrders');
// })->name('MyOrders');



//ADMIN SIDE
route::get('/home',[HomeController::class,'home']);
route::get('/admin_dashboard',[AdminController::class,'admin_dashboard']);
route::get('/view_category',[AdminController::class,'view_category']);
route::post('/add_category',[AdminController::class,'add_category']);
route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
route::get('/view_product',[AdminController::class,'view_product']);
route::post('/add_product',[AdminController::class,'add_product']);
route::get('/show_product',[AdminController::class,'show_product']);
route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
route::get('/update_product/{id}',[AdminController::class,'update_product']);
route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);
route::get('/order',[AdminController::class,'order']);
route::get('/payment',[AdminController::class,'payment']);
route::get('/to_pay/{id}',[AdminController::class,'to_pay']);

