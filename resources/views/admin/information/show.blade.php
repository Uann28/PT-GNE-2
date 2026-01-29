<x-app-layout title="Pratinjau: {{ $information->title }}">
    <div class="max-w-4xl mx-auto px-4">

        <div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center gap-5">
                <a href="{{ route('admin.information.index') }}" 
                   class="group p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-violet-600 transition-all shadow-sm active:scale-90">
                    <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div>
                    <h2 class="text-3xl font-black text-gray-800 tracking-tighter">Pratinjau Informasi</h2>
                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mt-1 italic">Reviewing Published Content</p>
                </div>
            </div>

            <a href="{{ route('admin.information.edit', $information) }}" 
               class="flex items-center gap-2 bg-white border border-gray-200 text-gray-600 px-6 py-3 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-violet-50 hover:text-violet-600 hover:border-violet-100 transition-all shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Konten
            </a>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl shadow-gray-200/40 overflow-hidden mb-12">

            @if(!$information->instagram_url)
                <div class="relative h-[400px] w-full bg-gray-100 overflow-hidden">
                    @if($information->image)
                        <img src="{{ asset('storage/' . $information->image) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-gray-300 gap-3">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-[10px] font-black uppercase tracking-widest">Tidak ada foto sampul</span>
                        </div>
                    @endif
                    
                    <div class="absolute top-8 left-8">
                        <span class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg {{ $information->status === 'publish' ? 'bg-emerald-500 text-white' : 'bg-amber-500 text-white' }}">
                            {{ $information->status }}
                        </span>
                    </div>
                </div>
            @endif

            <div class="p-10 md:p-16">
                {{-- Metadata --}}
                <div class="flex flex-wrap items-center justify-between mb-8">
                    <div class="flex items-center gap-6 text-gray-400">
                        <div class="flex items-center gap-2">
                            <div class="p-2 bg-violet-50 text-violet-600 rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <span class="text-[10px] font-black uppercase tracking-widest">{{ $information->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-gray-500">{{ $information->user->name ?? 'Administrator' }}</span>
                        </div>
                    </div>

                    @if($information->instagram_url)
                        <span class="px-4 py-2 bg-pink-50 text-pink-600 border border-pink-100 rounded-xl text-[10px] font-black uppercase tracking-widest">
                            Instagram Post
                        </span>
                    @endif
                </div>

                <h1 class="text-4xl md:text-5xl font-black text-gray-800 leading-[1.1] mb-10 tracking-tighter">
                    {{ $information->title }}
                </h1>

                <div class="space-y-8">
                    @if($information->instagram_url)
                        <div class="flex justify-center bg-gray-50 py-10 rounded-[2rem] border-2 border-dashed border-gray-200">
                            <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="{{ $information->instagram_url }}" data-instgrm-version="14" style="width:100%; max-width:540px;">
                                <a href="{{ $information->instagram_url }}">View this post on Instagram</a>
                            </blockquote>
                            <script async src="//www.instagram.com/embed.js"></script>
                        </div>
                    @endif

                    @if($information->content)
                        <div class="prose prose-violet prose-lg max-w-none text-gray-600 leading-relaxed {{ $information->instagram_url ? 'mt-10 pt-10 border-t border-gray-100' : '' }}">
                            {!! nl2br(e($information->content)) !!}
                        </div>
                    @endif
                </div>
            </div>

            <div class="px-10 py-8 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest italic">Slug:</span>
                    <code class="px-3 py-1 bg-white border border-gray-200 rounded-lg text-xs font-mono text-violet-600">
                        {{ $information->slug }}
                    </code>
                </div>
                
                <form action="{{ route('admin.information.destroy', $information) }}" method="POST" onsubmit="return confirm('Hapus informasi ini selamanya?')">
                    @csrf @method('DELETE')
                    <button class="flex items-center gap-2 text-red-400 hover:text-red-600 transition-colors font-black text-[10px] uppercase tracking-widest">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Hapus Permanen
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>