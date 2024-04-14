<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;

class ShowController extends Controller
{
   public function __invoke(Tag $tag)
   {
      
    return view('admin.tag.show',compact('tag'));
   }

}
