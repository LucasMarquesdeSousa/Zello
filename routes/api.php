<?php

use App\Http\Controllers\Api\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\userController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('admin', function(){
    return User::all();
});
Route::post('cadastrar', [userController::class, 'store']);
Route::post('login', [AuthController::class, 'login']);


route::get('usu', [userController::class, 'index']);

Route::middleware('auth:api')->get('gestor', function(Request $request){
    return $request->user();
});
