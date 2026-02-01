<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\AuthController;

// ========== AUTH ==========
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// ========== FRONTEND ROUTES ==========
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/koleksi', [PageController::class, 'collections'])->name('collections.index');
Route::get('/koleksi/{id}', [PageController::class, 'collectionDetail'])->name('collections.show');
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');

Route::get('/logout', function () {
    session()->forget('admin');
    return redirect('/login');
})->name('logout');

// ========== ADMIN  ==========
Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/', function () {
        if (!session('admin')) {
            return redirect('/login');
        }
        return view('admin.dashboard');
    })->name('home');
    
    Route::get('/dashboard', function () {
        if (!session('admin')) {
            return redirect('/login');
        }
        return view('admin.dashboard');
    })->name('dashboard');
    
    //  CRUD
    Route::get('/collections', [CollectionController::class, 'index'])
        ->name('collections.index');
    
    Route::get('/collections/create', [CollectionController::class, 'create'])
        ->name('collections.create');
    
    Route::post('/collections', [CollectionController::class, 'store'])
        ->name('collections.store');
    
    Route::get('/collections/{collection}/edit', [CollectionController::class, 'edit'])
        ->name('collections.edit');
    
    Route::put('/collections/{collection}', [CollectionController::class, 'update'])
        ->name('collections.update');

   
    Route::delete('/collections/{collection}', [CollectionController::class, 'destroy'])
        ->name('collections.destroy');
});


Route::get('/tes-admin', function () {
    return 'ROUTE ADMIN KEDETECT';
});