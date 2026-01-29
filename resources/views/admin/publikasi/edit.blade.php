<x-app-layout title="Edit Arsip: {{ $report->title }}">
    <div class="max-w-5xl mx-auto py-10">
        {{-- Header --}}
        <div class="mb-10 flex items-center gap-5 px-4 lg:px-0">
            <a href="{{ route('admin.publikasi.index') }}" class="group p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-red-600 transition-all shadow-sm active:scale-90">
                <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h2 class="text-3xl font-black text-gray-800 tracking-tighter">Edit Arsip Dokumen</h2>
                <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mt-1 italic text-red-500">Revision Mode: Memperbarui Data Publikasi</p>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden">
            <form action="{{ route('admin.publikasi.update', $report) }}" method="POST" enctype="multipart/form-data" class="p-10 space-y-8">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    {{-- Judul Laporan --}}
                    <div class="group">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-red-500 transition-colors">Judul Laporan / Dokumen</label>
                        <input type="text" name="title" value="{{ old('title', $report->title) }}" required
                            class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-red-500/20 focus:bg-white focus:ring-0 rounded-2xl text-lg font-bold text-gray-800 transition-all">
                        @error('title') <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        {{-- Tahun --}}
                        <div class="group">
                            <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-red-500 transition-colors">Tahun Laporan</label>
                            <input type="number" name="year" value="{{ old('year', $report->year) }}" required
                                class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-red-500/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all">
                        </div>

                        {{-- Tanggal Terbit --}}
                        <div class="group">
                            <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em] group-focus-within:text-red-500 transition-colors">Tanggal Publikasi</label>
                            <input type="date" name="published_at" value="{{ old('published_at', $report->published_at instanceof \DateTime ? $report->published_at->format('Y-m-d') : substr($report->published_at, 0, 10)) }}" required
                                class="w-full px-6 py-4 bg-gray-50 border-2 border-transparent focus:border-red-500/20 focus:bg-white focus:ring-0 rounded-2xl text-sm font-bold text-gray-800 transition-all">
                        </div>
                    </div>

                    {{-- File Upload Info --}}
                    <div class="p-6 bg-red-50/50 border-2 border-dashed border-red-100 rounded-3xl">
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 bg-red-500 rounded-2xl flex items-center justify-center text-white font-black text-xs shadow-lg shadow-red-200">PDF</div>
                            <div class="flex-1">
                                <h4 class="text-sm font-black text-gray-800 uppercase tracking-tight">File Saat Ini</h4>
                                <p class="text-[10px] text-gray-400 font-bold break-all">{{ basename($report->file_path) }} ({{ $report->file_size }})</p>
                            </div>
                            <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank" class="px-4 py-2 bg-white text-gray-400 hover:text-red-500 font-black text-[10px] uppercase rounded-xl shadow-sm transition-all">Lihat File</a>
                        </div>
                        <div class="mt-6 pt-6 border-t border-red-100/50">
                            <label class="block text-[10px] font-black uppercase text-gray-400 mb-3 tracking-[0.2em]">Ganti File (Kosongkan jika tidak diubah)</label>
                            <input type="file" name="file" class="w-full text-[10px] text-gray-400 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-red-50 file:text-red-700 hover:file:bg-red-100 transition-all">
                            <p class="text-[9px] text-red-400 mt-2 font-bold italic">* Maksimal 20MB, Format: PDF</p>
                        </div>
                    </div>
                </div>

                <div class="pt-6 flex flex-col md:flex-row gap-4">
                    <button type="submit" class="flex-grow py-5 bg-red-600 text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-red-100 hover:bg-red-700 hover:-translate-y-1 transition-all active:scale-95 flex items-center justify-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        Simpan Perubahan Dokumen
                    </button>
                    <a href="{{ route('admin.publikasi.index') }}" class="px-10 py-5 bg-gray-50 text-gray-400 font-black text-xs uppercase tracking-[0.2em] rounded-2xl hover:bg-gray-100 hover:text-gray-600 transition-all text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>