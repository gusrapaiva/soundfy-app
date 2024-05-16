<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicaController;

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

// Album rotas
route::get('albuns', [AlbumController::class, 'index']);
route::get('albumShow/{id}', [AlbumController::class, 'show']);
route::post('albumStore', [AlbumController::class, 'store']);
route::delete('albumDestroy/{id}', [AlbumController::class, 'destroy']);
route::put('albumUpdate/{id}', [AlbumController::class, 'update']);

// Musica rotas
route::get('musicas', [MusicaController::class, 'index']);
route::get('musicaShow/{id}', [MusicaController::class, 'show']);
route::post('musicaStore', [MusicaController::class, 'store']);
route::delete('musicaDestroy/{id}', [MusicaController::class, 'destroy']);
route::put('musicaUpdate/{id}', [MusicaController::class, 'update']);