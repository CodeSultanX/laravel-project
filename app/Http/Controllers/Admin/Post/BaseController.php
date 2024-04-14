<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Service\Admin\PostService;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BaseController extends Controller
{
   protected $service;

   public function __construct(PostService $service){
      $this->service = $service;
   }

}
