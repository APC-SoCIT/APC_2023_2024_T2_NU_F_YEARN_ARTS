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

Route::get('/Products', function () {
    return view('YearnArt.Products');
})->name('Products');

Route::get('/About', function () {
    return view('YearnArt.About');
})->name('About');

Route::get('/MyOrders', function () {
    return view('YearnArt.MyOrders');
})->name('MyOrders');


route::get('/home',[HomeController::class,'home']);

route::get('/view_category',[AdminController::class,'view_category']);
