<!doctype html>
<html lang="eng">
<script src="https://cdn.tailwindcss.com"></script>

<x-navbar />

<div class="min-h-screen bg-sky-200 dark:bg-gray-800">
<div class='text-black dark:text-white'>

    <head>
        <title>WikConnect @yield('title')</title>
    </head>
    <body>
        @yield('content')
    </body>
</div>
</div>
</html>