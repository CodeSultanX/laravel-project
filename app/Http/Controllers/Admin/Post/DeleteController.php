<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DeleteController extends Controller
{
   public function __invoke(Post $post)
   {
      $post->delete();
      return redirect()->route('admin.post.index');
   }
}
