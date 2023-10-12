<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::post('/login/custom', [App\Http\Controllers\LoginController::class, 'login'])->name('login.custom');

Route::get('/admin/index', [App\Http\Controllers\AdminController::class, 'indexAdmin'])->name('admin.index');
Route::get('/admin/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
Route::patch('/admin/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
Route::get('/admin/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
Route::delete('/admin/delete', [App\Http\Controllers\AdminController::class, 'delete'])->name('admin.delete');

Route::get('/user/index', [App\Http\Controllers\UserController::class, 'indexUser'])->name('user.index');
Route::post('/user/index/getStudentTableIndex', [App\Http\Controllers\UserController::class, 'getStudentTableIndex']);
Route::get('/user/edit', [App\Http\Controllers\UserController::class, 'editUser'])->name('user.editStudent');
Route::post('/user/edit/getStudentTableIndex2', [App\Http\Controllers\UserController::class, 'getStudentTableIndex2']);
Route::get('/user/edit/{ic}', [App\Http\Controllers\UserController::class, 'editForm'])->name('user.editForm');
Route::post('/user/edit/update', [App\Http\Controllers\UserController::class, 'updateUser'])->name('user.update');
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'createUser'])->name('user.create');
Route::post('/user/create/search', [App\Http\Controllers\UserController::class, 'createSearch'])->name('user.create.search');
Route::post('/user/store', [App\Http\Controllers\UserController::class, 'storeUser'])->name('user.storeStudent');
Route::get('/user/spm/{ic}', [App\Http\Controllers\UserController::class, 'spmIndex'])->name('user.spm');
Route::post('/user/spm/{ic}/store', [App\Http\Controllers\UserController::class, 'spmStore'])->name('user.spm.store');
Route::delete('/user/delete', [App\Http\Controllers\PendaftarController::class, 'delete'])->name('pendaftar.delete');


Route::get("/logout/custom",[App\Http\Controllers\LogoutController::class,"logout"])->name('custom_logout');