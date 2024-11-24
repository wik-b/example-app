@extends('layouts.posts')]
@section('title', 'Posts')
<!doctype html>
<html lang="eng">
<script src="https://cdn.tailwindcss.com"></script>

<x-navbar />

<div class="min-h-screen bg-sky-200 dark:bg-gray-800">
    <head>
        <title>WikConnect @yield('title')</title>
    @section('title', 'Posts')
</head>
    <body>

    <div>
    @section('content')
        <div class="container">
            <h1>Welcome to the Feed!</h1>
            <ul>
                @foreach($posts as $post)
                <li>
                    <strong>{{$post->name}}</strong>: {{$post->post}}
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