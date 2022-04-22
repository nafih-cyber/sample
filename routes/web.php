<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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

Route::get('/projects', [ProjectController::class, 'index']);
Route::post('addProject', [ProjectController::class, 'AddProject']);
Route::post('addTask', [TaskController::class, 'AddTask']);
Route::post('addTime', [TaskController::class, 'addTime']);
Route::get('/taskproject', [TaskController::class, 'taskproject']);
Route::post('search', [ProjectController::class, 'search']);





