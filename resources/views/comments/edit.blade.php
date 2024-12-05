@extends('layouts.home')

@section('title', 'Edit Comment')

@section('content')
<div class="min-h-screen flex flex-col items-center py-12">
    <h1 class="text-5xl pb-10 pt-4 font-extrabold text-blue-600 text-center">Edit Comment</h1>

    <div class="w-full max-w-3xl bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md flex flex-col justify-between">
        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
            @csrf
            @method('PATCH')

            <div class="mb-4 flex-grow">
                <label for="comment" class="block text-sm text-black dark:text-white font-extrabold mb-2">Comment: </label>
                <textarea id="comment" name="comment" class="block w-full h-20 rounded-md border-gray-300 dark:border-gray-700 bg-stone-200 dark:bg-gray-700 text-black dark:text-white focus:ring-indigo-500 focus:border-indigo-500 p-2 pt-2 pb-2">{{ old('comment', $comment->comment) }}</textarea>
            </div>
            <ul>
                 @foreach ($errors->all() as $error)
                <li class="text-red-600 pb-4">{{ $error }}</l>
                @endforeach
            </ul>
            <div class="flex justify-between items-center mt-auto">
                <a href="{{ route('home.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Cancel</a>
                <button type="submit" class="text-black dark:text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection