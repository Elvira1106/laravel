<?php 

namespace App\Service\Post;

use App\Models\Post;
class Service
{
    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        // dd($tags, $data);
        $post = Post::create($data);    
        $post->tags()->attach($tags);
    }

    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
    }
}