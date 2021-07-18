<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $usersCount = User::count();
        $productsCount = Product::count();

        return view('admin.index', compact('usersCount', 'productsCount'));
    }
}
