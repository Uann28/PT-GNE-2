<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Product;
use App\Models\ProductModel;
use App\Models\ProductVariant;
use App\Models\Information;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::with(['sector', 'types', 'images']) 
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', [
            'totalSectors'  => Sector::count(),
            'totalProducts' => Product::count(),
            'totalAdmins'   => User::count(),
            'products'      => $products,
        ]);
    }

}
