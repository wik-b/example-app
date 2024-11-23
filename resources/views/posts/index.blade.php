@extends('layouts.posts')]
@section('title', 'Posts')
<!doctype html>
<html lang="eng">
<script src="https://cdn.tailwindcss.com"></script>

<x-navbar />

<div class="min-h-screen bg-sky-200 dark:bg-gray-900">
    <head>
        <title>Posts @yield('title')</title>
    </head>
    <body>
    <h1>posts testing</h1>
    
    <div>
        @yield('content')
        
    </div>
    
    
    </body>
</div>
</html>

@section('title', 'Posts')

@section('content')
<a href="{{ route('posts.create')}}">Make a Post</a>

@endsection