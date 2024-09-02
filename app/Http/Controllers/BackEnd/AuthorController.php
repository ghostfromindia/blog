<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Authors;
use App\Models\Blogs;
use App\Traits\ResourceManage;

class AuthorController extends Controller
{
    use ResourceManage;

    public function __construct()
    {
        $this->model = new Authors();
        $this->name = 'Author';
        $this->view = 'backend.modules.authors.';
        $this->route = 'authors.';

    }


}
