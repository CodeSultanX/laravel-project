<?php

namespace App\Http\Controllers\Post\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function __invoke(Category $category)
   {
      
      $posts = $category->posts()->paginate(4);
      $categories = Category::all();
     
      return view('post.category.index',compact('posts','categories'));
   }

}
