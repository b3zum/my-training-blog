<?php

namespace App\Service;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostService
{
    public function store(StoreRequest $request, $data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagsIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $data['preview_image'] = $request->file('preview_image')->store('uploads', 'public');
            $data['main_image'] = $request->file('main_image')->store('uploads', 'public');
            $post = Post::firstOrCreate($data);
            if (isset($tagsIds)) {
               $post->tags()->attach($tagsIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update(UpdateRequest $request, $post, $data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagsIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = $request->file('preview_image')->store('uploads', 'public');
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = $request->file('main_image')->store('uploads', 'public');
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        $post->update($data);
        if (isset($tagsIds)) {
            $post->tags()->sync($tagsIds);
        }

        return $post;
    }
}
