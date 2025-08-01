<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationsController;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\TableOfContents\Normalizer\AsIsNormalizerStrategy;
use Illuminate\Support\Facades\Auth;


Route::get('/', [PostsController::class, 'index'])->name('home.index');

Route::get('/user', function () {
    return view('user.user');
});
Route::get('/user/newuser', [PostsController::class, 'newuser'])->name('user.newuser');
Route::post('/user', [PostsController::class, 'store'])->name('user.store');
Route::get('/user/{author_id}', [PostsController::class, 'show'])->name('user.show');
Route::get('/user/{id}/posts', [PostsController::class, 'showAllUserPosts'])->name('user.user');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PostsController::class, 'showUserPosts'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts/{author_id}', [PostsController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
    Route::get('/comments/{comment}/edit', [PostsController::class, 'editComment'])->name('comments.edit');
    Route::patch('/comments/{comment}', [PostsController::class, 'updateComment'])->name('comments.update');
    Route::delete('/comments/{comment}', [PostsController::class, 'destroyComment'])->name('comments.destroy');
});

Route::post('/posts/{post_id}/comments', [PostsController::class, 'storeComment'])->name('comments.store');


require __DIR__.'/auth.php';



