<x-app-layout title="Edit Sektor: {{ $sector->name }}">
    <div class="max-w-3xl mx-auto">
        
        <div class="mb-10 flex items-center gap-5">
            <a href="{{ route('admin.sectors.index') }}" 
               class="group p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-blue-600 hover:border-blue-100 transition-all shadow-sm active:scale-90">
                <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h2 class="text-3xl font-black text-gray-800 tracking-tighter">Pengaturan Sektor</h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>
                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em]">Konfigurasi Kategori Produk</p>
                </div>
            </div>
        </div>

        {{-- Card Form --}}
        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden">
            <div class="p-8 border-b border-gray-50 bg-gradient-to-r from-gray-50/50 to-transparent">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="p-4 bg-blue-600 rounded-2xl text-white shadow-xl shadow-blue-200 ring-4 ring-blue-50">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="block text-[10px] font-black text-blue-600 uppercase tracking-widest mb-1">Entitas Sektor</span>
                            <h3 class="text-xl font-bold text-gray-800 tracking-tight">{{ $sector->name }}</h3>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <span class="px-4 py-2 bg-gray-100 text-gray-500 text-[10px] font-black rounded-full uppercase tracking-tighter">ID: #{{ $sector->id }}</span>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.sectors.update', $sector) }}" method="POST" class="p-8 space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-8">
                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-blue-600 transition-colors">Nama Kategori Sektor</label>
                        <div class="relative">
                            <input type="text" name="name" 
                                value="{{ old('name', $sector->name) }}" 
                                class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-blue-600/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all placeholder-gray-300 @error('name') border-red-500 bg-red-50 @enderror" 
                                placeholder="Misal: Paving & Beton" required>
                        </div>
                        @error('name')
                            <p class="mt-2 text-[10px] text-red-500 font-black uppercase tracking-wide">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-blue-600 transition-colors">Deskripsi & Catatan</label>
                        <textarea name="description" rows="4" 
                            class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-blue-600/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-medium text-gray-600 leading-relaxed transition-all placeholder-gray-300" 
                            placeholder="Tuliskan deskripsi singkat mengenai sektor ini...">{{ old('description', $sector->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-[10px] text-red-500 font-black uppercase tracking-wide">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-6 flex flex-col md:flex-row gap-4">
                    <button type="submit" class="flex-grow order-2 md:order-1 py-4 bg-blue-600 text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-2xl shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 transition-all active:scale-95">
                        Konfirmasi Perubahan
                    </button>
                    <a href="{{ route('admin.sectors.index') }}" class="px-10 py-4 bg-gray-50 text-gray-400 font-black text-xs uppercase tracking-[0.2em] rounded-2xl hover:bg-gray-100 hover:text-gray-600 transition-all text-center order-1 md:order-2">
                        Batalkan
                    </a>
                </div>
            </form>
        </div>

        <div class="mt-10 p-6 bg-white rounded-3xl border border-dashed border-blue-200 flex items-center gap-5">
            <div class="flex-shrink-0 w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-[11px] text-gray-500 font-bold leading-relaxed">
                    <strong class="text-blue-600 uppercase tracking-tighter">Sinkronisasi Otomatis:</strong><br>
                    Perubahan nama akan berdampak pada label kategori di halaman publik dan semua produk terkait.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>