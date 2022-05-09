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
    return view('auth.login');
});

Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/employee/add', [App\Http\Controllers\EmployeeController::class, 'add'])->name('employee.add');
Route::post('/employee/insert', [App\Http\Controllers\EmployeeController::class, 'insert'])->name('employee.insert');
Route::get('/employee/view/{id}', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee.view');
Route::get('/employee/edit/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employee.edit');
Route::post('/employee/update/{id}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employee.update');
Route::get('/employee/delete/{id}', [App\Http\Controllers\EmployeeController::class, 'delete'])->name('employee.delete');
Route::post('/employee/import/', [App\Http\Controllers\EmployeeController::class, 'import'])->name('employee.import');
Route::get('/employee/export/', [App\Http\Controllers\EmployeeController::class, 'export'])->name('employee.export');



Route::get('/user/detail/', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/user/password/', [App\Http\Controllers\UserController::class, 'changePassword'])->name('user.password');
Route::post('/user/password/update/{id}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.updatePassword');








// Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');

// admin login
// Route::get('/admin', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('admin_login_view');
