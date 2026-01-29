<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sector;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('sector')->latest()->get();

        return view('admin.products.index', compact('products'));
    }
    
    public function create(Sector $sector)
    {
        return view('admin.products.create', compact('sector'));
    }

    
    public function store(Request $request, Sector $sector)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $product = $sector->products()->create($validated);

        return redirect()
            ->route('admin.products.show', $product)
            ->with('success', 'Produk berhasil ditambahkan. Silakan kelola gambar dan harga.');
    }

    
    public function show(Product $product)
    {

        $product->load(['types', 'prices.standard', 'images', 'sector']);
        
        return view('admin.products.show', compact('product'));
    }

    
    public function edit(Product $product)
    {
        $sectors = Sector::all(); 
        return view('admin.products.edit', compact('product', 'sectors'));
    }

    
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'sector_id'     => 'required|exists:sectors,id',
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $product->update($validated);

        return redirect()
            ->route('admin.products.show', $product)
            ->with('success', 'Informasi produk berhasil diperbarui');
    }

    /**
     * Menghapus produk
     */
    public function destroy(Product $product)
    {
        $sectorId = $product->sector_id;
        $product->delete();
        
        // Redirect ke halaman sektor asal setelah hapus produk
        return redirect()
            ->route('admin.sectors.show', $sectorId)
            ->with('success', 'Produk berhasil dihapus');
    }
}