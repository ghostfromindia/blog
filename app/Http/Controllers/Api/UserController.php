<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Product;
use App\Models\User;
use App\Traits\ApiResponse;
use App\Traits\ResourceManage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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

    public function show(Request $request)
    {
        return $this->respond(new UserResource($request->user()), 'User retrieved successfully');
    }

    public function list(Request $request)
    {
        $users = User::all();
        return $this->respond(new UserCollection($users), 'Users retrieved successfully');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return $this->validationError($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->respond(new UserResource($user), 'Users created successfully');

    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:8',
        ]);

        if ($validator->fails()) {
            return $this->validationError($validator->errors());
        }

        $user->fill([
            'name' => $request->input('name', $user->name),
            'email' => $request->input('email', $user->email),
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        $user->save();

        return $this->respond(new UserResource($user), 'Users updated successfully');

    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $this->respond(null, 'User deleted successfully');
    }
}
