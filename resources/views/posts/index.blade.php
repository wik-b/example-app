@extends('layouts.posts')]
@section('title', 'Posts')
<!doctype html>
<html lang="eng">
<script src="https://cdn.tailwindcss.com"></script>

<x-navbar />

<div class="min-h-screen bg-sky-200 dark:bg-gray-800 flex items-center justify-center">
    <head>
        <title>WikConnect @yield('title')</title>
</head>
    <body>

    <div>
    @section('content')
        <div class="container">
            <h1 class="text-5xl pb-6 font-extrabold text-blue-600">Welcome to the Feed!</h1>
            <ul class='text-black dark:text-white mb-4'>
                @foreach($posts as $post)
                <li>
                    <strong>{{$post->user->name}}</strong>: {{$post->post}}
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