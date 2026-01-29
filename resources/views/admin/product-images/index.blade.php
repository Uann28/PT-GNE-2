<x-app-layout :title="'Gambar Produk '.$product->name">
    <div class="max-w-4xl mx-auto">
        
        <div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center gap-5">
                <a href="{{ route('admin.products.show', $product) }}" 
                   class="group p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-blue-600 hover:border-blue-100 transition-all shadow-sm active:scale-90">
                    <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div>
                    <h2 class="text-3xl font-black text-gray-800 tracking-tighter">Galeri Visual</h2>
                    <div class="flex items-center gap-2 mt-1">
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em]">Asset Produk:</p>
                        <span class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[9px] font-black rounded-full border border-blue-100 uppercase tracking-widest">
                            {{ $product->name }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden mb-10">
            <div class="p-8 border-b border-gray-50 bg-gradient-to-r from-blue-50/30 to-transparent">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-blue-600 rounded-xl text-white shadow-lg shadow-blue-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 tracking-tight">Upload Foto Baru</h3>
                </div>
            </div>

            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.products.images.store', $product) }}" class="p-8">
                @csrf
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <div class="w-full relative group">
                        <input type="file" name="image" required id="image-upload" class="hidden">
                        <label for="image-upload" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-200 rounded-[2rem] bg-gray-50 group-hover:bg-blue-50 group-hover:border-blue-200 transition-all cursor-pointer">
                            <div class="flex flex-center gap-3 items-center">
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                                <span class="text-xs font-black text-gray-400 group-hover:text-blue-600 uppercase tracking-widest">Pilih File Gambar</span>
                            </div>
                        </label>
                    </div>
                    <button class="w-full md:w-auto px-10 py-5 bg-blue-600 text-white font-black text-[10px] uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-blue-100 hover:bg-blue-700 hover:-translate-y-1 transition-all active:scale-95 whitespace-nowrap">
                        Mulai Upload
                    </button>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
            @forelse($product->images as $img)
            <div class="group relative aspect-square bg-white rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <img src="{{ asset('storage/'.$img->image_path) }}" 
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <form method="POST" action="{{ route('admin.products.images.destroy', $img) }}" 
                          class="absolute top-4 right-4" onsubmit="return confirm('Hapus foto ini?')">
                        @csrf @method('DELETE')
                        <button class="w-10 h-10 bg-white/20 backdrop-blur-md text-white hover:bg-red-500 hover:text-white rounded-xl flex items-center justify-center transition-all active:scale-90">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </form>
                    <div class="absolute bottom-6 left-6">
                         <span class="text-[10px] font-black text-white/80 uppercase tracking-widest">Aset Visual #{{ $loop->iteration }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 bg-gray-50/50 rounded-[2.5rem] border-2 border-dashed border-gray-100 flex flex-col items-center justify-center">
                <div class="w-16 h-16 bg-white text-gray-200 rounded-2xl flex items-center justify-center mb-4 shadow-sm">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Belum ada foto produk</p>
            </div>
            @endforelse
        </div>

    </div>
</x-app-layout>