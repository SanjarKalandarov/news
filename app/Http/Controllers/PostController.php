<?php

namespace App\Http\Controllers;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected PostRepositoryInterface $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository=$postRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->postRepository->getAllPosts();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->postRepository->createPost($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->postRepository->getPostById($id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return $this->postRepository->updatePost($id,$request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->postRepository->deletePost($id);
    }
}
