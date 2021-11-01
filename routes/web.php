<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::put('complete-task/{id}', [TaskController::class, 'completeTask'])->name('complete-task');
Route::put('uncomplete-task/{id}', [TaskController::class, 'uncompleteTask'])->name('uncomplete-task');
Route::resource('task', TaskController::class);

Auth::routes();
