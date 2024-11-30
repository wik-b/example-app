@extends ('layouts.home')
@section('title', 'User Profile')
<!doctype html>
<html lang="eng">
<script src="https://cdn.tailwindcss.com"></script>

@section('content')
<div class="min-h-screen flex flex-col items-center py-12">
        <h1 class="text-5xl pb-10 pt-4 font-extrabold text-blue-600 text-center">
            {{ $user->name }}'s Profile
        </h1>

        <div class ="mt-8 text-center items-center">
            <h2 class="text-xl indent-2 font-semibold text-left text-black dark:text-white mb-4">{{$user->name}}'s Posts:</h2>
            <ul class="list-none">
            @foreach ($posts as $post)
            <li class="bg-gray-100 dark:bg-gray-900 text-left p-4 rounded-lg shadow-md mb-4 max-w-3xl mx-auto">
                <div class="flex justify-between items-center">
                    <p class="text-lg text-blue-600 font-bold pt-2">{{$user->name}}</p>
                    <p class="text-stone-400 dark:text-gray-500 italic items-baseline">{{ $post->updated_at }}</p>
                </div>
                <p class="mt-2 leading-relaxed">{{$post->post}}</p>
                @if ($post->image)
                <div class="mt-4">
                    <img src="{{$post->image}}" alt="Post Image" class="w-full rounded-lg">
                </div>
                @endif
                @if ($post->comments->isNotEmpty())
                <h3 class="block text-sm font-medium py-4 indent-1">Comments:</h3>
                @endif
                @foreach($post->comments as $comment)
                <div class="bg-white dark:bg-gray-800 text-left p-4 rounded-lg shadow-md mb-4 max-w-3xl mx-auto">
                <p class="text-lg text-blue-600 font-bold">{{$comment->user->name}}</p>
                <p class="text-stone-400 dark:text-gray-500 italic">{{ $comment->updated_at }}</p>
                <p class="mt-2">{{$comment->comment}}</p>  
                </div>
                @endforeach        
            @endforeach
    </li>
    </ul>

    <h2 class="text-xl indent-2 font-semibold text-left text-black dark:text-white mb-4 mt-8">{{$user->name}}'s Comments:</h2>
    <ul class="list-none">
        @foreach ($comments as $comment)
        <li class="bg-gray-100 dark:bg-gray-900 text-left p-4 rounded-lg shadow-md mb-4 max-w-3xl mx-auto">
            <div class="flex items-baseline">
                <p class="text-lg text-blue-600 font-bold">{{$comment->user->name}}</p>
                <p class="ml-2 text-sm text-gray-600 dark:text-gray-500 italic">commented</p>
            </div>
                <p class="text-stone-400 dark:text-gray-500 italic baseline">{{ $comment->updated_at }}</p>
                <p class="mt-2 leading-relaxed">{{$comment->comment}}</p>  
                <p class="text-stone-400 dark:text-gray-500 font-semibold italic">On {{ $comment->post->user->name }}'s Post</p>
                <p class="text-stone-400 dark:text-gray-500 italic">{{ $comment->post->post }}</p>
        </li>
        @endforeach
    </ul>
</div>
</div>
@endsection