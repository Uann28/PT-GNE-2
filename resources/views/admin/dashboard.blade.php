<x-app-layout title="Dashboard Admin">

    <div class="grid md:grid-cols-3 gap-6 mb-10">

        <div class="bg-white p-6 rounded-2xl shadow border">
            <p class="text-sm text-gray-500">Total Sektor</p>
            <h2 class="text-3xl font-bold text-blue-600">{{ $totalSectors }}</h2>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow border">
            <p class="text-sm text-gray-500">Total Produk</p>
            <h2 class="text-3xl font-bold text-emerald-600">{{ $totalProducts }}</h2>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow border">
            <p class="text-sm text-gray-500">Total Admin</p>
            <h2 class="text-3xl font-bold text-amber-600">{{ $totalAdmins }}</h2>
        </div>

    </div>


    <div class="bg-white rounded-2xl shadow border overflow-hidden">
        <div class="p-6 border-b">
            <h3 class="font-bold text-gray-700">Produk Terbaru</h3>
        </div>

        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="p-4 text-left">Produk</th>
                    <th class="p-4 text-left">Sektor</th>
                    <th class="p-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-4 font-semibold">{{ $product->name }}</td>
                    <td class="p-4">{{ $product->sector->name }}</td>
                    <td class="p-4 text-right">
                        <a href="{{ route('admin.products.show', $product) }}"
                           class="text-blue-600 font-semibold">
                            Kelola →
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
