<?php

use App\Http\Controllers\publicationController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index'); });
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::get('/publications', [PublicationController::class, 'index']);
Route::get('/publications/{id}', [PublicationController::class, 'show']);
Route::get('/domain/{id}', [DomainController::class, 'index']);
Route::get('/addPublication/{id}', [PublicationController::class, 'create']);
Route::post('/publications/{id}', [PublicationController::class, 'store']);
Route::get('/download/{file}',[PublicationController::class,'download']);
Route::get('/view/{file}',[PublicationController::class,'view']);





