@extends('layouts.home')]
@section('title', 'Home')
<!doctype html>
<html lang="eng">
<script src="https://cdn.tailwindcss.com"></script>

<x-navbar />

<div class="min-h-screen bg-sky-200 dark:bg-gray-800 flex items-center justify-center pt-20">
    <head>
        <title>WikConnect @yield('title')</title>
</head>
    <body>

    <div>
    @section('content')
        <div class="container mx-auto p-4">
            <h1 class="text-5xl pb-10 font-extrabold text-blue-600">Welcome to the Feed!</h1>
            <ul class='text-black dark:text-white mb-4 space-y-4'>
                @foreach($posts as $post)
                <li class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md">
                    <strong class="text-lg text-blue-600">{{$post->user->name}}</strong>
                    <p class="mt-2">{{$post->post}}</p>
                    @if ($post->image)
                    <div class="mt-4">
                        <img src="{{$post->image}}" alt="Post Image" class="w-full rounded-lg">
                    </div>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
</div>
    </body>
</div>
</html>


@section('content')

@endsection