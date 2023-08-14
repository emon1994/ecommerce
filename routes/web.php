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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/redirect',[HomeController::class, 'redirect']);

Route::get('/',[HomeController::class, 'index']);

Route::get('/view_catagory',[AdminController::class, 'view_catagory']);

Route::post('/add_category',[AdminController::class, 'add_category']);

Route::get('/delete_post/{id}',[AdminController::class, 'delete_post']);

Route::get('/add_product',[AdminController::class, 'add_product']);

Route::post('/store_product',[AdminController::class, 'store_product']);

Route::get('/show_product',[AdminController::class, 'show_product']);

Route::get('/delete_product/{id}',[AdminController::class, 'delete_product']);

Route::get('/edit_product/{id}',[AdminController::class, 'edit_product']);

Route::post('/update_product/{id}',[AdminController::class, 'update_product']);

Route::get('/products_detail/{id}',[HomeController::class, 'products_detail']);

Route::post('/add_cart/{id}',[HomeController::class, 'add_cart']);

Route::get('/show_cart',[HomeController::class, 'show_cart']);

Route::get('/remove_cart/{id}',[HomeController::class, 'remove_cart']);

Route::get('/cash_order',[HomeController::class, 'cash_order']);

Route::get('/stripe/{totalAmount}',[HomeController::class, 'stripe']);

Route::post('stripe/{totalAmount}', [HomeController::class,'stripePost'])->name('stripe.post');








