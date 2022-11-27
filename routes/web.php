<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;

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

Route::get('/', [HomeController::class, 'login'])->name('login');
Route::get('/signup', [HomeController::class, 'register'])->name('register');

Route::post('/signup', [UserController::class, 'registerUser'])->name('registerUser');
Route::post('/login', [UserController::class, 'loginUser'])->name('loginUser');
Route::get('/logout', [UserController::class, 'logoutUser'])->name('logout');

Route::get('/dashboard', [TodoController::class, 'dashboard'])->name('dashboard')->middleware(['auth']);
Route::post('/addtodo', [TodoController::class, 'addTodo'])->name('addTodo');
Route::get('/delete/{id}', [TodoController::class, 'deleteTodo']);
Route::get('/edit/{id}', [TodoController::class, 'edit']);
Route::post('/edittodo', [TodoController::class, 'editTodo'])->name('editTodo');

