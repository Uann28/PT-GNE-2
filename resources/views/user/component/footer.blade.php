<footer class="bg-[#334168] text-gray-300">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid md:grid-cols-4 gap-12">

            {{-- COMPANY --}}
            <div>
                <img src="/favicon.ico"
                    alt="PT Gerbang NTB Emas"
                    class="w-20 h-20 object-contain mb-4">

                <p class="text-sm leading-relaxed">
                    Solusi terpercaya di sektor manufaktur dan konstruksi
                    untuk mendukung pembangunan berkelanjutan di daerah.
                </p>
            </div>


            {{-- MENU --}}
            <div>
                <h4 class="text-white font-semibold mb-4">
                    Menu
                </h4>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-[#F88008] transition">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="hover:text-[#F88008] transition">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products') }}" class="hover:text-[#F88008] transition">
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="hover:text-[#F88008] transition">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>

            {{-- SERVICES --}}
            <div>
                <h4 class="text-white font-semibold mb-4">
                    Layanan
                </h4>
                <ul class="space-y-2 text-sm">
                    <li>Manufaktur</li>
                    <li>Konstruksi</li>
                </ul>
            </div>

            {{-- CONTACT --}}
            <div>
                <h4 class="text-white font-semibold mb-4">
                    Informasi Kontak
                </h4>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3">
                        <span class="text-[#F88008]">📞</span>
                        <span>(0370) 631646</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-[#F88008]">✉️</span>
                        <span>info@gerbangntbemas.co.id</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-[#F88008]">📍</span>
                        <span>
                            Jl. Selaparang No.60, Mayura, Kec. Cakranegara, Kota Mataram, Nusa Tenggara Bar. 83239
                        </span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    {{-- COPYRIGHT --}}
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-6 text-center text-sm text-gray-400">
            © {{ date('Y') }} PT Gerbang NTB Emas. All Rights Reserved.
        </div>
    </div>
</footer>
