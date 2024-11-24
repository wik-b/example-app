<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\UsersInfo;
use Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $posts = Posts::all();
      return view("posts.index", compact('posts'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'post' => 'required|max:500',
        ]);
        if (Auth::check()) {
        Posts::create([
            'author_id' => Auth::id(),
            'name' => $request->name,
            'post' => $request->post,
            
        ]);
        return redirect()->route('posts.index')->with('success', 'Thank you for posting!');
    } else {
        return redirect()->route('login')->with('error', 'You must be logged in to create a post.');
    }   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Posts::findOrFail($id);
        return view('posts.show', ['posts' => $posts]);
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
