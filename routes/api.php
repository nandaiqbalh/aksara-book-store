<?php

use App\Http\Controllers\Api\ApiBookController;
use App\Http\Controllers\Api\ApiCheckoutController;
use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Http\Request;
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

Route::post('/user/login/', [ApiUserController::class, 'login']);
Route::post('/user/register/', [ApiUserController::class, 'register']);

Route::post('/user/get-profile/', [ApiUserController::class, 'getProfile']);
Route::post('/user/update-profile/', [ApiUserController::class, 'userProfileUpdate']);

// product

Route::get('/book/get-all/', [ApiBookController::class, 'bookAll']);

Route::get('/book/get-featured/', [ApiBookController::class, 'featuredBook']);

Route::get('/book/get-novels/', [ApiBookController::class, 'novelsBook']);

Route::post('/checkout-book', [ApiCheckoutController::class, 'checkoutBook']);
