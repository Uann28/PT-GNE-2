<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.product-images.index', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('products', 'public');

        $product->images()->create([
            'image_path' => $path,
        ]);

        return back()->with('success', 'Gambar ditambahkan');
    }

    public function destroy(ProductImage $image)
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Gambar dihapus');
    }
}
