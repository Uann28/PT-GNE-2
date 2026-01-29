<x-app-layout title="Tulis Informasi Baru">
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.information.index') }}" class="p-2 text-gray-400 hover:text-violet-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <h2 class="font-black text-2xl text-gray-800 tracking-tighter leading-tight">
                Tulis Informasi Baru
            </h2>
        </div>
    </x-slot>

    <div class="py-12 max-w-5xl mx-auto px-4">
        {{-- Card Utama --}}
        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
            {{-- Form Header Branding --}}
            <div class="p-8 border-b border-gray-50 bg-gradient-to-r from-violet-50/30 to-transparent">
                <div class="flex items-center gap-4">
                    <div class="p-3.5 bg-violet-600 rounded-2xl text-white shadow-xl shadow-violet-100 ring-4 ring-violet-50">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="block text-[10px] font-black text-violet-600 uppercase tracking-widest mb-0.5">Editor Konten</span>
                        <h3 class="text-xl font-bold text-gray-800 tracking-tight">Detail Publikasi</h3>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.information.store') }}" method="POST" enctype="multipart/form-data" class="p-10 space-y-8">
                @csrf
                
                <div class="space-y-6">
                    {{-- Judul --}}
                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-violet-600 transition-colors">Judul Berita / Informasi</label>
                        <input name="title" value="{{ old('title') }}" 
                            class="w-full bg-gray-50 border-2 border-transparent focus:border-violet-500/20 focus:bg-white focus:ring-0 rounded-2xl p-4 text-lg font-bold text-gray-800 transition-all placeholder-gray-300" 
                            placeholder="Masukkan judul yang menarik..." required>
                        @error('title') <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        {{-- Status --}}
                        <div class="group">
                            <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-violet-600 transition-colors">Status Publikasi</label>
                            <select name="status" class="w-full bg-gray-50 border-2 border-transparent focus:border-violet-500/20 focus:bg-white focus:ring-0 rounded-2xl p-4 font-bold text-gray-700 transition-all text-sm">
                                <option value="draft">📁 Simpan sebagai Draft</option>
                                <option value="publish">🚀 Publikasikan Langsung</option>
                            </select>
                        </div>

                        <div class="group">
                            <label class="block text-[10px] font-black uppercase text-pink-500 mb-3 tracking-[0.2em] group-focus-within:text-pink-600 transition-colors">Link Instagram (Opsional)</label>
                            <div class="relative">
                                <input type="url" name="instagram_url" value="{{ old('instagram_url') }}" 
                                    placeholder="https://instagram.com/p/..."
                                    class="w-full bg-gray-50 border-2 border-transparent focus:border-pink-500/20 focus:bg-white focus:ring-0 rounded-2xl p-4 text-sm font-bold text-gray-800 transition-all placeholder-gray-300">
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-pink-400">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </div>
                            </div>
                            @error('instagram_url') <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        {{-- Image --}}
                        <div class="group">
                            <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-violet-600 transition-colors">Gambar Sampul</label>
                            <div class="relative">
                                <input type="file" name="image" 
                                    class="w-full text-[10px] text-gray-400 file:mr-4 file:py-3.5 file:px-6 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 transition-all">
                            </div>
                            @error('image') <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Konten --}}
                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-violet-600 transition-colors">Konten Lengkap (Opsional jika pakai Instagram)</label>
                        <textarea name="content" rows="10" 
                            class="w-full bg-gray-50 border-2 border-transparent focus:border-violet-500/20 focus:bg-white focus:ring-0 rounded-[2rem] p-6 text-gray-600 leading-relaxed transition-all placeholder-gray-300" 
                            placeholder="Tulis berita Anda di sini secara detail...">{{ old('content') }}</textarea>
                        @error('content') <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Aksi --}}
                <div class="flex flex-col md:flex-row items-center justify-end gap-4 pt-6 border-t border-gray-50">
                    <a href="{{ route('admin.information.index') }}" 
                       class="text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-gray-600 transition-colors px-6">
                        Batal
                    </a>
                    <button type="submit" 
                        class="w-full md:w-auto bg-violet-600 hover:bg-violet-700 text-white px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-violet-100 transition-all hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        Simpan Informasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>