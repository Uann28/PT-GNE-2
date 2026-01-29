<x-app-layout title="Kelola Informasi">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 px-4 sm:px-6 lg:px-8 mt-6">
        <div>
            <h2 class="font-black text-3xl text-gray-800 tracking-tighter leading-tight">
                Kelola Informasi
            </h2>
            <div class="flex items-center gap-2 mt-1">
                <span class="h-1.5 w-1.5 rounded-full bg-violet-500 animate-pulse"></span>
                <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em]">Pusat Konten & Berita</p>
            </div>
        </div>
        
        <a href="{{ route('admin.information.create') }}" 
            class="px-6 py-3.5 bg-violet-600 text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-violet-700 shadow-xl shadow-violet-100 transition-all flex items-center gap-3 hover:-translate-y-1 active:scale-95">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Informasi
        </a>
    </div>

    <div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-8 p-5 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-r-2xl shadow-sm flex items-center gap-4 animate-fade-in-down">
                <div class="p-2 bg-emerald-500 text-white rounded-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                </div>
                <div>
                    <span class="block font-black text-xs uppercase tracking-tight">Berhasil!</span>
                    <p class="text-sm font-medium opacity-90">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <div class="bg-white shadow-2xl shadow-gray-200/50 rounded-[2.5rem] border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] border-b border-gray-50">
                            <th class="px-8 py-6 uppercase">Preview Konten</th>
                            <th class="px-8 py-6 text-center uppercase">Status</th>
                            <th class="px-8 py-6 uppercase">Tanggal Rilis</th>
                            <th class="px-8 py-6 text-right uppercase">Navigasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($information as $item)
                        <tr class="group hover:bg-violet-50/30 transition-all duration-300">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-5">
                                    {{-- Thumbnail dengan Instagram Overlay --}}
                                    <div class="relative w-24 h-16 rounded-2xl bg-gray-100 overflow-hidden flex-shrink-0 shadow-sm ring-2 ring-gray-50 group-hover:ring-violet-100 transition-all">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-gray-300 bg-gray-50">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            </div>
                                        @endif

                                        @if($item->instagram_url)
                                            <div class="absolute inset-0 bg-gradient-to-t from-pink-600/60 to-transparent flex items-end p-1.5">
                                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="max-w-md">
                                        <a href="{{ route('admin.information.show', $item) }}" class="font-bold text-gray-800 line-clamp-1 group-hover:text-violet-600 transition-colors tracking-tight uppercase text-sm">
                                            {{ $item->title }}
                                        </a>
                                        <div class="flex items-center gap-2 mt-1">
                                            @if($item->instagram_url)
                                                <span class="text-[8px] px-2 py-0.5 bg-pink-50 text-pink-500 border border-pink-100 rounded-lg font-black tracking-widest uppercase">Via Instagram</span>
                                            @else
                                                <span class="text-[8px] px-2 py-0.5 bg-violet-50 text-violet-500 border border-violet-100 rounded-lg font-black tracking-widest uppercase">Admin Entry</span>
                                            @endif
                                            <span class="h-1 w-1 rounded-full bg-gray-200"></span>
                                            <span class="text-[9px] font-black text-gray-300 tracking-widest uppercase">ID: #INF-{{ str_pad($item->id, 3, '0', STR_PAD_LEFT) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-center">
                                <span class="px-4 py-1.5 text-[9px] font-black uppercase rounded-xl tracking-widest {{ $item->status == 'publish' ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' : 'bg-amber-50 text-amber-600 border border-amber-100' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex flex-col">
                                    <span class="text-xs font-black text-gray-700 tracking-tight">
                                        {{ $item->published_at ? $item->published_at->format('d M Y') : 'DRAFT' }}
                                    </span>
                                    <span class="text-[9px] text-gray-400 font-bold uppercase tracking-tighter italic">
                                        {{ $item->published_at ? $item->published_at->format('H:i') . ' WIB' : 'Waiting Confirmation' }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex justify-end items-center gap-1">
                                    <a href="{{ route('admin.information.show', $item) }}" class="p-3 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all" title="Pratinjau">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <a href="{{ route('admin.information.edit', $item) }}" class="p-3 text-gray-400 hover:text-violet-600 hover:bg-violet-50 rounded-xl transition-all" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.information.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus informasi ini selamanya?')">
                                        @csrf @method('DELETE')
                                        <button class="p-3 text-gray-300 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all" title="Hapus">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-8 py-24 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-20 h-20 bg-gray-50 text-gray-200 rounded-full flex items-center justify-center mb-6 ring-8 ring-gray-50/50">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2zM14 3v5h5M7 12h10M7 16h10"/></svg>
                                    </div>
                                    <h4 class="text-gray-800 font-black text-lg tracking-tighter uppercase">Belum Ada Informasi</h4>
                                    <p class="text-gray-400 text-[10px] font-black uppercase tracking-widest mt-1">Mulai publikasikan berita atau pengumuman Anda.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        {{-- Pagination --}}
        <div class="mt-10 flex justify-center">
            {{ $information->links() }}
        </div>
    </div>
</x-app-layout>