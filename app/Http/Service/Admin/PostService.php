<?php

namespace App\Http\Service\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data){
        try {
            DB::beginTransaction();
       
            if(isset($data['tag_ids'])){
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
                $data['preview_image'] = Storage::disk('public')->put('/images' , $data['preview_image']);
                $data['main_image'] = Storage::disk('public')->put('/images' , $data['main_image']);
                $post = Post::firstOrCreate($data);
                $post->tags()->attach($tagIds);
            }else{
                $data['preview_image'] = Storage::disk('public')->put('/images' , $data['preview_image']);
                $data['main_image'] = Storage::disk('public')->put('/images' , $data['main_image']);
                $post = Post::firstOrCreate($data);
            }
          
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            abort(501);
        }
        return $data;
    }

    public function update($data,$post){
        try {
            DB::beginTransaction();
          
            if(isset($data['preview_image'])){
                $data['preview_image'] = Storage::disk('public')->put('/images' , $data['preview_image']);
            }

            if(isset( $data['main_image'])){
                $data['main_image'] = Storage::disk('public')->put('/images' , $data['main_image']);
            }

            if(isset($data['tag_ids'])){
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
                $post->update($data);
                $post->tags()->sync($tagIds);    
            }else{
                $post->tags()->detach();
                $post->update($data);
            }
          
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            abort(501);
        }
            return $post;
    }
}
