<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $UsersFromDB = User::all();
        $UserFromDB = User::find(Auth::id());
//        @dd($UserFromDB->name);
        return view('profile', ['email' => (request()->user()->email),'username'=>$UserFromDB->name, 'ProfilePosts' => $ProfilePostFromDB]);
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
        $singlePostFromDB->comments = request()->comment;
        $singlePostFromDB->update([
            'description' => $description,
            'user_email' => request()->user()->email,
            'comments' => request()->comment
        ]);


        $ProfilePostFromDB = Post::where('email', request()->user()->email)->get();
        return view('profile', ['email' => (request()->user()->email), 'ProfilePosts' => $ProfilePostFromDB]);
    }

    public function Like($postId)
    {
        $post = Post::find($postId);
        $post->likes = ($post->likes) + 1;
        $post->update(['likes' => $post->likes]);
//        @dd($post->likes);
        return to_route('profile.index');
    }

    public function comment(Post $post)
    {
        $users = User::all();
        return view('posts.comment', ['users' => $users, 'post' => $post]);

    }

}

