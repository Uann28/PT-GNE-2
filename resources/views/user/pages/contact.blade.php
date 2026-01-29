@extends('user.layout.app')

@section('title', 'Hubungi Kami - PT Gerbang NTB Emas')

@section('content')

{{-- 1. HERO SECTION --}}
<section class="pt-32 pb-20 bg-[#334168] text-white text-center rounded-b-[2rem] md:rounded-b-[3rem] shadow-xl relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;"></div>
    
    <div class="relative z-10 px-6">
        <div data-aos="fade-down">
            <span class="inline-block py-1 px-3 rounded-full bg-[#F88008]/20 border border-[#F88008] text-[#F88008] text-xs font-bold uppercase tracking-widest mb-4">
                Layanan Pelanggan
            </span>
        </div>

        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight leading-tight" data-aos="zoom-in" data-aos-delay="200">
            Mari Terhubung <br> <span class="text-[#F88008]">Dengan Kami</span>
        </h1>

        <p class="text-gray-300 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="400">
            Kami siap mendengar kebutuhan proyek Anda.
        </p>
    </div>
</section>

{{-- 2. CONTACT INFO & MAP --}}
<section class="py-12 md:py-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 md:px-6 grid lg:grid-cols-5 gap-12 items-start">

        {{-- LEFT CONTENT --}}
        <div class="lg:col-span-3 order-2 lg:order-1">
            <div data-aos="fade-right">
                <h2 class="text-2xl md:text-3xl font-bold text-[#334168] mb-6">Informasi Kontak</h2>
                <p class="text-gray-600 leading-relaxed mb-8 text-sm md:text-base">
                    Tim kami siap membantu Anda Senin - Jumat (08.00 - 17.00 WITA).
                </p>
            </div>

            <div class="grid gap-4 md:grid-cols-2 md:gap-6">
                {{-- Phone --}}
                <div class="group bg-gray-50 hover:bg-[#334168] p-5 rounded-2xl border border-gray-200 transition duration-300"
                     data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-xl shadow-sm text-[#F88008]">📞</div>
                        <div>
                            <p class="text-xs text-gray-500 font-bold uppercase tracking-wider group-hover:text-gray-300">Telepon</p>
                            <p class="text-base font-bold text-gray-900 group-hover:text-white">(0370) 631646</p>
                        </div>
                    </div>
                </div>

                {{-- Email --}}
                <div class="group bg-gray-50 hover:bg-[#334168] p-5 rounded-2xl border border-gray-200 transition duration-300"
                     data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-xl shadow-sm text-[#F88008]">✉️</div>
                        <div>
                            <p class="text-xs text-gray-500 font-bold uppercase tracking-wider group-hover:text-gray-300">Email</p>
                            <p class="text-base font-bold text-gray-900 group-hover:text-white break-all">info@gne.co.id</p>
                        </div>
                    </div>
                </div>

                {{-- Address --}}
                <div class="md:col-span-2 group bg-gray-50 hover:bg-[#334168] p-5 rounded-2xl border border-gray-200 transition duration-300"
                     data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-xl shadow-sm text-[#F88008] flex-shrink-0">📍</div>
                        <div>
                            <p class="text-xs text-gray-500 font-bold uppercase tracking-wider group-hover:text-gray-300 mb-1">Alamat Kantor Pusat</p>
                            <p class="text-base font-bold text-gray-900 leading-snug group-hover:text-white break-words whitespace-normal">
                                Jl. Selaparang No.60, Mayura, Kec. Cakranegara, Kota Mataram, Nusa Tenggara Barat 83239
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT CONTENT (Visuals) --}}
        <div class="lg:col-span-2 space-y-6 order-2 lg:order-2">
            
            <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 group relative h-48 md:h-64"
                 data-aos="fade-left" data-aos-delay="100">
                <img src="/images/kantor-bek.jpg" alt="Kantor GNE" class="w-full h-full object-cover">
                <div class="absolute bottom-3 left-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg shadow-sm">
                    <p class="text-[10px] md:text-xs font-bold text-[#334168]">KANTOR PUSAT</p>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 h-64 md:h-64 relative"
                 data-aos="fade-left" data-aos-delay="300">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15780.097413567815!2d116.14775960000001!3d-8.59365655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdb8af72149fdb%3A0xf02966ff630b387!2sPT.%20Gerbang%20NTB%20Emas!5e0!3m2!1sid!2sid!4v1769578227203!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">

                </iframe>
            </div>
        </div>
    </div>
</section>

{{-- 2.5. FEEDBACK FORM (KRITIK & SARAN) --}}
<section class="py-10 bg-gray-50 relative border-t border-gray-200">
    {{-- Background Decoration --}}
    <div class="absolute top-0 left-0 w-full h-64 bg-gradient-to-b from-white to-gray-50"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        
        {{-- Section Header --}}
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-[#F88008] font-bold uppercase tracking-wider text-sm">Suara Anda Berarti</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#334168] mt-2">Kritik & Saran</h2>
            <p class="text-gray-600 mt-4 max-w-xl mx-auto">
                Bantu kami tumbuh menjadi lebih baik. Sampaikan masukan, apresiasi, atau keluhan Anda melalui formulir di bawah ini.
            </p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 md:p-12" data-aos="zoom-in-up" data-aos-delay="200">
            
            <form action="{{-- route('feedback.store') --}}" method="POST" class="space-y-6">
                @csrf
                
                {{-- Row 1: Nama & Email --}}
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="name" class="text-sm font-bold text-[#334168]">Nama Lengkap</label>
                        <input type="text" id="name" name="name" placeholder="Nama Anda" required
                            class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#F88008] focus:ring-1 focus:ring-[#F88008] outline-none transition duration-200">
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="text-sm font-bold text-[#334168]">Alamat Email</label>
                        <input type="email" id="email" name="email" placeholder="contoh@email.com" required
                            class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#F88008] focus:ring-1 focus:ring-[#F88008] outline-none transition duration-200">
                    </div>
                </div>

                {{-- Row 2: Kategori (Dropdown) & Judul --}}
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Dropdown Pilihan --}}
                    <div class="space-y-2">
                        <label for="category" class="text-sm font-bold text-[#334168]">Kritik/Saran</label>
                        <div class="relative">
                            <select id="category" name="category" required
                                class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#F88008] focus:ring-1 focus:ring-[#F88008] outline-none transition duration-200 appearance-none cursor-pointer text-gray-700">
                                <option value="" disabled selected>Kritik/Saran</option>
                                <option value="Kritik">Kritik</option>
                                <option value="Saran">Saran</option>
                            </select>
                            {{-- Icon Panah Dropdown --}}
                            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Row 3: Isi Pesan --}}
                <div class="space-y-2">
                    <label for="message" class="text-sm font-bold text-[#334168]">Isi Pesan</label>
                    <textarea id="message" name="message" rows="5" placeholder="Tuliskan detail kritik atau saran Anda di sini..." required
                        class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#F88008] focus:ring-1 focus:ring-[#F88008] outline-none transition duration-200 resize-none"></textarea>
                </div>

                {{-- Submit Button --}}
                <div class="pt-4 text-center md:text-right">
                    <button type="submit" 
                        class="group inline-flex items-center gap-2 bg-[#334168] hover:bg-[#2a3655] text-white px-8 py-4 rounded-xl font-bold shadow-lg shadow-blue-900/10 transition-all duration-300 transform hover:-translate-y-1">
                        <span>Kirim Masukan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>

{{-- 3. FAQ / EXTRA --}}
<section class="py-16 bg-gray-50 border-t border-gray-200">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <h3 class="text-xl font-bold text-[#334168] mb-3">Butuh Respon Cepat?</h3>
        <p class="text-sm text-gray-600 mb-6">Hubungi kami langsung melalui WhatsApp untuk konsultasi instan.</p>
        
        {{-- Tombol Zoom In --}}
        <a href="https://wa.me/6285237949283" target="_blank" 
           class="inline-flex items-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white px-6 py-3 rounded-full font-bold shadow-lg transition transform hover:-translate-y-1 text-sm"
           data-aos="zoom-in" data-aos-delay="200">
            <span>💬</span> Chat via WhatsApp
        </a>
    </div>
</section>

@endsection