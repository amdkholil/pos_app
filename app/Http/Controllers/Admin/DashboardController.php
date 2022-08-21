<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduct = Product::all()->count();
        $totalCategory = Category::all()->count();

        return view('admin.dashboard.index', compact('totalProduct','totalCategory'));
    }
}
