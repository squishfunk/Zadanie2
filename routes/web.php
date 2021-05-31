<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

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
    return view('welcome');
});

Route::put('/{id}', [ProjectsController::class, "update"]);

Route::get('/projekty', [ProjectsController::class, "index"]);

Route::get('/projekty/create', [ProjectsController::class, "create"]);

Route::post('/projekty', [ProjectsController::class, "store"]);

Route::get('/{id}/edit', [ProjectsController::class, "edit"]);

Route::get('/{id}/destroy', [ProjectsController::class, "destroy"])->name('project.destroy');
