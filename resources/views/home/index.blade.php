@extends('layouts.home')
@section('title', 'Home')
<!doctype html>
<html lang="eng">
<script src="https://cdn.tailwindcss.com"></script>

<head>
        <title>WikConnect @yield('title')</title>
</head>
    <body>

    <div>
    @section('content')
        <div class="container mx-auto p-2">
            <h1 class="text-5xl pb-10 pt-8 font-extrabold text-blue-600 text-center">Welcome to the Feed!</h1>
            <ul class='text-black dark:text-white mb-4 space-y-4'>
                @foreach($posts as $post)
                <li class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md max-w-3xl mx-auto">
                   <div class="flex justify-between items-center ">
                <strong class="text-lg text-blue-600">{{$post->user->name}} </strong> 
                <p class="text-left text-stone-300">{{ $post->updated_at }}</p>
                    </div> 
                    <p class="mt-2">{{$post->post}}</p>
                    @if ($post->image)
                    <div class="mt-4">
                        <img src="{{$post->image}}" alt="Post Image" class="w-full rounded-lg">
                    </div>
                    @endif
                    <div class="mt-4">
                        <h3 class="block text-sm font-medium">Comments:</h3>
                        <ul>
                            @foreach($post->comments as $comment)
                            <li class="mt-2">
                                <strong>{{$comment->user->name}}</strong>: {{$comment->comment}}
                                <p class="text-left text-stone-300">{{ $comment->updated_at }}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <form method="POST" action="{{ route('comments.store', $post->id)}}" class="mt-4">
                        @csrf
                        <textarea name="comment" class="w-full rounded-md border-gray-300 dark:border-gray-700 bg-stone-100 dark:bg-gray-900 text-black dark:text-white focus:ring-indigo-500 focus:border-indigo-500 p-2 pt-2 indent-1" placeholder="Add a comment..."></textarea>
                        <button type="submit" class="mt-2 text-white dark:text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
</div>
    </body>
</div>
</html>

@endsection