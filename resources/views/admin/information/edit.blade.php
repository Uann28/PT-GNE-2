<x-app-layout title="Edit Informasi: {{ $information->title }}">
    <div class="max-w-5xl mx-auto">
        <div class="mb-10 flex items-center gap-5">
            <a href="{{ route('admin.information.index') }}" class="group p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-violet-600 transition-all shadow-sm active:scale-90">
                <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h2 class="text-3xl font-black text-gray-800 tracking-tighter">Edit Informasi</h2>
                <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mt-1 italic">Drafting & Revision Mode</p>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden">
            <form action="{{ route('admin.information.update', $information) }}" method="POST" enctype="multipart/form-data" class="p-10 space-y-8">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    {{-- Judul --}}
                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-violet-500 transition-colors">Judul Informasi</label>
                        <input type="text" name="title" value="{{ old('title', $information->title) }}" required
                            class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-violet-500/20 focus:bg-white focus:ring-0 rounded-2xl text-lg font-bold text-gray-800 transition-all">
                        @error('title') <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-end">
                        {{-- Image Upload --}}
                        <div class="group">
                            <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-violet-500 transition-colors">Foto Sampul (Opsional)</label>
                            <div class="flex items-center gap-4">
                                @if($information->image)
                                    <div class="relative w-14 h-14 flex-shrink-0">
                                        <img src="{{ asset('storage/' . $information->image) }}" class="w-full h-full object-cover rounded-xl border-2 border-violet-100">
                                    </div>
                                @endif
                                <input type="file" name="image" class="w-full text-[10px] text-gray-400 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 transition-all">
                            </div>
                        </div>

                        <div class="group">
                            <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-pink-500 transition-colors">Link Instagram (Opsional)</label>
                            <div class="relative">
                                <input type="url" name="instagram_url" value="{{ old('instagram_url', $information->instagram_url) }}" 
                                    placeholder="https://www.instagram.com/p/..."
                                    class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-pink-500/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all">
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-pink-500">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </div>
                            </div>
                            @error('instagram_url') <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div class="group">
                            <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-violet-500 transition-colors">Ubah Status</label>
                            <select name="status" class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-violet-500/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all">
                                <option value="draft" {{ $information->status == 'draft' ? 'selected' : '' }}>Simpan sebagai Draft</option>
                                <option value="publish" {{ $information->status == 'publish' ? 'selected' : '' }}>Publish Sekarang</option>
                            </select>
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-violet-500 transition-colors">Isi Konten (Opsional jika pakai Instagram)</label>
                        <textarea name="content" rows="8" class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-violet-500/20 focus:bg-white focus:ring-0 rounded-3xl text-sm text-gray-600 leading-relaxed transition-all">{{ old('content', $information->content) }}</textarea>
                    </div>
                </div>

                <div class="pt-6 flex flex-col md:flex-row gap-4">
                    <button type="submit" class="flex-grow py-5 bg-violet-600 text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-violet-100 hover:bg-violet-700 hover:-translate-y-1 transition-all active:scale-95 flex items-center justify-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.information.index') }}" class="px-10 py-5 bg-gray-50 text-gray-400 font-black text-xs uppercase tracking-[0.2em] rounded-2xl hover:bg-gray-100 hover:text-gray-600 transition-all text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>