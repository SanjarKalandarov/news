<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\Http;

class PostApiRepository implements PostRepositoryInterface
{

    public function getAllPosts(): \Illuminate\Http\Client\Response
    {
        return Http::get('/posts');
    }

    public function getPostById(int $postId)
    {
        // TODO: Implement getPostById() method.
    }

    public function deletePost(int $postId)
    {
        // TODO: Implement deletePost() method.
    }

    public function createPost(array $postDetails)
    {
        // TODO: Implement createPost() method.
    }

    public function updatePost(int $postId, array $postDetails)
    {
        // TODO: Implement updatePost() method.
    }

    public function getFulfilledPosts()
    {
        // TODO: Implement getFulfilledPosts() method.
    }
}
