<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CashlowController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\BusinessinfoController;
use App\Http\Controllers\Api\SalesforcastController;
use App\Http\Controllers\Api\UserBusinessinfosController;
use App\Http\Controllers\Api\BusinessinfoCashlowsController;
use App\Http\Controllers\Api\BusinessinfoProductsController;
use App\Http\Controllers\Api\ProductSalesforcastsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');
// Route::post('audience_need',[BusinessinfoController::class,'audience_need'])->name('audience_need');
Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('businessinfos', BusinessinfoController::class);

        // Businessinfo Cashlows
        Route::get('/businessinfos/{businessinfo}/cashlows', [
            BusinessinfoCashlowsController::class,
            'index',
        ])->name('businessinfos.cashlows.index');
        Route::post('/businessinfos/{businessinfo}/cashlows', [
            BusinessinfoCashlowsController::class,
            'store',
        ])->name('businessinfos.cashlows.store');

        // Businessinfo Products
        Route::get('/businessinfos/{businessinfo}/products', [
            BusinessinfoProductsController::class,
            'index',
        ])->name('businessinfos.products.index');
        Route::post('/businessinfos/{businessinfo}/products', [
            BusinessinfoProductsController::class,
            'store',
        ])->name('businessinfos.products.store');

        Route::apiResource('cashlows', CashlowController::class);

        Route::apiResource('products', ProductController::class);

        // Product Salesforcasts
        Route::get('/products/{product}/salesforcasts', [
            ProductSalesforcastsController::class,
            'index',
        ])->name('products.salesforcasts.index');
        Route::post('/products/{product}/salesforcasts', [
            ProductSalesforcastsController::class,
            'store',
        ])->name('products.salesforcasts.store');

        Route::apiResource('salesforcasts', SalesforcastController::class);

        Route::apiResource('users', UserController::class);

        // User Businessinfos
        Route::get('/users/{user}/businessinfos', [
            UserBusinessinfosController::class,
            'index',
        ])->name('users.businessinfos.index');
        Route::post('/users/{user}/businessinfos', [
            UserBusinessinfosController::class,
            'store',
        ])->name('users.businessinfos.store');
    });
