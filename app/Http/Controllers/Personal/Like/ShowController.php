<?php

namespace App\Http\Controllers\Personal\Like;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Post;

class ShowController extends Controller
{
   public function __invoke(Post $post)
   {
      
    return view('personal.like.show',compact('post'));
   }

}
