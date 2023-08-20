<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Models\Item;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/users' ,UserController::class )
;
Route::resource('/vendors' ,VendorController::class );
Route::resource('/brands' ,BrandController::class );
Route::resource('/items' ,ItemController::class );
Route::resource('/countries' ,CountryController::class );
Route::resource('/cities' ,CityController::class );
Route::resource('/inventories' ,InventoryController::class );
Route::get('users',[UserController::class , 'index'])->name('users.index')->middleware('auth','is_admin');
Route::get('users/create',[UserController::class , 'create'])->name('users.create')->middleware('auth','is_admin');
Route::get('/inventory/{itemId}', [InventoryController::class, 'getLargestInventory']);


Route::view('parent','cms.parent')->name('parent');

Route::get('/register', [UserAuthController::class, 'register'])->name('register');
Route::post('/register', [UserAuthController::class, 'registerPost'])->name('register');

Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('view.login');

Route::get('cart', [ItemController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ItemController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ItemController::class, 'updatecart'])->name('update.cart');
Route::delete('remove-from-cart', [ItemController::class, 'remove'])->name('remove.from.cart');
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
