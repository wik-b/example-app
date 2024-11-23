@extends('layouts.home')

@section('title', 'Home')

@section('content')
<a href="{{ route('posts.create')}}">Make a Post</a>
<ul>
</ul>
@endsection