<?php

use App\Mail\TransactionalMail;
use Illuminate\Support\Facades\Mail;


use App\Http\Controllers\Api\Address\AddressController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\AuthUserController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\Brand\BrandController;
use App\Http\Controllers\Api\Cart\CartController;
use App\Http\Controllers\Api\Unit\UnitController;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Country\CountryController;
use App\Http\Controllers\Api\City\CityController;
use App\Http\Controllers\Api\Product\ProductController;

Route::middleware(['api', \Illuminate\Http\Middleware\HandleCors::class])->group(function () {

    // Consolidated CORS-protected routes
    // Consolidated routes with CORS protection
    // All API routes with CORS protection

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    // Authentication routes
    Route::controller(AuthUserController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');

        // Protected routes
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('/logout', 'logout');
            Route::post('/refresh', 'refresh');
            Route::get('/me', 'me');
        });
    });

    // Test route
    Route::get('test', function () {
        return response()->json("test");
    });
// routes/api.php





// Route::get('Register',[])

// Protected User API Routes with Token Authentication
Route::middleware(['auth:sanctum'])->prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

// Protected Brand API Routes with Token Authentication
Route::middleware(['auth:sanctum'])->prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index']);
    Route::get('/{id}', [BrandController::class, 'show']);
    Route::post('/', [BrandController::class, 'store']);
    Route::put('/{id}', [BrandController::class, 'update']);
    Route::delete('/{id}', [BrandController::class, 'destroy']);
});

// Public Country API Routes
});

// Public Country API Routes
Route::prefix('countries')->group(function () {
    Route::get('/', [CountryController::class, 'index']);
    Route::get('/{id}', [CountryController::class, 'show']);
    Route::post('/', [CountryController::class, 'store']);
    Route::put('/{id}', [CountryController::class, 'update']);
    Route::delete('/{id}', [CountryController::class, 'destroy']);
});

// City API Routes
Route::prefix('cities')->group(function () {
    Route::get('/', [CityController::class, 'index']);
    Route::get('/{id}', [CityController::class, 'show']);
    Route::post('/', [CityController::class, 'store']);
    Route::put('/{id}', [CityController::class, 'update']);
    Route::delete('/{id}', [CityController::class, 'destroy']);
});

Route::middleware(['auth:sanctum'])->prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class,'show']);
    Route::post('/', [ProductController::class,'store']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});

Route::middleware(['auth:sanctum'])->prefix('units')->group(function () {
    Route::get('/', [UnitController::class, 'index']);
    Route::get('/{id}', [UnitController::class, 'show']);
    Route::post('/', [UnitController::class, 'store']);
    Route::POST('/{id}', [UnitController::class, 'update']);
    Route::delete('/{id}', [UnitController::class, 'destroy']);
});

Route::middleware(['auth:sanctum'])->prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});


Route::prefix('website')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::get('/products/section', [ProductController::class, 'index']);
    Route::get('show/products/{id}', [ProductController::class, 'show']);
    Route::get('latest/products', [ProductController::class, 'latestProducts']);
    Route::get('/brands/section', [BrandController::class, 'index']);
    Route::get('brands/{id}', [BrandController::class, 'show']);

});

// add api for currencies
Route::middleware(['auth:sanctum'])->prefix('currencies')->group(function () {
    Route::get('/', [CurrencyController::class, 'index']);
    Route::get('/{id}', [CurrencyController::class,'show']);
    Route::post('/', [CurrencyController::class,'store']);
    Route::post('/{id}', [CurrencyController::class, 'update']);
    Route::delete('/{id}', [CurrencyController::class, 'destroy']);
});



Route::middleware(['auth:sanctum'])->prefix('address')->group(function(){
    Route::get('/',[AddressController::class,'index']);
    Route::post('/', [AddressController::class, 'store']);
    Route::get('/{id}', [AddressController::class, 'show']);
    Route::post('/{id}', [AddressController::class, 'update']);
    Route::delete('/{id}',[AddressController::class,'delete']);
});
Route::middleware(['auth:sanctum'])->prefix('cart')->group(function(){
    Route::get('/',[CartController::class,'index']);
    Route::post('/', [CartController::class, 'store']);
    Route::get('/{id}',[CartController::class,'show']);
    Route::post('/{id}',[CartController::class,'update']);
    Route::delete('/{id}',[CartController::class,'delete']);
});





