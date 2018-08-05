<?php

namespace App\Services;

use App\Tag;

class TagService
{
    public function getPopularTags() {
        $tags = Tag::withCount('posts')->orderBy('posts_count', 'DESC')->take(20)->get();
        return $tags;
    }
}
