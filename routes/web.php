<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\FurnitureController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

//Login
Route::post('/login', [LoginController::class, 'login']);

// View
Route::get('/view', [HomeController::class, 'viewFurniture'])->name('viewFurniture');
Route::get('/search', [HomeController::class, 'search_furniture']);
Route::get('/detail/{id}', [HomeController::class, 'detail_furniture'])->name('detail_furniture');

//Cart
Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);
Route::post('update-cart', [CartController::class, 'updatecart']);

// Profile
Route::get('profile', [ProfileController::class, 'profile'])->name('profile')->middleware('isUser');
Route::get('edit-profile/admin/{id}', [ProfileController::class, 'edit_admin_profile'])->middleware('isAdmin');
Route::get('edit-profile/member/{id}', [ProfileController::class, 'edit_member_profile'])->middleware('isMember');
Route::put('update-profile-admin/{id}', [ProfileController::class, 'update_profile_admin']);
Route::put('update-profile-member/{id}', [ProfileController::class, 'update_profile_member']);

// Transaction
Route::get('/cart', [CartController::class, 'viewcart'])->middleware('isMember');
Route::get('/checkout', [CheckoutController::class, 'viewcheckout'])->middleware('isMember');
Route::post('place-transaction', [CheckoutController::class, 'placeorder']);
Route::get('view-transaction', [TransactionController::class, 'viewtransaction'])->middleware('isUser');

// Furniture
Route::get('add-furniture', [FurnitureController::class, 'fun'])->name('fun')->middleware('isAdmin');
Route::post('insert-furniture', [FurnitureController::class, 'insertFurniture'])->name('insertFurniture');
Route::get('edit-furniture/{id}', [FurnitureController::class, 'edit_furniture'])->name('edit_furniture')->middleware('isAdmin');
Route::put('update-furniture/{id}', [FurnitureController::class, 'update_furniture'])->name('update_furniture');
Route::get('delete-furniture/{id}', [FurnitureController::class, 'delete_furniture'])->name('delete_furniture')->middleware('isAdmin');



