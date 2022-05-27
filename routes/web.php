<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\IndexController;
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

// admin:admin -> adalah merupakan middleware
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

// kata admin setelah sacntum adalah nama guard
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth:admin');


Route::middleware(['auth:admin'])->group(function(){
    // ADMIN ALL ROUTES
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

// profile
    Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');

    Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');

    Route::post('/admin/profile/store', [AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');

// password
    Route::get('/admin/change/password', [AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');

    Route::post('/admin/update/password', [AdminProfileController::class, 'adminUpdatePassword'])->name('admin.update.password');


// ADMIN CATEGORY ALL  ROUTES
    Route::prefix('category')->group(function () {
        Route::get('/view', [CategoryController::class, 'categoryView'])->name('all.category');

        Route::post('/store', [CategoryController::class, 'categoryStore'])->name('category.store');

        Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');

        Route::post('/update', [CategoryController::class, 'categoryUpdate'])->name('category.update');
});

// ADMIN BOOK ALL  ROUTES
    Route::prefix('book')->group(function () {
        Route::get('/add', [BookController::class, 'bookAdd'])->name('book.add');

        Route::post('/store', [BookController::class, 'bookStore'])->name('book.store');

        Route::get('/manage', [BookController::class, 'bookManage'])->name('book.manage');

        Route::get('/edit/{id}', [BookController::class, 'bookEdit'])->name('book.edit');

        Route::post('/update', [BookController::class, 'bookUpdate'])->name('book.update');

        Route::get('/inactive/{id}', [BookController::class, 'bookInactive'])->name('book.inactive');
        Route::get('/active/{id}', [BookController::class, 'bookActive'])->name('book.active');

        Route::get('/delete/{id}', [BookController::class, 'bookDelete'])->name('book.delete');

    });
});



// kata web setelah sacntum adalah nama guard
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// USER ALL ROUTES
Route::get('/', [IndexController::class, 'index']);

