<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PriceStandard;
use App\Models\ProductPrice;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    public function index(Product $product)
    {
        $product->load(['types', 'prices.standard', 'prices.type']);

        $standards = PriceStandard::orderBy('mutu')->get();

        return view('admin.product-prices.index', compact(
            'product',
            'standards'
        ));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'product_type_id'   => 'nullable|exists:product_types,id',
            'price_standard_id' => 'required|exists:price_standards,id',
        ]);

        ProductPrice::updateOrCreate(
            [
                'product_id'       => $product->id,
                'product_type_id'  => $request->product_type_id,
                'price_standard_id'=> $request->price_standard_id,
            ],
            []
        );

        return back()->with('success', 'Harga berhasil dipasang ke produk');
    }

    public function destroy(ProductPrice $price)
    {
        $price->delete();
        return back()->with('success', 'Harga dilepas');
    }
}

