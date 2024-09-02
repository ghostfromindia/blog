<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
    use ApiResponse;
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::firstOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName(),
            // You may add other fields here like password, etc.
        ]);

        Auth::login($user);

        if(Auth::user()->type == 'customer'){
            return redirect()->route('home');
        }elseif(Auth::user()->type == 'admin'){
            return redirect()->route('admin.dashboard');
        }elseif (Auth::user()->type == 'vendor'){
            return redirect()->route('vendor.dashboard');
        }

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            $this->validationError(["error"=>"Invalid login credentials"]);
        }

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }


}
