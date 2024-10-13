<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
    return view('dashboard', ['posts'=>$posts]);
})->middleware(['auth', 'verified'])->name('dashboard');

// for post
Route::resource('posts', PostController::class)->except(['create'])->middleware('auth');

// for people search
Route::middleware('auth')->group(function(){
    Route::get('/people', [UserController::class, 'people'])->name('people');
    Route::get('/people/search', [UserController::class, 'search'])->name('search');
    Route::get('/person/{person}', [UserController::class, 'person_details'])->name('person');
});

// for profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
