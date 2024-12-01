<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use App\Models\Comments;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::with('user')->get();
        return view("home.index", compact('posts'));
    }

    public function showUserPosts()
    {
        $user = Auth::user();
        $posts = Posts::where('author_id', $user->id)->get();
        return view('dashboard', compact('posts'));
    }

    public function showAllUserPosts($id)
    {
        $user = User::findOrFail($id);
        $posts = Posts::where('author_id', $user->id)->with('comments.user')->get();
        $comments = Comments::where('author_id', $user->id)->with('post.user')->get();
        return view('user.user', compact('user', 'posts', 'comments'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post' => 'required|max:500',
            'image' => 'nullable|url',
        ]);

        Posts::create([
            'author_id' => auth()->id(),
            'post' => $request->post,
            'image' => $request['image'],
        ]);
        return redirect()->route('home.index')->with('success', 'Thank you for posting!');
    }   

    
    public function storeComment(Request $request, $postId)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
    
        $request->validate([
            'comment' => 'required|max:200',
        ]);

        Comments::create([
            'post_id' => $postId,
            'author_id' => auth()->id(),
            'comment' => $request->comment,
        ]);
        return redirect()->route('home.index')->with('success', 'Thank you for commenting!');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $post)
    {
        if (Gate::denies('update-post', $post)) {
            return redirect()->route('home.index')->with('error', 'You are not authorized to edit this post');
        }
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $post)
    {
       if (Gate::denies('update.post', $post)) {
           return redirect()->route('home.index')->with('error', 'You are not authorized to edit this post');
       }

       $request->validate([
           'post' => 'required|max:500',
           'image' => 'nullable|url',
       ]);

       $post->update($request->only('post', 'image'));

       return redirect()->route('home.index')->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        if (Gate::denies('delete.post', $post)) {
            return redirect()->route('home.index')->with('error', 'You are not authorized to delete this post');
        }

        return redirect()->route('home.index')->with('success', 'Post deleted!');
    }
}
