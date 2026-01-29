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
        // --- DUMMY DATA PRODUK (untuk Section 5) ---
        $sectorsData = [
            [
                'id' => 'manufaktur',
                'label' => 'Sektor Manufaktur',
                'items' => [
                    [
                        'name' => 'Paving Block',
                        'slug' => 'paving',
                        'desc' => 'Beton pracetak mutu tinggi K300-K500 untuk jalan dan trotoar.',
                        'img' => '/images/paving/bata.png' // Pastikan path benar
                    ],
                    [
                        'name' => 'U-Ditch',
                        'slug' => 'uditch',
                        'desc' => 'Saluran air drainase tipe U dengan tulangan baja SNI.',
                        'img' => '/images/uditch/uditch1.png'
                    ],
                    [
                        'name' => 'Buis Beton',
                        'slug' => 'buis',
                        'desc' => 'Pipa beton pracetak untuk sumur resapan dan gorong-gorong.',
                        'img' => '/images/buis/buis1.png'
                    ],
                ]
            ],
            [
                'id' => 'konstruksi',
                'label' => 'Sektor Konstruksi',
                'items' => [
                    [
                        'name' => 'Excavator PC-200',
                        'slug' => 'excavator',
                        'desc' => 'Penyewaan alat berat untuk kebutuhan cut & fill dan galian.',
                        'img' => '/images/konstruksi/excavator.jpg'
                    ],
                    [
                        'name' => 'Bulldozer D85-SS',
                        'slug' => 'bulldozer',
                        'desc' => 'Alat berat pendorong material untuk pembersihan lahan (land clearing).',
                        'img' => '/images/konstruksi/bulldozer.jpg'
                    ],
                ]
            ]
        ];

        // --- DUMMY DATA BERITA (untuk Section 6) ---
        // Menggunakan object agar sesuai dengan sintaks $news->title di Blade
        $information = collect([
            (object)[
                'title' => 'PT GNE Dukung Pembangunan Sirkuit Mandalika',
                'slug' => 'gne-dukung-mandalika',
                'image' => 'home/1.jpg', // Path di dalam storage/app/public/
                'published_at' => now()->subDays(2),
            ],
            (object)[
                'title' => 'Inovasi Produk Beton Berstandar Internasional',
                'slug' => 'inovasi-beton-sni',
                'image' => 'home/2.jpg',
                'published_at' => now()->subDays(5),
            ],
            (object)[
                'title' => 'Kunjungan Kerja Gubernur NTB ke Pabrik GNE',
                'slug' => 'kunjungan-gubernur-ntb',
                'image' => 'home/1.jpg',
                'published_at' => now()->subMonth(),
            ],
        ]);

        return view('user.pages.home', compact('sectorsData', 'information'));
    }
}