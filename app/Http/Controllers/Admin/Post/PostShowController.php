<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class PostShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }
}
