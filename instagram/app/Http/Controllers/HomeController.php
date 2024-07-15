<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\LoginController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * @return Renderable
     */
    public function index(Post $post)
    {
        $postsFromDB = Post::all();
        $usersFromDB = User::all();
        $splitUser = preg_split("/ /",(Auth::user()->name),-1,PREG_SPLIT_NO_EMPTY);
        return view('home',['email'=> request()->user()->email,'username'=> $splitUser[0],
            'posts' => $postsFromDB,'users' => $usersFromDB]);
    }

    public function store()
    {
        $data = request()->all();
        $UserFromDB = User::find(Auth::id());
        $description = request()->description;
        Post::create([
            'description' => $description,
            'email' => (request()->user()->email),
            'name' => $UserFromDB->name
        ]);
        return to_route('home.index');
    }


    public function show()
    {
    }
}
