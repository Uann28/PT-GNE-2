<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\Guest\InformationController as GuestInformationController;
use App\Http\Controllers\Guest\ProductController as GuestProductController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Guest\ReportController as GuestReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\PriceStandardController;
use App\Http\Controllers\ProductPriceController;
use App\Http\Controllers\ProductImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestHomeController::class, 'index'])
    ->name('home');

Route::get('/about', function () {
    return view('user.pages.about');
})->name('about');

Route::get('/products', [GuestProductController::class, 'index'])
    ->name('products');

Route::get('/api/product/{slug}', [GuestProductController::class, 'show'])->name('api.product.show');


Route::get('/contact', function () {
    return view('user.pages.contact');
})->name('contact');

Route::get('/publikasi', [GuestReportController::class, 'index'])->name('publikasi.index');

Route::get('/karir', function () {
    return view('user.pages.karir');
})->name('karir');
Route::get('/karir-detail', function () {
    return view('user.pages.karir-detail');
})->name('karir-detail');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
    
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        
        Route::resource('sectors', SectorController::class);

        Route::resource('products', ProductController::class);

        Route::get('sectors/{sector}/products/create', [ProductController::class, 'create'])->name('sectors.products.create');
        Route::post('sectors/{sector}/products', [ProductController::class, 'store'])->name('sectors.products.store');

        Route::post('products/{product}/types', [ProductTypeController::class, 'store'])->name('products.types.store');
        Route::delete('product-types/{type}', [ProductTypeController::class, 'destroy'])->name('products.types.destroy');

        Route::post('products/{product}/prices', [ProductPriceController::class, 'store'])->name('products.prices.store');
        Route::delete('product-prices/{price}', [ProductPriceController::class, 'destroy'])->name('products.prices.destroy');

        Route::post('products/{product}/images', [ProductImageController::class, 'store'])->name('products.images.store');
        Route::delete('product-images/{image}', [ProductImageController::class, 'destroy'])->name('products.images.destroy');

        Route::get(
            'products/{product}/prices',
            [ProductPriceController::class, 'index']
        )->name('products.prices.index');

        Route::post(
            'products/{product}/prices',
            [ProductPriceController::class, 'store']
        )->name('products.prices.store');

        Route::delete(
            'product-prices/{price}',
            [ProductPriceController::class, 'destroy']
        )->name('products.prices.destroy');

        Route::resource('price-standards', PriceStandardController::class)
            ->except(['show']);

        Route::get('price-standards/{priceStandard}/edit',
            [PriceStandardController::class, 'edit']
        )->name('price-standards.edit');

        Route::put('price-standards/{priceStandard}',
            [PriceStandardController::class, 'update']
        )->name('price-standards.update');

        Route::get(
            'products/{product}/types',
            [ProductTypeController::class, 'index']
        )->name('products.types.index');

        Route::get(
            'products/{product}/images',
            [ProductImageController::class, 'index']
        )->name('products.images.index');

        Route::resource('information', InformationController::class);

        Route::get('/publikasi', [ReportController::class, 'index'])->name('publikasi.index');
        Route::post('/publikasi', [ReportController::class, 'store'])->name('publikasi.store');

        // TAMBAHKAN BARIS INI
        Route::get('/publikasi/{report}/edit', [ReportController::class, 'edit'])->name('publikasi.edit');
        
        // Route untuk proses update (simpan perubahan)
        Route::put('/publikasi/{report}', [ReportController::class, 'update'])->name('publikasi.update');

        Route::delete('/publikasi/{report}', [ReportController::class, 'destroy'])->name('publikasi.destroy');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/informasi/{slug}', [GuestInformationController::class, 'show'])
    ->name('user.pages.information.show');

Route::get('/informasi', [GuestInformationController::class, 'index'])
    ->name('user.pages.information.index');

// routes/web.php

Route::get('/production/production-monitor', function () {
    // Data Lengkap 6 Material sesuai request
    $materials = [
        [
            'name' => 'Semen', 
            'unit' => 'Sak', 
            'current' => 45, 
            'max' => 200, 
            'usage_rate' => 'High', // Konsumsi tinggi
            'icon' => 'fa-layer-group'
        ],
        [
            'name' => 'Pasir', 
            'unit' => 'Ton', 
            'current' => 120, 
            'max' => 150, 
            'usage_rate' => 'Medium',
            'icon' => 'fa-mound'
        ],
        [
            'name' => 'Kerikil', 
            'unit' => 'Ton', 
            'current' => 80, 
            'max' => 100, 
            'usage_rate' => 'Medium',
            'icon' => 'fa-shapes'
        ],
        [
            'name' => 'Arbicon', 
            'unit' => 'Ltr', 
            'current' => 200, 
            'max' => 250, 
            'usage_rate' => 'Low',
            'icon' => 'fa-bottle-droplet'
        ],
        [
            'name' => 'Coral', 
            'unit' => 'Ton', 
            'current' => 15, 
            'max' => 60, 
            'usage_rate' => 'Medium',
            'icon' => 'fa-gem' // Icon representasi
        ],
        [
            'name' => 'Abu Batu', 
            'unit' => 'Ton', 
            'current' => 95, 
            'max' => 100, 
            'usage_rate' => 'High',
            'icon' => 'fa-mountain'
        ],
    ];

    // Hitung item yang stoknya dibawah 30%
    $criticalItems = count(array_filter($materials, function($m) {
        return ($m['current'] / $m['max']) < 0.3;
    }));

    return view('production.index', compact('materials', 'criticalItems'));
})->name('production.index');