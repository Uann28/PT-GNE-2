<x-app-layout title="Manajemen Sektor">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
        <div>
            <h2 class="text-2xl font-black text-gray-800 tracking-tight">Daftar Sektor</h2>
            <p class="text-sm text-gray-500 font-medium italic">Kelola kategori bisnis dan distribusi produk PT GNE</p>
        </div>

        <a href="{{ route('admin.sectors.create') }}"
           class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-blue-200 transition-all active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M12 4v16m8-8H4"/></svg>
            Tambah Sektor
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($sectors as $sector)
        <div class="group bg-white rounded-3xl border border-gray-100 p-1 shadow-sm hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-300">
            <div class="p-6">
                <div class="flex justify-between items-start mb-6">
                    <div class="p-4 bg-blue-50 text-blue-600 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <span class="text-[10px] font-black px-3 py-1 bg-gray-50 text-gray-400 rounded-full uppercase tracking-widest border border-gray-100">
                        {{ $sector->products_count }} Produk
                    </span>
                </div>

                <h3 class="text-lg font-black text-gray-800 mb-1 group-hover:text-blue-600 transition-colors uppercase tracking-tight">
                    {{ $sector->name }}
                </h3>
                <p class="text-xs text-gray-400 font-medium line-clamp-2 mb-6">
                    {{ $sector->description ?? 'Kelola semua daftar harga dan spesifikasi produk untuk sektor ' . $sector->name }}
                </p>

                <div class="flex gap-2 border-t border-gray-50 pt-6">
                    <a href="{{ route('admin.sectors.show', $sector) }}" 
                       class="flex-grow py-3 bg-blue-50 text-blue-600 text-center font-black text-[10px] uppercase tracking-widest rounded-xl hover:bg-blue-600 hover:text-white transition-all">
                        Buka Sektor
                    </a>
                    
                    <a href="{{ route('admin.sectors.edit', $sector) }}" 
                       class="p-3 bg-amber-50 text-amber-600 rounded-xl hover:bg-amber-500 hover:text-white transition-all shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </a>

                    <form action="{{ route('admin.sectors.destroy', $sector) }}" method="POST" onsubmit="return confirm('Hapus sektor ini?')">
                        @csrf @method('DELETE')
                        <button class="p-3 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>