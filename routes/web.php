<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CircleController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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


Route::middleware(['auth', 'verified' ])->group(function () {

Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');
// Route::get('/dashboard/allusers', [UserController::class,'index'])->name('All-users');
// Route::get('/dashboard/create', [UserController::class,'create'])->name('create');

/**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', [UserController::class,'index'])->name('users.index');
            Route::get('/create', [UserController::class,'create'])->name('users.create');
            Route::post('/create', [UserController::class,'store'])->name('users.store');
            Route::get('/{id}/show',[UserController::class,'show'])->name('users.show');
            Route::get('/{user}/edit',[UserController::class,'edit'])->name('users.edit');
            Route::patch('/{user}/update', [UserController::class,'update'])->name('users.update');
            Route::delete('/{user}/delete', [UserController::class,'destroy'])->name('users.destroy');
        });

        Route::resource('roles',RolesController::class);
        Route::resource('permissions',PermissionsController::class);

        Route::resource('circle',CircleController::class);
        Route::resource('court',CourtController::class);

});








// Route::get('/dashboard/allusers', function () {
//     return view('users.index');
// })->middleware(['auth', 'verified'])->name('All_users');

require __DIR__.'/auth.php';
