<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function __invoke()
   {
      $likes = auth()->user()->likedPosts;
      return view('personal.like.index',compact('likes'));
   }

}
