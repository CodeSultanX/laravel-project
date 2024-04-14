<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;

class StoreController extends BaseController
{
   public function __invoke(StoreRequest $request)
   {
      $data = $request->validated();

       $this->service->store($data);


    return redirect()->route('admin.post.index');
   }

}
