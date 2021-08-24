<?php

use App\Http\Controllers\API\ClassroomController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\ThemeController;
use App\Http\Controllers\API\UserController;
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
Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth:api'])->group(function () { 
 
    // Lista usarios
    Route::get('user', [UserController::class, 'index']);

    // Lista usuario solicitado
    Route::get('user/{id}', [UserController::class, 'show']);

    // Cria novo usuário
    Route::post('user', [UserController::class, 'store']);

    // Edita usuário
    Route::put('user/{id}', [UserController::class, 'update']);

    // Deleta usuário
    Route::delete('user/{id}', [UserController::class,'destroy']);

    //--------------Themes
    // Lista Themes
    Route::get('theme', [ThemeController::class, 'index']);

    // Lista Themes solicitado
    Route::get('theme/{id}', [ThemeController::class, 'show']);
    
    // Cria novo Themes
    Route::post('theme', [ThemeController::class, 'store']);
    
    // Edita Themes
    Route::put('theme/{id}', [ThemeController::class, 'update']);
    
    // Deleta Themes
    Route::delete('theme/{id}', [ThemeController::class,'destroy']);
    
    //--------------Classrooms
    
    // Lista classrooms
    Route::get('classrooms', [ClassroomController::class, 'index']);

    // Lista classrooms solicitado
    Route::get('classrooms/{id}', [ClassroomController::class, 'show']);

    // Cria novo classrooms
    Route::post('classrooms', [ClassroomController::class, 'store']);

    // Edita classrooms
    Route::put('classrooms/{id}', [ClassroomController::class, 'update']);

    // Deleta classrooms
    Route::delete('classrooms/{id}', [ClassroomController::class,'destroy']);
});



