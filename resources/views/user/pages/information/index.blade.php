@extends('user.layout.app')

@section('content')
    {{-- HEADER SECTION --}}
    <section class="pt-32 pb-20 bg-[#334168] text-white text-center rounded-b-[2rem] md:rounded-b-[3rem] shadow-xl relative overflow-hidden">
        {{-- Pattern Background --}}
        <div class="absolute inset-0 opacity-10" 
            style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;">
        </div>
        
        <div class="relative z-10 px-6">
            <div data-aos="fade-down">
                <span class="inline-block py-1 px-3 rounded-full bg-[#F88008]/20 border border-[#F88008] text-[#F88008] text-xs font-bold uppercase tracking-widest mb-4">
                    Pusat Informasi
                </span>
            </div>

            {{-- Judul --}}
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight leading-tight" data-aos="zoom-in" data-aos-delay="200">
                Berita & Artikel Terbaru
            </h1>

            {{-- Deskripsi --}}
            <p class="text-gray-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="400">
                Dapatkan informasi terkini seputar kegiatan, pengumuman, dan artikel edukatif dari GNE.
            </p>
        </div>
    </section>

    {{-- LIST BERITA SECTION --}}
    <section class="py-16 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">
            
            {{-- NEWS GRID --}}
            <div class="grid grid-cols-2 md:grid-cols-3 gap-8 mb-12">
                {{-- Card Berita --}}
                @foreach ($information as $news)
                    <article class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition duration-300 overflow-hidden group flex flex-col h-full"
                            data-aos="fade-up">
                        
                        {{-- Image Thumbnail --}}
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset('storage/'.$news->image) }}"
                                alt="{{ asset( $news->title) }}" 
                                class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                            <div class="absolute top-4 left-4 bg-[#F88008] text-white text-xs font-bold px-3 py-1 rounded-full">
                                BERITA
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ optional($news->published_at)->format('d M Y') }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    {{ $news->user->name ?? 'Admin' }}
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-[#334168] mb-3 line-clamp-2 group-hover:text-[#F88008] transition">
                                {{ $news->title }}
                            </h3>
                            
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-grow">
                                {{ Str::limit(strip_tags($news->content), 120) }}
                            </p>
                            
                            {{-- Link ke Detail --}}
                            <a href="{{ route('user.pages.information.show', $news->slug) }}" class="inline-flex items-center text-[#334168] font-bold hover:text-[#F88008] transition mt-auto">
                                Baca Selengkapnya 
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- PAGINATION --}}
            <div class="flex justify-center items-center gap-2 mt-12" data-aos="fade-up" data-aos-delay="200">
                {{ $information->links() }}
            </div>

        </div>
    </section>
@endsection