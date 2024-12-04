@extends ('layouts.home')
<script src="https://cdn.tailwindcss.com"></script>
<!doctype html>
<html lang="eng">
@section('title', 'Dashboard')
@section('content')

<div class="flex flex-col items-center py-12">
        <h1 class="text-5xl pt-4 font-extrabold text-blue-600 text-center items-end">
            {{ __('Welcome to your Profile') }}
        </h1>
        <p class="text-center py-4">Here you can view your posts and comments, and make changes to your account.</p>
    <div class="w-full">
        <div class="justify-between">
        <div class ="mt-8 text-center items-center">
            <h2 class="text-3xl font-bold text-black dark:text-white mb-4 text-left indent-2 max-w-3xl mx-auto">Your Posts</h2>
        </div>
        
            @foreach ($posts as $post)
            <div class="bg-white dark:bg-gray-900 text-left p-6 rounded-lg shadow-md mb-4 max-w-3xl mx-auto">
                <p class="text-lg text-blue-600 font-bold">{{$post->user->name}}</p>
                <p class="text-stone-300 dark:text-gray-500 italic">{{ $post->updated_at }}</p>
                <p class="mt-2">{{$post->post}}</p>
                @if ($post->image)
                <div class="mt-4">
                    <img src="{{$post->image}}" alt="Post Image" class="w-full rounded-lg">
                </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
</div>
</html>
@endsection