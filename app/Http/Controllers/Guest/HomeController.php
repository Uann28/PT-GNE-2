<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Sector; // ✅ Jangan lupa import ini
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        // 1. DATA BERITA (Tetap pakai kode lama kamu)
        $information = Information::where('status', 'publish')
            ->latest()
            ->take(3)
            ->get();

        // 2. DATA SEKTOR & PRODUK (Baru)
        // Kita ambil semua sektor beserta produknya (diload dengan gambar)
        $rawSectors = Sector::with(['products.images'])->get();

        // Format ulang agar sesuai dengan struktur JSON yang diminta Javascript
        $sectorsData = $rawSectors->map(function($sector) {
            return [
                'id'     => 'sector-' . $sector->id,  // ID unik untuk Tab
                'label'  => $sector->name,            // Label tombol Tab
                'layout' => 'slider',                 // Layout default slider
                // Ambil maks 6 produk per sektor agar loading cepat
                'items'  => $sector->products->take(6)->map(function($product) {
                    return [
                        'name' => $product->name,
                        // Batasi deskripsi max 60 karakter
                        'desc' => Str::limit($product->description ?? 'Produk berkualitas PT GNE', 60),
                        'slug' => $product->slug,
                        // Ambil gambar pertama, atau placeholder jika kosong
                        'img'  => $product->images->first() 
                                    ? asset('storage/' . $product->images->first()->image_path) 
                                    : asset('images/placeholder.png'),
                    ];
                })->values() // Reset key array agar jadi [0,1,2] bukan [4,5,6]
            ];
        });

        // 3. Kirim ke View (sectorsData untuk JS, information untuk Blade)
        return view('user.pages.home', compact('information', 'sectorsData'));
    }
}