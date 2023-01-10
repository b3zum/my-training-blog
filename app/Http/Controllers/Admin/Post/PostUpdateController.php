<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;

class PostUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $post->update($request->validated());
        return view('admin.posts.show', compact('post'));
    }
}
