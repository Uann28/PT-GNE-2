<x-app-layout title="Standar Harga Pusat">
    {{-- Header Section --}}
    <div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div>
            <h2 class="text-3xl font-black text-gray-800 tracking-tighter">Standar Harga Pusat</h2>
            <div class="flex items-center gap-2 mt-1">
                <span class="h-1.5 w-1.5 rounded-full bg-indigo-500 animate-pulse"></span>
                <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em]">Master Data Acuan Harga Produk</p>
            </div>
        </div>

        <a href="{{ route('admin.price-standards.create') }}"
           class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-indigo-100 transition-all hover:-translate-y-1 active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Standar Baru
        </a>
    </div>

    {{-- Alert Info --}}
    <div class="mb-8 p-5 bg-indigo-50/50 rounded-3xl border border-indigo-100 flex items-center gap-4">
        <div class="p-2 bg-white text-indigo-600 rounded-xl shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <p class="text-[11px] text-indigo-800 font-bold uppercase tracking-tight">
            Perubahan harga di sini akan mempengaruhi pilihan saat memasang harga pada detail produk.
        </p>
    </div>

    {{-- Data Table --}}
    <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50/50 border-b border-gray-50">
                    <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Klasifikasi Mutu</th>
                    <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Ketebalan</th>
                    <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Harga Acuan</th>
                    <th class="px-8 py-5 text-center text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Satuan</th>
                    <th class="px-8 py-5 text-right text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Pengaturan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($standards as $std)
                <tr class="group hover:bg-indigo-50/30 transition-all duration-300">
                    <td class="px-8 py-6">
                        <span class="font-black text-gray-800 tracking-tight group-hover:text-indigo-600 transition-colors uppercase">
                            {{ $std->mutu }}
                        </span>
                    </td>
                    <td class="px-8 py-6">
                        <span class="px-3 py-1 bg-gray-100 text-gray-500 text-[10px] font-black rounded-lg border border-gray-200 uppercase tracking-tighter">
                            {{ $std->thickness ?? 'N/A' }}
                        </span>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex items-baseline gap-1">
                            <span class="text-[10px] font-black text-indigo-600">Rp</span>
                            <span class="text-lg font-black text-indigo-600 tracking-tighter">
                                {{ number_format($std->price) }}
                            </span>
                        </div>
                    </td>
                    <td class="px-8 py-6 text-center">
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-[0.1em]">{{ $std->unit }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex justify-end items-center gap-2">
                            <a href="{{ route('admin.price-standards.edit', $std) }}" 
                               class="p-3 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all active:scale-90" title="Edit Standar">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form method="POST" action="{{ route('admin.price-standards.destroy', $std) }}" onsubmit="return confirm('Hapus standar harga ini?')">
                                @csrf @method('DELETE')
                                <button class="p-3 text-gray-300 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all active:scale-90" title="Hapus Standar">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-24 text-center">
                        <div class="flex flex-col items-center">
                            <div class="w-20 h-20 bg-gray-50 text-gray-200 rounded-3xl flex items-center justify-center mb-6">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z"/>
                                </svg>
                            </div>
                            <h4 class="text-gray-800 font-black text-lg tracking-tighter uppercase">Belum Ada Standar</h4>
                            <p class="text-gray-400 text-[10px] font-black uppercase tracking-widest mt-1">Silakan tambahkan acuan harga baru untuk sistem.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>