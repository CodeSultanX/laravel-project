<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Comment;

class DeleteController extends Controller
{
   public function __invoke(Comment $comment)
   {
      $comment->delete();
      return redirect()->route('personal.comment.index');
   }
}
