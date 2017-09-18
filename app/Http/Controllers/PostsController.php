<?php

namespace App\Http\Controllers;

use App\Contracts\PostServiceInterface;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(PostServiceInterface $postService)
    {
        $query = \request('tag');

        if ($query) {
            return $postService->filterPostsByTag($query);
        }

        return Post::with('tags')->get();
    }

    public function postsWithTags()
    {
        return view('posts')->with(['posts' => Post::with('tags')->get()]);
    }
}
