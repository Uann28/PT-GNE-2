<x-app-layout title="Tambah Sektor">
    <div class="max-w-3xl mx-auto">
        
        <div class="mb-10 flex items-center gap-5">
            <a href="{{ route('admin.sectors.index') }}" 
               class="group p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-blue-600 hover:border-blue-100 transition-all shadow-sm active:scale-90">
                <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h2 class="text-3xl font-black text-gray-800 tracking-tighter">Sektor Baru</h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em]">Menambahkan Kategori Bisnis Baru</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden">
            {{-- Form Branding Header --}}
            <div class="p-8 border-b border-gray-50 bg-gradient-to-r from-gray-50/50 to-transparent">
                <div class="flex items-center gap-4">
                    <div class="p-4 bg-blue-600 rounded-2xl text-white shadow-xl shadow-blue-200 ring-4 ring-blue-50">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div>
                        <span class="block text-[10px] font-black text-blue-600 uppercase tracking-widest mb-1">Input Data</span>
                        <h3 class="text-xl font-bold text-gray-800 tracking-tight">Informasi Dasar Sektor</h3>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.sectors.store') }}" method="POST" class="p-8 space-y-8">
                @csrf

                <div class="grid grid-cols-1 gap-8">
                    {{-- Nama Sektor --}}
                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-blue-600 transition-colors">Nama Kategori Sektor</label>
                        <input type="text" name="name" 
                            value="{{ old('name') }}" 
                            class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-blue-600/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all placeholder-gray-300 @error('name') border-red-500 bg-red-50 @enderror" 
                            placeholder="Contoh: Paving & Beton" required autofocus>
                        @error('name')
                            <p class="mt-2 text-[10px] text-red-500 font-black uppercase tracking-wide">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-blue-600 transition-colors">Deskripsi Singkat</label>
                        <textarea name="description" rows="4" 
                            class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-blue-600/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-medium text-gray-600 leading-relaxed transition-all placeholder-gray-300" 
                            placeholder="Jelaskan secara singkat jenis produk atau layanan dalam sektor ini...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-[10px] text-red-500 font-black uppercase tracking-wide">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full py-4 bg-blue-600 text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-2xl shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 transition-all active:scale-95 flex items-center justify-center gap-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        Simpan Sektor Baru
                    </button>
                    
                    <a href="{{ route('admin.sectors.index') }}" class="block mt-4 text-center text-[10px] font-black text-gray-400 uppercase tracking-widest hover:text-gray-600 transition-colors">
                        Batalkan dan Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>