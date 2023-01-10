<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;

class PostStoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        Post::firstOrCreate($request->validated());
        return redirect()->route('admin.post.index');
    }
}
