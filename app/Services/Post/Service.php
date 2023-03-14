<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store ($data)
    {
        if(isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        }

        $post = Post::create($data);

        if(isset($tags)) {
            $post->tags()->attach($tags);
        }
    }

    public function update ($post, $data)
    {
        if(isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        } else {
            $tags = [];
        }

        $post->update($data);

        if(isset($tags)) {
            $post->tags()->sync($tags);
        }
    }
}