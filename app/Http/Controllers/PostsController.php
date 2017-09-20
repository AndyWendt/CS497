<?php

namespace App\Http\Controllers;

use App\Contracts\PostServiceInterface;
use App\Post;
use Illuminate\View\View;

class PostsController extends Controller
{
    /**
     * @param PostServiceInterface $postService
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(PostServiceInterface $postService)
    {
        $query = \request('tag');

        if ($query) {
            return $postService->filterPostsByTag($query);
        }

        return Post::with('tags')->get();
    }

    /**
     * @param string $tag
     * @return View
     */
    public function postsWithTags()
    {
        return view('posts')->with(['posts' => Post::with('tags')->get()]);
    }
}
