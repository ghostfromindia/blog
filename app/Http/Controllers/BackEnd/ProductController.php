<?php

namespace app\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ResourceManage;

class ProductController extends Controller
{
    use ResourceManage;

    public function __construct()
    {
        $this->model = new Product();
        $this->name = 'Product';
        $this->view = 'backend.modules.products.';
        $this->route = 'product.';

    }

}
