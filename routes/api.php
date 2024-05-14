<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistaController;

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

// Artista rotas
route::get('artistas', [ArtistaController::class, 'index']);
route::get('artistaShow/{id}', [ArtistaController::class, 'show']);
route::post('artistaStore', [ArtistaController::class, 'store']);
route::delete('artistaDestroy/{id}', [ArtistaController::class, 'destroy']);
route::put('artistaUpdate/{id}', [ArtistaController::class, 'update']);