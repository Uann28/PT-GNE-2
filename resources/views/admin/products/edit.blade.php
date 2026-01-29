<x-app-layout title="Edit Produk: {{ $product->name }}">
    <div class="max-w-3xl mx-auto">
        
        <div class="mb-10 flex items-center gap-5">
            <a href="{{ route('admin.products.show', $product) }}" 
               class="group p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-amber-500 hover:border-amber-100 transition-all shadow-sm active:scale-90">
                <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h2 class="text-3xl font-black text-gray-800 tracking-tighter">Edit Identitas</h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em]">Update Informasi Dasar Produk</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden">
            {{-- Form Header Branding --}}
            <div class="p-8 border-b border-gray-50 bg-gradient-to-r from-amber-50/30 to-transparent">
                <div class="flex items-center gap-4">
                    <div class="p-4 bg-amber-500 rounded-2xl text-white shadow-xl shadow-amber-100 ring-4 ring-amber-50">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="block text-[10px] font-black text-amber-600 uppercase tracking-widest mb-1">Sedang Mengubah</span>
                        <h3 class="text-xl font-bold text-gray-800 tracking-tight">{{ $product->name }}</h3>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.products.update', $product) }}" method="POST" class="p-8 space-y-8">
                @csrf 
                @method('PATCH')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-amber-500 transition-colors">Nama Produk</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" 
                            class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-amber-500/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all placeholder-gray-300" 
                            placeholder="Contoh: Paving Block Dadu">
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-amber-500 transition-colors">Kategori Sektor</label>
                        <select name="sector_id" 
                            class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-amber-500/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all appearance-none cursor-pointer">
                            @foreach($sectors as $sector)
                                <option value="{{ $sector->id }}" {{ $product->sector_id == $sector->id ? 'selected' : '' }}>
                                    {{ $sector->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="group">
                    <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-amber-500 transition-colors">Deskripsi Produk</label>
                    <textarea name="description" rows="5" 
                        class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-amber-500/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-medium text-gray-600 leading-relaxed transition-all placeholder-gray-300"
                        placeholder="Jelaskan detail spesifikasi umum produk...">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="pt-4 flex flex-col md:flex-row gap-4">
                    <button type="submit" class="flex-grow order-2 md:order-1 py-4 bg-amber-500 text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-amber-100 hover:bg-amber-600 hover:-translate-y-1 transition-all active:scale-95 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.products.show', $product) }}" 
                       class="px-10 py-4 bg-gray-50 text-gray-400 font-black text-xs uppercase tracking-[0.2em] rounded-2xl hover:bg-gray-100 hover:text-gray-600 transition-all text-center order-1 md:order-2">
                        Batal
                    </a>
                </div>
            </form>
        </div>

        <div class="mt-8 p-6 bg-amber-50/50 rounded-3xl border border-dashed border-amber-200 flex items-start gap-4">
            <div class="p-2 bg-amber-100 text-amber-600 rounded-xl">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
            </div>
            <p class="text-[11px] text-amber-800 leading-relaxed font-bold italic">
                Tips: Nama produk yang unik memudahkan pelanggan dalam proses pencarian. Pastikan deskripsi mencakup keunggulan utama produk.
            </p>
        </div>
    </div>
</x-app-layout>