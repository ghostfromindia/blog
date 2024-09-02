<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Traits\ResourceManage;

class BlogController extends Controller
{
    use ResourceManage;

    public function __construct()
    {
        $this->model = new Blogs();
        $this->name = 'Blog';
        $this->view = 'backend.modules.blogs.';
        $this->route = 'blogs.';

    }


}
