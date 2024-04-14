<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;

class UpdateController extends Controller
{
   public function __invoke(Category $category,UpdateRequest $request)
   {
      $data = $request->validated();
      $category->update($data);
      return redirect()->route('admin.category.index');
   }
}
