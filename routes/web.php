<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\TableOfContents\Normalizer\AsIsNormalizerStrategy;
use Illuminate\Support\Facades\Auth;


Route::get('/', [PostsController::class, 'index'])->name('posts.index');

Route::get('/user', function () {
    return view('user.user');
});
Route::get('/user/newuser', [PostsController::class, 'newuser'])->name('user.newuser');
Route::post('/user', [PostsController::class, 'store'])->name('user.store');
Route::get('/user/{author_id}', [PostsController::class, 'show'])->name('user.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts/{author_id}', [PostsController::class, 'show'])->name('posts.show');
});


require __DIR__.'/auth.php';



