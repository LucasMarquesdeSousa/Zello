<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

//usuario comun
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [UserController::class, 'index'])->name('home');
    Route::get('/cadastrarAplicativo', [UserController::class, 'cadApp'] );
    Route::post('/home/editar', [UserController::class, 'editarUsuario']);
    Route::get('/home/excluir', [UserController::class, 'excluirusuario']);
});

//gestor
Route::middleware(['auth', 'gestor'])->group((function(){
    Route::get('/gestor', [UserController::class , 'gestor']);
}));

//administrador
Route::middleware(['auth', 'admin'])->group((function(){
    Route::get('/admin', [UserController::class , 'admin']);
    Route::post('/registraUser', [UserController::class, 'cadusuario']);
    Route::get('/ed', [UserController::class, 'getUser']);
    Route::post('/edUser', [UserController::class, 'editaUsuarioQualquer']);
}));
