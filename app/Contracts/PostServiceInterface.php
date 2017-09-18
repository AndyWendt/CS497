<?php

namespace App\Contracts;


use Illuminate\Database\Eloquent\Collection;

interface PostServiceInterface
{
    /**
     * @param string $searchTagName
     * @return Collection
     */
    public function filterPostsByTag($searchTagName);

    /**
     * @return Collection
     */
    public function postsWithTags();
}