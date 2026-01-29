<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{

    public function index(Product $product)
    {
        return view('admin.product-types.index', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $product->types()->create([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Jenis produk ditambahkan');
    }

    public function destroy($id)
    {
        ProductType::findOrFail($id)->delete();
        return back()->with('success', 'Jenis produk dihapus');
    }
}
