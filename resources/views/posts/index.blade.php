@extends('layouts.posts')

@section('title', 'Posts')

@section('content')
<a href="{{ route('posts.create')}}">Make a Post</a>

@endsection