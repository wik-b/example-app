@extends('layouts.home')

@section('title', 'Post')

@section('content')

<div class="flex flex-col items-center mt-16 sm:mt-20 pb-8">
<h3 class="text-2xl pb-2 font-extrabold text-blue-600 text-center">Got something on your mind?</h3>
<p class="text-center pb-10">Share your thoughts with your feed and connect with others</p>
    <form method="POST" action="{{ route('posts.store')}}" enctype="multipart/form-data" class="w-full max-w-3xl min-h-[300px] bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md flex flex-col justify-between">
        @csrf
        <p class='text-black dark:text-white mb-2'>
        <label for="post" class="block text-sm font-extrabold">Post:</label>
        <textarea name="post" id="post" class="mt-1 indent-2 pt-1 block w-full h-20 pb-4 rounded-md border-gray-300 dark:border-gray-700 bg-stone-200 dark:bg-gray-700 text-black dark:text-white focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        </p>
        <p class="text-black dark:text-white mb-4">
            <label for="image" class="block text-sm font-extrabold mb-2">Image (optional):</label>
            <input type="file" name="image" id="image" class="w-full rounded-md border-gray-300 dark:border-gray-700 bg-stone-200 dark:bg-gray-700 text-black dark:text-white focus:ring-indigo-500 focus:border-indigo-500 p-2">
        </p>
        @if ($errors->any())
        <div class="text-black dark:text-white pb-4 rounded mb-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="text-red-600">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="flex justify-between items-center w-full">
        <a href="{{ route('home.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Cancel</a>
        <input class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit" value="Submit">
        
    </div>
</form>
</div>
</div>
@endsection