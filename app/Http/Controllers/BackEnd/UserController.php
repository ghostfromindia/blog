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

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->type == "admin"){
                return redirect()->intended(route('admin.dashboard'));
            }elseif (Auth::user()->type == "vendor"){
                return redirect()->intended(route('vendor.dashboard'));
            }
        }
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);

    }

    public function reset()
    {
        return view('backend.page.reset_password');
    }

    public function resetAction(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user){
            throw ValidationException::withMessages([
                'email' => ["Email not found"],
            ]);
        }

        $random = rand(111111,999999);
        $user->otp = encrypt($random);
        $user->save();

        if(Mail::send(new PassWordResetMail($user))){
            $mail = true;
            return view('backend.page.reset_password', compact('mail'));
        }
    }

    public function change(Request $request)
    {
        $code = $request->get('code');
        $email = $request->get('email');
        $user = User::where('email', $email)->where('otp',($code))->first();
        if($user){
            //verified
            return view('backend.page.change_password', compact('code','email'));
        }
    }

    public function save(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8',
        ]);

        if($request->password != $request->confirm_password){
            throw ValidationException::withMessages(["Password confirmation does not match"]);
        }

        $user = User::where('email', $request->email)->where('otp',($request->code))->first();
        if($user){
            $user->password = Hash::make($request->password);
            $user->save();
            session()->flash('success','Password Successfully Reset');
            Auth::logout();
            return redirect()->route('dashboard.login');
        }else{
            if($request->password != $request->confirm_password){
                throw ValidationException::withMessages(["Invalid details"]);
            }
        }
    }

}
