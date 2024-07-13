<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ProfilePostFromDB = Post::where('email', request()->user()->email)->get(); //collection object
        return view('profile', ['email' => (request()->user()->email), 'ProfilePosts' => $ProfilePostFromDB]);
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }

    public function update($postId)
    {
        $description = request()->description;
        $singlePostFromDB = Post::find($postId);
        $singlePostFromDB->update([
            'description' => $description,
            'user_email' => request()->user()->email,
        ]);

        $ProfilePostFromDB = Post::where('email', request()->user()->email)->get();
        return view('profile', ['email' => (request()->user()->email), 'ProfilePosts' => $ProfilePostFromDB]);
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post->delete();
        Post::where('id', $postId)->delete();
        return to_route('home', $postId);
    }
}

