<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function redirect()
    {
        $userType = Auth::user()->userType;
        if($userType == 1)
        {
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('home');
        }
    }

    public function index()
    {
        $product = Product::orderBy('id','desc')->Paginate(2);
        return view('user.home.main',compact('product'));
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
