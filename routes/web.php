<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

Route::get('/', function () {
    return view('home');
})->name('home');

// NOTA: Esto es el ejercicio 4.
// CART
Route::group(['prefix' => '/cart'], function () {
    Route::get('/', [CartController::class, 'cart']);
    Route::get('/{id}', [CartController::class, 'cartId']);
    Route::post('/{id}/product', [CartController::class, 'cartIdProduct']);
    Route::put('/{id}/product', [CartController::class, 'cartIdProductAdd']);
    Route::delete('/{id}/line/{id_line}', [CartController::class, 'cartIdProductDelete']);
    Route::post('/{id}/coupon', [CartController::class, 'cartIdCoupon']);
    Route::delete('/{id}/coupon', [CartController::class, 'cartIdCouponDelete']);
});

// CHECKOUT
Route::post('/checkout', [CheckoutController::class, 'checkout']);

// NOTA: Esto es el ejercicio 4. OJO que el primero no sale en Yarc
// USER
Route::group(['prefix' => '/user'], function () {
    Route::post('/login', [UserController::class, 'userLogin']);
    Route::post('/register', [UserController::class, 'userRegister']);
    Route::put('/{id}', [UserController::class, 'userUpdate']);
    Route::delete('/{id}', [UserController::class, 'userDelete'])->middleware('check.permissions');
    Route::get('/{id}/favorite', [UserController::class, 'userFavorite']);
    Route::post('/{id}/favorite/{product}', [UserController::class, 'userFavoriteAdd']);
    Route::delete('/{id}/favorite/{product}', [UserController::class, 'userFavoriteDelete']);
    Route::get('/{id}/orders', [UserController::class, 'orders']);
    Route::get('/{id}/comments', [UserController::class, 'comments']);
});

// NEWSLETTER
Route::post('/newsletter', [NewsletterController::class, 'newsletter']);
Route::delete('/newsletter', [NewsletterController::class, 'newsletterDelete']);

Route::get('/category/{id}', [CategoryController::class, 'category']);
Route::get('/category/{id}/products', [CategoryController::class, 'categoryProducts']);

// MODEL
Route::get('/model/{id}', [ModelController::class, 'model']);
Route::get('/model/{id}/comment', [ModelController::class, 'modelComment']);
Route::post('/model/{id}/comment', [ModelController::class, 'modelCommentAdd']);

// MENU
Route::get('/menu', [MenuController::class, 'menu']);
Route::get('/menu/{id}', [MenuController::class, 'menuId']);
Route::post('/search', [SearchController::class, 'search']);

// EMAIL
Route::get('/emails', [EmailController::class, 'index'])->name('emails.index');
Route::get('/create', [EmailController::class, 'create'])->name('emails.create'); //Cargar formulario
Route::post('/store', [EmailController::class, 'store'])->name('emails.store'); //Guarda en BBDD
Route::get('/edit/{id}', [EmailController::class, 'edit'])->name('emails.edit'); // Cargar formulario
Route::post('/emails/{id}', [EmailController::class, 'update'])->name('emails.update'); //modifica BBDD
Route::get('/emails/{id}', [EmailController::class, 'show'])->name('emails.show');
Route::delete('/delete/{id}', [EmailController::class, 'destroy'])->name('emails.destroy');

// PABLO: esto es la gestión de imagenes con Ramón

Route::get('/image', function () {
    $url = 'ImagenTocha.jpg';

    $manager = ImageManager::gd();

    $imagen = $manager->read($url);

    $imagen->resize(100, 100);

    $file = $imagen->toJpeg()->toFilePointer();
    Storage::disk('public')->put('file-Recorted.jpg', $file);

});

require __DIR__.'/auth.php';
