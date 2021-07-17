<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add_roles', [App\Http\Controllers\HomeController::class, 'add_roles'])->name('add_roles');
Route::get('/add_permissions', [App\Http\Controllers\HomeController::class, 'add_permissions'])->name('add_permissions');
Route::get('/assign_role', [App\Http\Controllers\HomeController::class, 'assign_role'])->name('assign_role');
Route::get('/assign_permission', [App\Http\Controllers\HomeController::class, 'assign_permission'])->name('assign_permission');
Route::get('/role_permission', [App\Http\Controllers\HomeController::class, 'role_permission'])->name('role_permission');
Route::get('/user_permission', [App\Http\Controllers\HomeController::class, 'user_permission'])->name('user_permission');
Route::get('/other_assign_role', [App\Http\Controllers\HomeController::class, 'other_assign_role'])->name('other_assign_role');
Route::get('/hasPermissionTo', [App\Http\Controllers\HomeController::class, 'hasPermissionTo'])->name('hasPermissionTo');
