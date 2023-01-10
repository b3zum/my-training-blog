<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;

class TagStoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        Tag::firstOrCreate($request->validated());
        return redirect()->route('admin.tag.index');
    }
}
