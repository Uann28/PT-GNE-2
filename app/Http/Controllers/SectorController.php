<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        // Menggunakan withCount agar kita tahu jumlah produk di setiap sektor
        $sectors = Sector::withCount('products')->latest()->get();
        return view('admin.sectors.index', compact('sectors'));
    }

    public function create()
    {
        return view('admin.sectors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Sector::create($validated);

        return redirect()
            ->route('admin.sectors.index')
            ->with('success', 'Sektor berhasil ditambahkan');
    }

    public function show(Sector $sector)
    {
        // Load products agar muncul di halaman detail sektor
        $sector->load('products');
        return view('admin.sectors.show', compact('sector'));
    }

    /**
     * Menampilkan form edit sektor
     */
    public function edit(Sector $sector)
    {
        return view('admin.sectors.edit', compact('sector'));
    }

    /**
     * Memperbarui data sektor
     */
    public function update(Request $request, Sector $sector)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $sector->update($validated);

        return redirect()
            ->route('admin.sectors.index')
            ->with('success', 'Sektor berhasil diperbarui');
    }

    public function destroy(Sector $sector)
    {
        $sector->delete();
        
        // Redirect ke index lebih aman setelah penghapusan
        return redirect()
            ->route('admin.sectors.index')
            ->with('success', 'Sektor berhasil dihapus');
    }
}