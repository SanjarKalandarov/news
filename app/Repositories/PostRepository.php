<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface
{


    public function getAllPosts():Collection
    {
       return  Post::all();
    }

    public function getPostById(int $postId)
    {
    return     Post::find($postId);
    }

    public function deletePost(int $postId)
    {
   return Post::delete($postId);
    }


    public function createPost(array $postDetails)
    {
        return Post::create($postDetails);
    }

    public function updatePost(int $postId, array $postDetails)
    {
        $posts=Post::find($postId);
         $posts->update($postDetails);
         return $posts;
    }


    public function getFulfilledPosts()
    {
        return Post::where('fulfilled',true)->latest()->get();
    }
}
