@extends('layouts.app')

@section('title', 'Make a Post')

@section('content')
    <form method="POST" action="{{ route('posts.store')}}">
        @csrf
        <p class='text-black dark:text-white'>Name: <input type="text" name="name"></p>
        <p class='text-black dark:text-white'>Post: <input type="text" name="post"></p>
        <p class='text-black dark:text-white'>Id: <input type="text" name="id"></p>
        <input class='text-black dark:text-white' type="submit" value="Submit">
        <a href="{{ route('posts.index') }}" class='text-black dark:text-white'>Cancel</a>
    </form>

@endsection