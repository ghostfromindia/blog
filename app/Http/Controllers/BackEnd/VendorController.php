<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Mail\PassWordResetMail;
use App\Models\Product;
use App\Models\User;
use App\Traits\ApiResponse;
use App\Traits\ResourceManage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    use ApiResponse;
    use ResourceManage;

    public function __construct()
    {
        $this->model = new User();
        $this->name = 'User';
        $this->view = 'backend.modules.user.';
        $this->route = 'user.';

    }

    public function dashboard(Request $request)
    {

    }


}
