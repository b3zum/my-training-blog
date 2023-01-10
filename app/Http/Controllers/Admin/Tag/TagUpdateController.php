<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class TagUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return view('admin.tags.show', compact('tag'));
    }
}
