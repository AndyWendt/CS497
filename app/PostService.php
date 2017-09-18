<?php

namespace App;

use App\Contracts\PostServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class PostService implements PostServiceInterface
{
    /**
     * @param string $searchTagName
     * @return Collection
     */
    public function filterPostsByTag($searchTagName)
    {
        return $this->postsWithTags()->filter(function (\App\Post $post) use ($searchTagName) {
            return $post->tags->contains(function ($compareTag, $key) use ($searchTagName) {
                return $compareTag->name === $searchTagName;
            });
        });
    }

    /**
     * @return Collection
     */
    public function postsWithTags()
    {
        return Post::with('tags')->get();
    }
}