<?php

namespace App\Transformers;


use App\Entities\Post;

class PostTransformer
{
    public function transform(Post $post)
    {
        return [
            'id' => $post->getId(),
            'title' => $post->getTitle(),
            'body' => $post->getBody()
        ];
    }
    
    public function transformAll(array $posts) {
        return array_map(
            function ($post) {
                return $this->transform($post);
            }, $posts
        );
    }
}
