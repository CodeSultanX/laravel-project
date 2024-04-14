<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;

class UpdateController extends Controller
{
   public function __invoke(Comment $comment,UpdateRequest $request)
   {
      $data = $request->validated();
      $comment->update($data);
      return redirect()->route('personal.comment.index');
   }
}
