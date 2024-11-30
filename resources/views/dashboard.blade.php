@extends ('layouts.home')
@section('content')


<div class="min-h-screen flex flex-col items-center py-12">
        <h1 class="text-5xl pb-10 pt-4 font-extrabold text-blue-600 text-center items-end">
            {{ __('Profile') }}
        </h1>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('home.index') }}" class="inline-block">
                <button type="button" class="text-white items-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 pl-4">Return to Feed</button>
                </button>
                </a>
            </div>
        </div>
        <div class ="mt-8 text-center items-center">
            <h2 class="text-3xl font-bold text-black dark:text-white mb-4">Your Posts</h2>
            @foreach ($posts as $post)
            <div class="bg-white dark:bg-gray-900 text-left p-6 rounded-lg shadow-md mb-4 max-w-3xl mx auto">
                <p class="text-lg text-blue-600 font-bold">{{$post->user->name}}</p>
                <p class="text-stone-300 italic">{{ $post->updated_at }}</p>
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
@endsection