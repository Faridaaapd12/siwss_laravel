<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SortController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\PackageDetailController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\RecomendationController;
use App\Http\Controllers\SearchController;

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

Route::get('/', [PackagesController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/recomendation', [RecomendationController::class, 'index']);


Route::get('/packages/grid', [PackagesController::class, 'packageGridIndex']);
Route::get('/packages/list', [PackagesController::class, 'packageListIndex']);

Route::get('/packages/sort/all', [SortController::class, 'all']);
//Route::get('/package/{id}', [PackageDetailController::class, 'index']);
Route::get('/package', [PackageDetailController::class, 'index'])->name('package-detail');
Route::get('/package/{id}', [PackageDetailController::class, 'show'])->name('package-detail.show');

Route::post('/search', [SearchController::class, 'homeSearch']);
Route::post('search/grid', [SearchController::class, 'gridSearch']);
Route::post('/search/list', [SearchController::class, 'listSearch']);



Route::get('/cart1', [CartController::class, 'indexCart1']);
Route::get('/cart3', [CartController::class, 'indexCart3'])->middleware('auth')->middleware('cart');
Route::get('/invoice', [InvoiceController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'addToCart'])->middleware('auth');
Route::delete('/cart1/delete/{id}', [CartController::class, 'deleteCartItem']);

Route::get('/wishlist', [WishlistController::class, 'index']);
Route::post('/wishlist/add', [WishlistController::class, 'add'])->middleware('auth');
Route::post('/wishlist/delete', [WishlistController::class, 'delete'])->middleware('auth');

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });
    Route::get('/login', [AdminLoginController::class, 'index']);
    // Route::get('/login', 'App\Http\Controllers\Admin\AdminLoginController@index');
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::get('/register', [AdminRegisterController::class, 'index']);
    Route::post('/register', [AdminRegisterController::class, 'create']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/add-listing', [PackageController::class, 'createForm'])->name('package.create');
    Route::post('/add-listing', [PackageController::class, 'create'])->name('package.store');
    Route::get('/update-listing/{id}', [PackageController::class, 'viewUpdate'])->middleware('dashboard');
    Route::get('/listings', [PackageController::class, 'listing'])->name('listings');
    Route::get('/listing/{id}', [PackageController::class, 'viewlisting'])->name('listing.view');
});
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
