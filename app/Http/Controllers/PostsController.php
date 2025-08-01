<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use App\Models\Comments;
use App\Notifications\NewComment;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostsController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::with('user')->get()->sortByDesc('created_at');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Posts::create([
            'author_id' => auth()->id(),
            'post' => $request->post,
            'image' => $imagePath,
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

        $comment = Comments::create([
            'post_id' => $postId,
            'author_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return response()->json([
            'comment' => $comment,
            'user' => auth()->user(),
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Posts $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function editComment(Comments $comment)
    {
        $this->authorize('update', $comment);
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $post)
    {
       $this->authorize('update', $post);

       $request->validate([
           'post' => 'required|max:500',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
       ]);

       $post->update($request->only('post', 'image'));

       return redirect()->route('home.index')->with('success', 'Post updated!');
    }

    public function updateComment(Request $request, Comments $comment)
    {
       $this->authorize('update', $comment);

       $request->validate([
           'comment' => 'required|max:200',
       ]);

       $comment->update($request->only('comment'));

       return redirect()->route('home.index')->with('success', 'Comment updated!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        $this->authorize('delete', $post);
        $post->comments()->delete();
        $post->delete();

        return redirect()->route('home.index')->with('success', 'Post deleted!');
    }

    public function destroyComment(Comments $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();

        return redirect()->route('home.index')->with('success', 'Commented deleted!');
    }
}   
