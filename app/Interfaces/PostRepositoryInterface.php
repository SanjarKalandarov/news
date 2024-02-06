<?php

namespace App\Interfaces;

interface PostRepositoryInterface
{
    public function getAllPosts();
    public function getPostById(int $postId);
    public function deletePost(int $postId);
    public function createPost(array $postDetails);
    public function updatePost(int $postId, array $postDetails);
    public function  getFulfilledPosts();

}
