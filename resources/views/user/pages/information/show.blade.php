@extends('user.layout.app')

@section('content')
    {{-- ARTICLE HEADER / HERO --}}
    <section class="bg-white pt-32 pb-12">
        <div class="max-w-4xl mx-auto px-6">
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6" data-aos="fade-down">
                <a href="/" class="hover:text-[#F88008]">Home</a>
                <span>/</span>
                <a href="{{ route('user.pages.information.index') }}" class="hover:text-[#F88008]">Informasi</a>
                <span>/</span>
                <span class="text-[#334168] font-medium truncate max-w-[200px]">
                    {{ $information->title }}
                </span>

            </nav>

            {{-- Meta Data --}}
            <div class="flex flex-wrap items-center gap-4 text-sm text-[#F88008] font-bold uppercase tracking-wider mb-4" 
                 data-aos="fade-down" data-aos-delay="100">
                <span>Berita Terbaru</span>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span>{{ optional($information->published_at)->format('d F Y') }}</span>

            </div>

            {{-- Title --}}
            <h1 class="text-3xl md:text-5xl font-bold text-[#334168] leading-tight mb-8" 
                data-aos="zoom-in" data-aos-delay="200">
                {{ $information->title }}
            </h1>

            {{-- Featured Image --}}
            <div class="rounded-2xl overflow-hidden shadow-lg mb-12" 
                 data-aos="fade-up" data-aos-delay="400">
                <img src="{{ asset('storage/' . $information->image) }}"
                     alt="Deskripsi Gambar" 
                     class="w-full h-auto object-cover">
            </div>
        </div>
    </section>

    {{-- ARTICLE CONTENT --}}
    <section class="pb-24 bg-white overflow-hidden"> 
        <div class="max-w-4xl mx-auto px-6">
            <div class="flex flex-col md:flex-row gap-12">
                
                {{-- Main Content Column --}}
                <div class="md:w-3/4" data-aos="fade-up" data-aos-delay="500">
                    {{-- Typography Prose Class (Konten Artikel) --}}
                    <div class="prose prose-lg prose-headings:text-[#334168] prose-a:text-[#F88008] text-gray-600">
                        {!! $information->content !!}
                    </div>

                    {{-- Share & Tags --}}
                    <div class="mt-12 pt-8 border-t border-gray-100" data-aos="fade-up">
                        <h4 class="text-sm font-bold text-[#334168] uppercase mb-4">Bagikan Berita Ini:</h4>
                        <div class="flex gap-2">
                            <button class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center hover:opacity-90 transition transform hover:-translate-y-1"><i class="fab fa-facebook-f"></i> F</button>
                            <button class="w-10 h-10 rounded-full bg-sky-500 text-white flex items-center justify-center hover:opacity-90 transition transform hover:-translate-y-1"><i class="fab fa-twitter"></i> T</button>
                            <button class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center hover:opacity-90 transition transform hover:-translate-y-1"><i class="fab fa-whatsapp"></i> W</button>
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <aside class="md:w-1/4 space-y-8" data-aos="fade-left" data-aos-delay="600">
                    {{-- Widget: Berita Lainnya --}}
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                        <h3 class="text-lg font-bold text-[#334168] mb-4 border-b pb-2 border-gray-200">Berita Lainnya</h3>
                        <div class="space-y-4">
                            @foreach ($related as $item)
                            <a href="{{ route('user.pages.information.show', $item->slug) }}" class="block group">
                                <span class="text-xs text-[#F88008] font-semibold block mb-1">
                                    {{ optional($item->published_at)->format('d M Y') }}
                                </span>
                                <h4 class="text-sm font-bold text-gray-700 group-hover:text-[#F88008] transition leading-snug">
                                    {{ $item->title }}
                                </h4>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </section>
@endsection