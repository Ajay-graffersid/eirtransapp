<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apicontroller;

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

    // Route::post('logi', [CustomerController::class, 'index'])->name('logi');
});


Route::post('loginDriver', [Apicontroller::class, 'loginDriver'])->name('loginDriver');
Route::get('getAllDrivers', [Apicontroller::class, 'getAllDrivers'])->name('getAllDrivers');
Route::get('getAllTrucks', [Apicontroller::class, 'getTurck'])->name('getTurck');
Route::get('getAllTruckAccesories', [Apicontroller::class, 'getAllTruckAccesories'])->name('getAllTruckAccesories');
Route::post('createMorningAccepted', [Apicontroller::class, 'createMorningAccepted'])->name('createMorningAccepted');
Route::post('getDriverAssignToLoader', [Apicontroller::class, 'getDriverAssignToLoader'])->name('getDriverAssignToLoader');
Route::post('getJobsByLoadContainer', [Apicontroller::class, 'getJobsByLoadContainer'])->name('getJobsByLoadContainer');

Route::post('getCustomerDetails', [Apicontroller::class, 'getCustomerDetails'])->name('getCustomerDetails');
Route::get('allToolType', [Apicontroller::class, 'allToolType'])->name('allToolType');



// Route::group(['middleware' => ['web']], function () {
   
// });
