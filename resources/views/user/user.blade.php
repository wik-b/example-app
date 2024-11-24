<!doctype html>
<html lang="eng">
<script src="https://cdn.tailwindcss.com"></script>

<x-navbar />

<div class="min-h-screen bg-sky-200 dark:bg-gray-800 flex items-center justify-center">
    <head>
        <title>Profile @yield('title')</title>
    </head>
    <body>
    
    <div class="text-center">
        @yield('content')
        <div class="flex items-center justify-center space-x-4">
        <img src="/images/logoicon.png" alt="icon" class="w-16 h-16 pb-1">
        <h1 class="text-5xl pb-6 font-extrabold text-blue-600">Join us on WikConnect!</h1>
        </div>
        <p class="text-base/7 text-balance pb-6 text-black dark:text-white">WikConnect is the new cool way of sharing your thoughts, travels, and interests with the whole world. 
            Want to join? Click the button below to make your an account. 
            It's quick and simple and once you're done, you can begin sharing. Don't miss out</p>
        <a href="{{ route('user.newuser') }}" class="inline-block">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create an Account</button>
        </button>
        </a>
    </div>

    
    </body>
</div>
</html>