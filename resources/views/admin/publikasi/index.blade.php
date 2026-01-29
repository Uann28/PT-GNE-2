<x-app-layout title="Manajemen Publikasi">
    <div class="p-8">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-10">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight leading-none">Arsip Dokumen</h2>
                <p class="text-sm text-gray-400 mt-2 font-medium">Kelola laporan PDF untuk transparansi publik.</p>
            </div>
            <button onclick="document.getElementById('modalTambah').classList.remove('hidden')" class="bg-[#334168] text-white px-6 py-3.5 rounded-2xl font-bold text-sm shadow-xl shadow-blue-900/10 hover:bg-blue-600 transition-all duration-300 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Upload Laporan
            </button>
        </div>

        {{-- Statistik Singkat --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Total File</p>
                    <p class="text-xl font-bold text-gray-900">{{ $reports->total() }} Dokumen</p>
                </div>
            </div>
        </div>

        {{-- Table Content --}}
        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex flex-col md:flex-row justify-between gap-4 bg-gray-50/30">
                <form action="{{ route('admin.publikasi.index') }}" method="GET" class="flex gap-2">
                    <select name="tahun" onchange="this.form.submit()" class="bg-white border-gray-100 rounded-xl text-xs font-bold text-gray-500 px-4 focus:ring-blue-500/10">
                        <option value="">Semua Tahun</option>
                        @foreach(range(date('Y'), 2020) as $year)
                            <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>Tahun {{ $year }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <table class="w-full text-left">
                <thead class="bg-gray-50/50">
                    <tr>
                        <th class="px-8 py-5 text-[10px] font-black uppercase text-gray-400 tracking-widest">Nama Dokumen</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase text-gray-400 tracking-widest text-center">Tahun</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase text-gray-400 tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($reports as $report)
                    <tr class="group hover:bg-gray-50/50 transition-colors">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-red-50 text-red-500 flex items-center justify-center font-bold text-[10px]">PDF</div>
                                <div>
                                    <p class="font-bold text-gray-800 tracking-tight">{{ $report->title }}</p>
                                    <p class="text-[10px] text-gray-400 font-medium">Size: {{ $report->file_size }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-center font-bold text-gray-500">{{ $report->year }}</td>
                        <td class="px-8 py-6">
                            <div class="flex justify-end gap-2">
                                {{-- Tombol Lihat --}}
                                <a href="{{ asset('storage/' . $report->file_path) }}" target="_blank" class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-50 text-gray-400 hover:bg-blue-50 hover:text-blue-600 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>

                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.publikasi.edit', $report->id) }}" 
                                class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-50 text-gray-400 hover:bg-amber-50 hover:text-amber-600 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.publikasi.destroy', $report->id) }}" method="POST" onsubmit="return confirm('Hapus permanen dokumen ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-50 text-gray-400 hover:bg-red-50 hover:text-red-500 transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-8 py-20 text-center text-gray-400 italic text-sm">Belum ada laporan yang diunggah.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            {{ $reports->links() }}
        </div>
    </div>

    {{-- MODAL UPLOAD --}}
    <div id="modalTambah" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="this.parentElement.classList.add('hidden')"></div>
        <div class="relative flex items-center justify-center min-h-screen p-4">
            <div class="bg-white w-full max-w-lg rounded-[2.5rem] shadow-2xl p-10 animate-in zoom-in duration-300">
                <h3 class="text-xl font-bold text-gray-900 mb-8">Unggah Dokumen Baru</h3>
                <form action="{{ route('admin.publikasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2 px-1">Judul Laporan</label>
                        <input type="text" name="title" required class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-blue-500/20 font-bold text-gray-700 placeholder:text-gray-300">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2 px-1">Tahun</label>
                            <input type="number" name="year" value="{{ date('Y') }}" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-blue-500/20 font-bold">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2 px-1">Tgl Terbit</label>
                            <input type="date" name="published_at" required class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-blue-500/20 font-bold">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2 px-1">File PDF (Maks 20MB)</label>
                        <div class="relative w-full h-32 border-2 border-dashed border-gray-100 rounded-[2rem] flex flex-col items-center justify-center hover:bg-gray-50 transition cursor-pointer group">
                            <input type="file" name="file" accept=".pdf" required class="absolute inset-0 opacity-0 cursor-pointer">
                            <svg class="w-8 h-8 text-gray-200 group-hover:text-blue-400 mb-2 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                            <span class="text-[10px] font-black text-gray-300 group-hover:text-gray-400 uppercase tracking-widest">Klik untuk pilih file</span>
                        </div>
                    </div>
                    <div class="flex gap-4 pt-4">
                        <button type="button" onclick="this.closest('#modalTambah').classList.add('hidden')" class="flex-1 py-4 text-sm font-bold text-gray-400">Batal</button>
                        <button type="submit" class="flex-1 bg-[#334168] text-white py-4 rounded-2xl font-bold text-sm shadow-xl shadow-blue-900/20 hover:bg-blue-600 transition-all">Upload Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>