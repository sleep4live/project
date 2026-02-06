<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\CollectionController as FrontendCollectionController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CollectionPageController as AdminCollectionController;

// ========== AUTH ==========
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// ========== FRONTEND ROUTES ==========
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/koleksi', [FrontendCollectionController::class, 'index'])->name('collections.index');
Route::get('/kontak', function() { 
    return redirect()->route('home') . '#map'; 
})->name('contact');

// Logout
Route::get('/logout', function () {
    session()->forget('admin');
    return redirect('/login');
})->name('logout');

// ========== ADMIN ROUTES ==========
Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('home');
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // CRUD Koleksi
    Route::get('/collections', [AdminCollectionController::class, 'index'])->name('collections.index');
    Route::get('/collections/create', [AdminCollectionController::class, 'create'])->name('collections.create');
    Route::post('/collections', [AdminCollectionController::class, 'store'])->name('collections.store');
    Route::get('/collections/{collection}/edit', [AdminCollectionController::class, 'edit'])->name('collections.edit');
    Route::put('/collections/{collection}', [AdminCollectionController::class, 'update'])->name('collections.update');
    Route::delete('/collections/{collection}', [AdminCollectionController::class, 'destroy'])->name('collections.destroy');
});