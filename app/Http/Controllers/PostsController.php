<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use App\Models\Comments;
use Auth;
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
