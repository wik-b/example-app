@extends('layouts.app')

@section('title', 'Make a Post')


<div class="min-h-screen bg-sky-200 dark:bg-gray-800 flex items-center justify-center pt-16">
@section('content')

<div class="flex flex-col items-center mt-16 sm:mt-20 pb-8">
    <form method="POST" action="{{ route('posts.store')}}" class="w-full max-w-lg bg-sky-200 dark:bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf
        <p class='text-black dark:text-white mb-4'>
        <label for="post" class="block text-sm font-medium">Post:</label>
        <textarea name="post" id="post" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-black dark:text-white focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        </p>
        @if ($errors->any())
        <div class="text-black dark:text-white pb-4 rounded mb-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="flex justify-between items-center w-full">
        <a href="{{ route('home.index') }}" class='text-black dark:text-white'>Cancel</a>
        <input class='text-black dark:text-white' type="submit" value="Submit">
        
    </div>
</form>
</div>
</div>
@endsection