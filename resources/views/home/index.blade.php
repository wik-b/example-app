@extends('layouts.home')
@section('title', 'Home')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<head>
        <title>WikConnect @yield('title')</title>
</head>
    <body>

    <div>
    @section('content')
        <div class="container mx-auto p-2">
            <h1 class="text-3xl pb-10 pt-8 font-extrabold text-blue-600 text-left ml-64">WikConnect Feed:</h1>
            <ul class='text-black dark:text-white mb-4 space-y-4'>
                @foreach($posts as $post)
                <li class="relative bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md max-w-3xl mx-auto">
                   <div class="flex justify-between items-center">
                    <a href="{{ route('user.user', $post->author_id) }}" class="text-lg text-blue-600 font-bold hover:underline">{{$post->user->name}}</a>
                    <p class="text-left text-stone-400 dark:text-gray-500 italic">{{ $post->updated_at }}</p>
                    </div> 
                    <p class="mt-2">{{$post->post}}</p>
                    @if ($post->image)
                        @if(strpos($post->image, 'http') !== false)
                            <div class="mt-4">
                                <img src="{{ $post->image }}" alt="Post Image" class="w-full rounded-lg">
                            </div>
                        @else
                            <div class="mt-4">
                                <img src="{{ asset('storage/' . $post->image)}}" alt="Post Image" class="w-full rounded-lg">
                            </div>
                        @endif
                    @endif
                    <div class="mt-4">
                        <h3 class="block text-sm font-medium">Comments:</h3>
                        <ul id="comments-{{ $post->id }}">
                            @foreach($post->comments as $comment)
                            <li class="mt-2">
                            <a href="{{ route('user.user', $comment->author_id) }}" class="text-lg text-blue-600 font-bold hover:underline">{{$comment->user->name}}</a>
                                : 
                                @can('update', $comment)
                                <a href="{{ route('comments.edit', $comment->id) }}" class="hover:underline">
                                    {{$comment->comment}}
                                </a>
                                @else
                                {{$comment->comment}}
                                @endcan
                                <p class="text-left text-stone-400 dark:text-gray-500 italic">{{ $comment->updated_at->format('F j, Y, g:i a') }}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <form id="commentForm-{{ $post->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="pt-4">
                        <textarea name="comment" class="w-full rounded-md border-gray-300 dark:border-gray-700 bg-stone-100 dark:bg-gray-700 text-black dark:text-white focus:ring-indigo-500 focus:border-indigo-500 p-2 pt-2 pb-2 indent-1" placeholder="Add a comment..."></textarea>
                        </div>
                        <div class="flex justify-between items-center">
                        <button type="submit" class="mt-4 text-white dark:text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </form>
                    @can('update', $post)
                    <div class="absolute bottom-0 right-0 pb-6 mr-4 flex space-x-2">
                        <a href="{{ route('posts.edit', $post->id) }}" class="inline-block">
                        <img src="/images/edit.png" class="h-8 pr-1" alt="Edit">
                        </a>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="inline-block">
                        <button type="submit" class="p-0 border-0 bg-transparent">
                            <img src="/images/delete.png" class="h-8" alt="Delete">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                    @endcan
                </li>
                @endforeach
            </ul>
        </div>
</div>
</body>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        @foreach($posts as $post)
        document.getElementById('commentForm-{{ $post->id }}').addEventListener('submit', function (event) {
            event.preventDefault();
            var form = this;
            var postId = form.querySelector('input[name="post_id"]').value;
            var comment = form.querySelector('textarea[name="comment"]').value;

            fetch("{{ route('comments.store', ['post_id' => $post->id]) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    post_id: postId,
                    comment: comment
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                var commentList = document.getElementById('comments-' + postId);
                var newComment = document.createElement('li');
                newComment.classList.add('mt-2');
                var updatedAt = moment(data.comment.updated_at).format('MMMM D, YYYY, h:mm A');
                newComment.innerHTML = `
                    <a href="{{ url('/user/${data.comment.author_id}') }}" class="text-lg text-blue-600 font-bold hover:underline">${data.user.name}</a>
                    : ${data.comment.comment}
                    <p class="text-left text-stone-400 dark:text-gray-500 italic">${updatedAt}</p>
                `;
                commentList.appendChild(newComment);
                form.querySelector('textarea[name="comment"]').value = '';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Something went wrong, please try again.');
            });
        });
        @endforeach
    });
</script>
</html>

@endsection