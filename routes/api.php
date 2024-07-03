<?php
use App\Http\Controllers\ApiAuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('registration', [ApiAuthManager::class,'store']);
Route::post('login', [ApiAuthManager::class,'login']);

Route::group([
"middleware"=>['auth:sanctum']
],function ()  {
    Route::get("profile",[ApiAuthManager::class,"profile"]);

    Route::get("logout",[ApiAuthManager::class,"logout"]);
});
