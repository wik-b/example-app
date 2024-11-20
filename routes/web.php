<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {return view('welcome');});
Route::get('/posts', function () {return view ('posts.posts');});

Route::get('/posts', [PostsController::class, 'index']);
Route::get('/', [HomeController::class,'index']);
