<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PriceStandard;
use Illuminate\Http\Request;

class PriceStandardController extends Controller
{
    public function index()
    {
        $standards = PriceStandard::latest()->get();
        return view('admin.price-standards.index', compact('standards'));
    }

    public function create()
    {
        return view('admin.price-standards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mutu'      => 'required|string|max:50',
            'thickness' => 'nullable|string|max:50',
            'price'     => 'required|numeric|min:0',
            'unit'      => 'required|string|max:20',
        ]);

        PriceStandard::create($request->all());

        return redirect()
            ->route('admin.price-standards.index')
            ->with('success', 'Standar harga ditambahkan');
    }

    public function edit(PriceStandard $priceStandard)
    {
        return view('admin.price-standards.edit', compact('priceStandard'));
    }

    public function update(Request $request, PriceStandard $price_standard)
    {
        $request->validate([
            'mutu'      => 'required|string|max:50',
            'thickness' => 'nullable|string|max:50',
            'price'     => 'required|numeric|min:0',
            'unit'      => 'required|string|max:20',
        ]);

        $price_standard->update($request->all());

        return redirect()
            ->route('admin.price-standards.index')
            ->with('success', 'Standar harga diperbarui');
    }

    public function destroy(PriceStandard $price_standard)
    {
        $price_standard->delete();

        return back()->with('success', 'Standar harga dihapus');
    }
}