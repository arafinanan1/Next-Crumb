<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get("/", [HomeController::class, 'my_home']);


// Secondary admin home URL used by UI links — use controller logic
Route::get('/admin/home', [HomeController::class, 'index']);



Route::get('/add_food',[AdminController::class,'add_food']);
Route::get('/view_food',[AdminController::class,'view_food']);
Route::get('/delete_food/{id}',[AdminController::class,'delete_food']);
Route::get('/update_food/{id}',[AdminController::class,'update_food']);
Route::Post('/edit_food/{id}',[AdminController::class,'edit_food']);
Route::Post('/upload_food',[AdminController::class,'upload_food']);

Route::get('/on_the_way/{id}',[AdminController::class,'on_the_way']);
Route::get('/delivered/{id}', [AdminController::class, 'delivered']);
Route::get('/cancel_order/{id}', [AdminController::class, 'cancel_order']);


Route::get('/add_event',[AdminController::class,'add_event']);
Route::get('/view_event',[AdminController::class,'view_event']);
Route::get('/delete_event/{id}',[AdminController::class,'delete_event']);
Route::Post('/upload_event',[AdminController::class,'upload_event']);

Route::get('/home',[HomeController::class,'index']);

Route::Post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/my_cart', [HomeController::class, 'my_cart'])
    ->middleware('auth')->name('my_cart');

// Reviews (require authentication)
Route::middleware('auth')->group(function () {
    Route::get('/add_review', [HomeController::class, 'showReviewForm'])->name('add_review.form');
    Route::post('/add_review', [HomeController::class, 'add_review'])->name('add_review.submit');
});


Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

Route::post('/confirm_order', [HomeController::class,'confirm_order'])
    
    ->name('confirm_order');

Route::get('/orders', [AdminController::class, 'orders'])
    ->name('orders');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
