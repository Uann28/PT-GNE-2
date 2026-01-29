<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sector;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // 1. Ambil Sektor dan Produknya (hanya kolom penting agar ringan)
        $sectors = Sector::with(['products' => function($q) {
            $q->select('id', 'sector_id', 'name', 'slug');
        }])->get();

        // 2. Format ulang data agar mudah dibaca oleh JavaScript (Frontend)
        $sectorData = $sectors->map(function($sector) {
            return [
                'id' => 'sector-' . $sector->id,
                'label' => $sector->name,
                // Logic: Jika nama sektor mengandung kata 'sewa', pakai layout rental
                'layoutType' => stripos($sector->name, 'sewa') !== false ? 'rental' : 'catalog',
                'items' => $sector->products->map(function($prod) {
                    return [
                        'id' => $prod->slug,
                        'title' => $prod->name,
                    ];
                })
            ];
        });

        // 3. Kirim variabel $sectorData ke View
        return view('user.pages.products', compact('sectorData'));
    }

    // ... method show() dan private function lainnya biarkan tetap ada ...
    public function show($slug)
    {
        // ... kode show yang sudah kita buat sebelumnya ...
         $product = Product::with([
            'types',
            'prices.standard',
            'prices.type',
            'images',
            'sector'
        ])->where('slug', $slug)->firstOrFail();

        return response()->json(
            $this->transformToProductJSFormat($product)
        );
    }
    
    // ... function transformToProductJSFormat & formatPrices ...
    private function transformToProductJSFormat($product)
    {
        // ... (kode transformasi JSON sama seperti sebelumnya)
        return [
            'id'          => $product->slug,
            'title'       => $product->name,
            'description' => $product->description,
            'layoutType'  => stripos($product->sector->name, 'sewa') !== false ? 'rental' : 'catalog', 
            'images' => $product->images->map(function ($img, $i) {
                return [
                    'src'     => asset('storage/' . $img->image_path),
                    'alt'     => 'Image',
                    'primary' => $i === 0,
                ];
            }),
            'about' => [
                'description' => $product->description,
                'highlights'  => [],
            ],
            'useCases' => [],
            'models' => $product->types->map(function ($type) {
                return [
                    'type' => $type->name,
                ];
            }),
            'prices' => $this->formatPrices($product),
        ];
    }

private function formatPrices($product)
    {
        $grouped = $product->prices->groupBy(function ($p) {
            return $p->standard->mutu ?? 'Standar';
        });

        $result = [];

        foreach ($grouped as $mutu => $items) {
            $firstItem = $items->first();
            
            // 1. Definisikan Mutu (Produk) DULUAN
            $priceRow = [
                'mutu' => $mutu,
                // HAPUS 'unit' DARI SINI
            ];

            // 2. Masukkan Harga-harga (Looping)
            foreach ($items as $price) {
                $thickness = strtolower(str_replace(' ', '', $price->standard->thickness ?? ''));
                $val = number_format($price->standard->price, 0, ',', '.');

                if ($thickness == '6cm')      $priceRow['cm6']  = "Rp " . $val;
                elseif ($thickness == '8cm')  $priceRow['cm8']  = "Rp " . $val;
                elseif ($thickness == '3dimensi') $priceRow['dim3'] = "Rp " . $val;
                else {
                    $typeName = $price->type ? $price->type->name : 'Harga';
                    $cleanKey = str_replace(' ', '_', strtolower($typeName));
                    $priceRow[$cleanKey] = "Rp " . $val;
                }
            }

            // 3. BARU Masukkan Unit (Satuan) TERAKHIR
            // Karena ditaruh terakhir, di tabel dia akan muncul paling kanan
            $priceRow['unit'] = $firstItem->standard->unit ?? '-';

            $result[] = $priceRow;
        }

        return $result;
    }
}