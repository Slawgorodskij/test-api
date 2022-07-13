<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CitySalonController;
use App\Http\Controllers\Api\SalonController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'city' => CityController::class,
    'city/{city}/salon' => CitySalonController::class,
]);

Route::get('/salon/city-salon-name', [SalonController::class, 'citySalonName']);
Route::get('/salon/stock-stats', [SalonController::class, 'stockStats']);
Route::get('/salon/stock-price', [SalonController::class, 'stockPrice']);
Route::get('/salon/color-stats', [SalonController::class, 'colorStats']);
Route::get('/salon/stock-stats-order', [SalonController::class, 'stockStatsOrder']);
