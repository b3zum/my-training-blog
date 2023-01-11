<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;

class PostStoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['preview_image'] = $request->file('preview_image')->store('uploads', 'public');
        $data['main_image'] = $request->file('main_image')->store('uploads', 'public');

        Post::firstOrCreate($data);
        return redirect()->route('admin.post.index');
    }
}
