<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function login ()  {
        return view('backend.page.login');
    }

    public function home(){
        return view('backend.page.home');
    }

    public function logout(){
        Auth::logout();
        return redirect('home');
    }
}
