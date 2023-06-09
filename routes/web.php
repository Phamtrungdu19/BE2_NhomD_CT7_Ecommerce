<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
});

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('collections/{category_slug}/{product_slug}', 'productView');
    Route::get('/new-arrival', 'newArrival');
    Route::get('/featured-products', 'featuredProducts');

    Route::get('/search', 'searchProduct');
});
// Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
// Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
// Route::get('collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);

// Route::get('collections/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productView']);





Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productView']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);
    //Category Router
   // Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);


    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/sliders', 'index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders/store', 'store');
    });
    Route::controller(App\Http\Controllers\Admin\BrandController::class)->group(function () {
        Route::get('/brands', 'index');
        Route::get('/brands/create', 'create');
        Route::post('/brands', 'store');
    });

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/slider', 'index');
        Route::get('/slider/create', 'create');
        Route::post('/slider/store', 'store');
        Route::get('/slider/{slider}/edit', 'edit');
        Route::put('/slider/{slider}/edit', 'update');
        Route::get('/slider/{slider}/delete', 'destroy');
    });
    Route::controller(App\Http\Controllers\Admin\BrandController::class)->group(function () {
        Route::get('/brands', 'index');
        Route::get('/brands/create', 'create');
        Route::post('/brands', 'store');
    });


    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
        Route::get('/category/{category}/delete', 'destroy');
    });


    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('products/{id}/delete', 'destroy');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');
    });


    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color}/edit', 'update');
        Route::get('/colors/{color}/delete', 'destroy');
    });


});


