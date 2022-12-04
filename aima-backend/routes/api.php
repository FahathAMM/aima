<?php

use App\Http\Controllers\api\ClientController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\PurchaseController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/logout', [AuthController::class, 'logout']);

// Route::get('/user', [AuthController::class, 'me'])->middleware('auth:sanctum');

// Route::post('/login', [AuthController::class, 'login']);

Route::resource('clients', ClientController::class);
Route::resource('products', ProductController::class);

Route::resource('purchases', PurchaseController::class);
Route::get('get_purchase_list_by_client/{id}', [PurchaseController::class, 'getPurchaseListByClient']);
Route::get('get_total_count/{id}', [PurchaseController::class, 'getTotalCount']);
