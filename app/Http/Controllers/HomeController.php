<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        //   Local Scope
        // $posts = Post::today()->get();
        // return view('home')->with('posts',$posts);

        //Dynamic scope

        // $posts = Post::status(0)->get();
        return view('post.index')->with('posts',$posts);





    }
}
