<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return Post::with('tags')->get();
    }

    public function postsWithTags()
    {
        return view('posts')->with(['posts' => Post::with('tags')->get()]);
    }
}
