const DB_DATA = [
    {
        id: "manufaktur",
        name: "Sektor Manufaktur",
        layoutType: "catalog",
        items: [
            {
                id: "paving",
                title: "Paving Block",
                description: "Produk beton pracetak unggulan untuk berbagai kebutuhan infrastruktur.",
                useCases: [
                    "Jalan lingkungan & perumahan",
                    "Area parkir & pergudangan",
                    "Kawasan industri & komersial",
                    "Trotoar & taman kota"
                ],
                images: [
                    { src: "/images/paving/bata.png", alt: "Paving block model bata", primary: true },
                    { src: "/images/paving/dadu.png", alt: "Paving block model dadu" },
                    { src: "/images/paving/kotak.png", alt: "Paving block model kotak" },
                    { src: "/images/paving/heksa.png", alt: "Paving block model heksagon" },
                    { src: "/images/paving/grassblock.png", alt: "Paving block model grassblock" },
                    { src: "/images/paving/3-dimensi.png", alt: "Paving block model 3 dimensi" },
                ],
                about: {
                    description: "Paving Block diproduksi menggunakan mesin berstandar industri dengan mutu beton K100–K500.",
                    highlights: [
                        "Memenuhi standar SNI & ISO",
                        "Tahan terhadap beban lalu lintas",
                        "Ukuran presisi & konsisten",
                        "Finishing rapi & siap pasang"
                    ]
                },
                prices: [
                    { mutu: "K100", cm6: 75000, cm8: 80000, dim3: 90000, unit: "m²" },
                    { mutu: "K175", cm6: 85000, cm8: 90000, dim3: 100000, unit: "m²" },
                    { mutu: "K200", cm6: 95000, cm8: 100000, dim3: 110000, unit: "m²" },
                    { mutu: "K250", cm6: 100000, cm8: 105000, dim3: 115000, unit: "m²" },
                    { mutu: "K300", cm6: 105000, cm8: 110000, dim3: 120000, unit: "m²" },
                    { mutu: "K350", cm6: null, cm8: 120000, dim3: 130000, unit: "m²" },
                    { mutu: "K400", cm6: null, cm8: 130000, dim3: 140000, unit: "m²" },
                    { mutu: "K500", cm6: null, cm8: 145000, dim3: 155000, unit: "m²" }
                ],
                models: [
                    { name: "Dadu 10×10", qty: 100, unit: "pcs/m²" },
                    { name: "Bata 10×20", qty: 50, unit: "pcs/m²" },
                    { name: "Kotak 20×20", qty: 25, unit: "pcs/m²" },
                    { name: "Kotak besar 40×40", qty: 6.25, unit: "pcs/m²" },
                    { name: "Heksagon 0 20", qty: 28, unit: "pcs/m²" },
                    { name: "Heksagon 0 18", qty: 36, unit: "pcs/m²" },
                    { name: "Heksagon 0 17", qty: 37, unit: "pcs/m²" },
                    { name: "Rumput (grassblock)", qty: 12.5, unit: "pcs/m²" }
                ],
                colors: [
                    { name: "Merah", price: 8000, unit: "m²" },
                    { name: "Kuning", price: 8000, unit: "m²" },
                    { name: "Hitam", price: 9000, unit: "m²" },
                    { name: "Hijau", price: 10000, unit: "m²" }
                ]
            },
            {
                id: "paving_motif",
                title: "Paving Block : Motif",
                description: "Produk beton pracetak unggulan untuk berbagai kebutuhan infrastruktur.",
                useCases: [
                    "Jalan lingkungan & perumahan",
                    "Area parkir & pergudangan",
                    "Kawasan industri & komersial",
                    "Trotoar & taman kota"
                ],
                images: [
                    { src: "/images/paving/topi-uskup.png", alt: "Paving block model topi uskup", primary: true },
                    { src: "/images/paving/topi-uskup.png", alt: "Paving block model topi uskup" }
                ],
                about: {
                    description: "Paving Block diproduksi menggunakan mesin berstandar industri dengan mutu beton K100–K500.",
                    highlights: [
                        "Memenuhi standar SNI & ISO",
                        "Tahan terhadap beban lalu lintas",
                        "Ukuran presisi & konsisten",
                        "Finishing rapi & siap pasang"
                    ]
                },
                prices: [
                    { produk: "Kipas", harga: "100000", unit: "set" },
                    { produk: "Topi Uskup", harga: "6000", unit: "pcs" }
                ]
            },
            {
                id: "kanstein",
                title: "Kanstein",
                description: "Beton pracetak sebagai pembatas jalan dan trotoar.",
                useCases: ["Pembatas jalan", "Trotoar", "Median jalan"],
                images: [
                    { src: "/images/kanstein/kerb1.png", alt: "Kanstein tipe 1", primary: true },
                    { src: "/images/kanstein/kerb2.png", alt: "Kanstein tipe 2" },
                    { src: "/images/kanstein/kerb3.png", alt: "Kanstein tipe 3" }
                ],
                about: {
                    description: "Kanstein berfungsi sebagai elemen pembatas antara badan jalan dan area pedestrian.",
                    highlights: [
                        "Kuat dan presisi dimensi",
                        "Tahan terhadap cuaca luar ruang",
                        "Mudah dipasang dan dirawat"
                    ]
                },
                prices: [
                    { type: "Kerb I", size: "60×30×20", price: 57000, unit: "pcs" },
                    { type: "Kerb I", size: "40×30×20", price: 40000, unit: "pcs" },
                    { type: "Kerb I", size: "40×20×20", price: 33000, unit: "pcs" },
                    { type: "Kerb I", size: "40×15×12", price: 25000, unit: "pcs" },
                    { type: "Kerb L", size: "20×30×20", price: 20000, unit: "pcs" },
                    { type: "Kerb L", size: "40×30×26", price: 40000, unit: "pcs" },
                    { type: "Kerb L", size: "20×30×26", price: 20000, unit: "pcs" },
                    { type: "Kerb S", size: "40×15×30", price: 33000, unit: "pcs" }
                ]
            },
            {
                id: "buis",
                title: "Buis Beton",
                description: "Pipa beton pracetak untuk saluran air dan gorong-gorong.",
                useCases: ["Drainase", "Irigasi", "Saluran air"],
                images: [
                    { src: "/images/buis/buis1.png", alt: "Buis beton ukuran besar", primary: true },
                    { src: "/images/buis/buis2.png", alt: "Buis beton ukuran kecil" }
                ],
                about: {
                    description: "Buis Beton digunakan sebagai saluran air bawah tanah dengan daya tahan tinggi.",
                    highlights: [
                        "Tersedia varian tulangan dan non-tulangan",
                        "Cocok untuk drainase dan irigasi",
                        "Umur pakai panjang"
                    ]
                },
                prices: [
                    { size: "80×50×10", spec: "Tulangan K300", price: 700000, unit: "pcs" },
                    { size: "80×50×10", spec: "Tulangan K225", price: 600000, unit: "pcs" },
                    { size: "60×50×10", spec: "Tulangan K300", price: 450000, unit: "pcs" },
                    { size: "60×50×10", spec: "Nock K200", price: 175000, unit: "pcs" },
                    { size: "50×50×5", spec: "Nock K200", price: 125000, unit: "pcs" },
                    { size: "40×50×5", spec: "Nock K200", price: 100000, unit: "pcs" },
                    { size: "20×100×5", spec: "K200", price: 80000, unit: "pcs" },
                    { size: "20×100×5", spec: "K250", price: 110000, unit: "pcs" }
                ]
            },
            {
                id: "uditch",
                title: "U-Ditch",
                description: "Saluran beton pracetak untuk sistem drainase terbuka.",
                useCases: ["Drainase jalan", "Saluran kawasan", "Infrastruktur"],
                images: [
                    { src: "/images/uditch/uditch1.png", alt: "U-Ditch ukuran kecil", primary: true },
                    { src: "/images/uditch/uditch2.png", alt: "U-Ditch ukuran besar" }
                ],
                about: {
                    description: "U-Ditch dirancang untuk sistem drainase terbuka dengan kapasitas aliran besar.",
                    highlights: [
                        "Menggunakan tulangan baja",
                        "Pemasangan cepat dan presisi",
                        "Tahan beban lalu lintas"
                    ]
                },
                prices: [
                    { size: "30×40×100×7,5", spec: "Tulangan K300", price: 450000, unit: "pcs" },
                    { size: "40×40×100×7,5", spec: "Tulangan K300", price: 550000, unit: "pcs" },
                    { size: "50×50×100×7,5", spec: "Tulangan K300", price: 650000, unit: "pcs" },
                    { size: "60×60×100×7,5", spec: "Tulangan K300", price: 900000, unit: "pcs" },
                    { size: "80×80×100×7,5", spec: "Tulangan K300", price: 1500000, unit: "pcs" },
                    { size: "100×100×100×7,5", spec: "Tulangan K350", price: 2700000, unit: "pcs" }
                ]
            },
            {
                id: "boxculvert",
                title: "Box Culvert",
                description: "Saluran beton pracetak tertutup untuk beban berat.",
                useCases: ["Gorong-gorong", "Drainase tertutup", "Jalan raya"],
                images: [
                    { src: "/images/boxculvert/box1.png", alt: "Box culvert ukuran sedang", primary: true },
                    { src: "/images/boxculvert/box2.png", alt: "Box culvert ukuran besar" }
                ],
                about: {
                    description: "Box Culvert dirancang untuk menahan beban berat dan lalu lintas.",
                    highlights: [
                        "Mampu menahan beban berat",
                        "Presisi tinggi produksi pabrik",
                        "Minim perawatan jangka panjang"
                    ]
                },
                prices: [
                    { size: "60×80×120×10", price: 2600000, unit: "pcs" },
                    { size: "80×80×100×15", price: 2900000, unit: "pcs" },
                    { size: "100×100×100×15", price: 4000000, unit: "pcs" }
                ]
            }
        ]
    },
    {
        id: "konstruksi",
            name: "Sektor Konstruksi",
            layoutType: "catalog",
            items: [
                {
                    id: "excavator",
                    title: "Excavator PC-200",
                    description: "Unit andalan untuk proyek cut & fill, pengerukan saluran, dan pembukaan lahan.",
                    useCases: [
                        "Penggalian Tanah (Digging)",
                        "Pemuatan Material (Loading)",
                        "Perataan Tanah (Grading)",
                        "Pembukaan Lahan"
                    ],
                    images: [
                        { src: "/images/konstruksi/excavator.jpg", alt: "Excavator PC-200", primary: true },
                        { src: "/images/konstruksi/excavator.jpg", alt: "Tampak Samping" } // Contoh duplikat foto jika cuma ada 1
                    ],
                    about: { 
                        description: "Dilengkapi operator bersertifikat SIO dan unit tahun muda.",
                        highlights: [ 
                            "Operating Weight: 20.500 kg",
                            "Bucket Capacity: 0.9 - 1.2 m³",
                            "Engine Power: 138 HP",
                            "Max Digging Depth: 6.6 meter"
                        ]
                    },
                    prices: [ // 
                        { item: "Sewa Alat (Include Operator)", harga: "210.000", unit: "per jam" },
                        { item: "Biaya Mobilisasi", harga: "Hubungi Kami", unit: "lumpsum" }
                    ]
                },
                {
                    id: "bulldozer",
                    title: "Bulldozer D85-SS",
                    description: "Crawler Dozer bertenaga besar untuk mendorong tanah, meratakan material, dan menumbangkan pohon.",
                    useCases: [
                        "Land Clearing (Pembersihan Lahan)",
                        "Perataan Tanah (Leveling)",
                        "Pendorongan Material",
                        "Stripping Soil"
                    ],
                    images: [
                        { src: "/images/konstruksi/bulldozer.jpg", alt: "Bulldozer D85", primary: true }
                    ],
                    about: {
                        description: "Unit siap kerja berat dengan blade besar dan traksi tinggi.",
                        highlights: [
                            "Operating Weight: 28.000 kg",
                            "Blade Type: Semi-U Tilt",
                            "Engine Output: 215 HP",
                            "Blade Capacity: 7.0 m³"
                        ]
                    },
                    prices: [
                        { item: "Sewa Alat (Include Operator)", harga: "350.000", unit: "per jam" },
                        { item: "Biaya Mobilisasi", harga: "Hubungi Kami", unit: "lumpsum" }
                    ]
                },
                {
                    id: "mobil",
                    title: "Mobil",
                    description: "Layanan penyewaan kendaraan operasional untuk mendukung mobilitas tim dan aktivitas lapangan selama proyek berlangsung.",
                    useCases: [
                        "Mobilisasi tim proyek",
                        "Pengawasan dan inspeksi lapangan",
                        "Distribusi peralatan ringan",
                        "Operasional harian di area proyek"
                    ],
                    images: [
                        {
                            src: "/images/konstruksi/mobil-proyek.jpg",
                            alt: "Mobil proyek operasional",
                            primary: true
                        }
                    ],
                    about: {
                        description: "Unit mobil operasional disewakan dalam kondisi siap pakai dengan perawatan rutin, cocok untuk kebutuhan proyek konstruksi maupun operasional perusahaan.",
                        highlights: [
                            "Tersedia dengan atau tanpa driver",
                            "Perawatan rutin & kondisi prima",
                            "Dokumen kendaraan lengkap",
                            "Siap digunakan di medan proyek"
                        ]
                    },
                    prices: [
                        { item: "Sewa Mobil (Include Driver)", harga: "xxx.xxx", unit: "per hari" },
                        { item: "Sewa Mobil (Tanpa Driver)", harga: "xxx.xxx", unit: "per hari" },
                        { item: "Biaya Mobilisasi", harga: "Hubungi Kami", unit: "lumpsum" }
                    ]
                }
            ]
    }
];

/* =========================================
   2. LOGIC UTAMA (ENGINE)
   ========================================= */
let currentSector = null;

document.addEventListener('DOMContentLoaded', () => {
    // Jalankan aplikasi saat website selesai loading
    initApp(DB_DATA);
});

function getProductFromURL() {
    const params = new URLSearchParams(window.location.search);
    return params.get('product'); // contoh: "paving"
}

function initApp(data) {
    const productContainer = document.getElementById('sector-tabs-container');
    if (!productContainer) {
        return;
    }
    if (!data || data.length === 0) return;
    
    // 1. Render Tab Sektor (Tombol Atas)
    const tabContainer = document.getElementById('sector-tabs-container');
    tabContainer.innerHTML = '';
    
    data.forEach(sector => {
        const btn = document.createElement('button');
        // Style default tombol mati
        btn.className = `sector-btn flex-shrink-0 px-6 py-2 rounded-full font-bold shadow-sm transition-all duration-300 transform hover:scale-105 bg-white text-gray-500 text-sm whitespace-nowrap border border-gray-100`;
        
        const label = sector.label || sector.name; 

        btn.innerHTML = `<span></span> ${label}`;
        btn.onclick = () => activateSector(sector.id); 
        btn.dataset.id = sector.id;
        
        tabContainer.appendChild(btn);
    });

    // 2. Cek apakah ada produk dari URL
    const productFromURL = getProductFromURL();

    if (productFromURL) {
        // Cari sektor mana yang punya produk tsb
        const sectorWithProduct = data.find(sector =>
            sector.items.some(item => item.id === productFromURL)
        );

        if (sectorWithProduct) {
            activateSector(sectorWithProduct.id);

            // render produk spesifik (override default)
            setTimeout(() => {
                renderItemContent(productFromURL);
            }, 0);
        } else {
            // fallback
            activateSector(data[0].id);
        }
    } else {
        // default behavior lama
        activateSector(data[0].id);
    }
}

function activateSector(sectorId) {
    // A. Cari Data Sektor di Database
    const sectorData = DB_DATA.find(s => s.id === sectorId);
    if (!sectorData) return;
    currentSector = sectorData;

    // B. Ubah Warna Tombol Tab (Active State)
    document.querySelectorAll('.sector-btn').forEach(btn => {
        if (btn.dataset.id === sectorId) {
            btn.classList.remove('bg-white', 'text-gray-500');
            btn.classList.add('bg-[#334168]', 'text-white'); // Warna Aktif
        } else {
            btn.classList.add('bg-white', 'text-gray-500');
            btn.classList.remove('bg-[#334168]', 'text-white');
        }
    });

    // C. Render Sidebar & Dropdown HP
    renderSidebarAndDropdown(sectorData.items);

    // D. Otomatis pilih produk pertama di sektor itu
    if (sectorData.items.length > 0) {
        renderItemContent(sectorData.items[0].id);
    }
}

function renderSidebarAndDropdown(items) {
    const sidebarContainer = document.getElementById('sidebar-list-container');
    const mobileSelect = document.getElementById('mobile-product-select');
    
    sidebarContainer.innerHTML = '';
    mobileSelect.innerHTML = '';

    items.forEach(item => {
        // Buat Tombol Sidebar
        const btn = document.createElement('button');
        btn.className = `sidebar-item w-full text-left px-4 py-3 rounded-xl text-sm font-semibold transition-all hover:bg-gray-50 flex justify-between group text-gray-600`;
        btn.dataset.itemId = item.id;
        btn.innerHTML = `${item.title} <span class="opacity-0 group-hover:opacity-100 transition-opacity">→</span>`;
        btn.onclick = () => renderItemContent(item.id);
        sidebarContainer.appendChild(btn);

        // Buat Opsi Dropdown HP
        const opt = document.createElement('option');
        opt.value = item.id;
        opt.textContent = item.title;
        mobileSelect.appendChild(opt);
    });

    // Aksi saat Dropdown HP berubah
    mobileSelect.onchange = (e) => renderItemContent(e.target.value);
}

function renderItemContent(itemId) {
    const item = currentSector.items.find(i => i.id === itemId);
    if (!item) return;

    // 1. Highlight Tombol Sidebar yang aktif
    document.querySelectorAll('.sidebar-item').forEach(btn => {
        if (btn.dataset.itemId === itemId) {
            btn.classList.remove('text-gray-600', 'hover:bg-gray-50');
            btn.classList.add('bg-[#334168]', 'text-white', 'shadow-md', 'translate-x-2');
        } else {
            btn.classList.add('text-gray-600', 'hover:bg-gray-50');
            btn.classList.remove('bg-[#334168]', 'text-white', 'shadow-md', 'translate-x-2');
        }
    });

    // 2. Sinkronkan Dropdown HP
    const mobileSelect = document.getElementById('mobile-product-select');
    if(mobileSelect) mobileSelect.value = itemId;

    // 3. Render Canvas Utama (Cek Tipe Layout!)
    const canvas = document.getElementById('main-content-canvas');
    canvas.innerHTML = ''; // Bersihkan canvas

    if (currentSector.layoutType === 'catalog') {
        // === TAMPILAN MANUFAKTUR (Accordion & Gallery) ===
        canvas.innerHTML = getCatalogHTML(item);
        
        // Isi data detail (Gallery, UseCases, Accordion)
        if(item.images) renderImages(item.images);
        if(item.useCases) renderUseCases(item.useCases);
        if(item.about) renderAbout(item.about);
        if(item.prices) renderTableData('prices', item.prices);
        if(item.models) renderTableData('models', item.models);
        if(item.colors) renderTableData('colors', item.colors);
        
        // Logic Accordion
        syncAccordions(item); 
        resetAccordionUI();   

    } else if (currentSector.layoutType === 'rental') {
        // === TAMPILAN KONSTRUKSI (Sewa Alat) ===
        canvas.innerHTML = getRentalHTML(item);
        
        // Efek Fade In gambar
        const img = document.getElementById('rental-main-image');
        if(img) {
            img.style.opacity = 0;
            setTimeout(() => { img.style.opacity = 1; }, 100);
        }
    }
}


// Template 1: Tampilan Katalog (Manufaktur)
function getCatalogHTML(item) {
    return `
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-4 md:p-8">
            <div class="border-b border-gray-100 pb-6 mb-6">
                <h2 class="text-3xl font-extrabold text-[#334168] mb-2">${item.title}</h2>
                <p class="text-gray-500 text-sm md:text-base leading-relaxed">${item.description}</p>
                <ul id="product-usecases" class="flex flex-wrap gap-2 mt-4"></ul>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div class="aspect-[4/3] bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 flex items-center justify-center relative">
                        <img id="mainImage" src="" class="w-full h-full object-contain p-4 transition duration-500" alt="${item.title}">
                    </div>
                    <div id="product-thumbs" class="flex gap-3 overflow-x-auto pb-2 scrollbar-hide"></div>
                </div>

                <div class="space-y-3">
                    ${getAccordionHTML(0, 'Tentang Produk', 'about')}
                    ${getAccordionHTML(1, 'Daftar Harga & Spesifikasi', 'prices', true)} 
                    ${getAccordionHTML(2, 'Model & Ukuran', 'models', true)}
                    ${getAccordionHTML(3, 'Pewarnaan', 'colors', true)}
                </div>
            </div>
        </div>
    `;
}

// Template 2: Tampilan Sewa (Konstruksi)
function getRentalHTML(item) {
    // Generate HTML Spesifikasi
    let specsHTML = '';
    if(item.specs) {
        specsHTML = item.specs.map(s => `
            <div>
                <span class="text-gray-500 block text-xs uppercase tracking-wide">${s.label}</span>
                <span class="font-bold text-[#334168] text-sm">${s.value}</span>
            </div>
        `).join('');
    }

    return `
        <div class="bg-white rounded-3xl border border-gray-200 overflow-hidden shadow-sm flex flex-col md:flex-row">
            <div class="w-full md:w-5/12 bg-gray-100 relative group min-h-[300px] flex items-center justify-center p-6">
                <img id="rental-main-image" src="${item.image}" class="max-w-full max-h-[300px] object-contain drop-shadow-xl transition-opacity duration-500" alt="${item.title}">
            </div>
            <div class="w-full md:w-7/12 p-8 flex flex-col justify-center">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-2xl font-bold text-[#334168]">${item.title}</h3>
                        <p class="text-gray-500 text-sm">${item.subtitle || ''}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-400 uppercase font-semibold">Harga Sewa Mulai</p>
                        <p class="text-xl font-bold text-[#F88008]">${item.price}<span class="text-sm text-gray-500 font-normal">${item.unit}</span></p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-6">${item.description || ''}</p>
                
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Spesifikasi Teknis</h4>
                    <div class="grid grid-cols-2 gap-y-3 gap-x-8 text-sm">
                        ${specsHTML}
                    </div>
                </div>
            </div>
        </div>
    `;
}

// Helper: Membuat HTML Accordion
function getAccordionHTML(idx, title, type, isTable = false) {
    let contentInner = '';
    
    if (type === 'about') {
        contentInner = `<p id="about-desc" class="mb-3"></p><ul id="about-list" class="space-y-2"></ul>`;
    } else if (isTable) {
        // Siapkan tempat untuk Tabel
        contentInner = `
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead id="${type}-head" class="bg-[#334168] text-white"></thead>
                    <tbody id="${type}-table" class="divide-y divide-gray-100"></tbody>
                </table>
            </div>
        `;
    }

    return `
        <div class="border border-gray-200 rounded-xl overflow-hidden" data-accordion="${type}">
            <button onclick="toggleAccordion(${idx})" class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 font-bold text-[#334168] transition text-sm md:text-base">
                <span>${title}</span>
                <span id="icon-${idx}" class="text-xl font-mono">+</span>
            </button>
            <div id="content-${idx}" class="hidden p-0 bg-white border-t border-gray-100">
                <div class="${type === 'about' ? 'p-5 text-sm text-gray-600 leading-relaxed' : ''}">
                    ${contentInner}
                </div>
            </div>
        </div>
    `;
}


// Render Galeri Foto
function renderImages(images) {
    const main = document.getElementById("mainImage");
    const thumbs = document.getElementById("product-thumbs");
    if(!main || !thumbs) return;

    thumbs.innerHTML = ""; 

    if (!images || images.length === 0) {
        main.src = "/images/placeholder.png";
        return;
    }

    const primary = images.find(i => i.primary) || images[0];
    main.src = primary.src;

    images.forEach(img => {
        const btn = document.createElement('button');
        const isSelected = img.src === main.src;
        btn.className = `border-2 rounded-lg p-0.5 transition flex-shrink-0 h-11 w-11 ${isSelected ? 'border-[#F88008]' : 'border-transparent'}`;
        btn.innerHTML = `<img src="${img.src}" class="w-full h-full object-cover rounded-md">`;
        btn.onclick = () => {
            main.src = img.src;
            // Reset border semua thumb
            Array.from(thumbs.children).forEach(b => {
                b.classList.remove('border-[#F88008]');
                b.classList.add('border-transparent');
            });
            btn.classList.remove('border-transparent');
            btn.classList.add('border-[#F88008]');
        };
        thumbs.appendChild(btn);
    });
}

// Render Tags (Use Cases)
function renderUseCases(items) {
    const ul = document.getElementById("product-usecases");
    if(!ul) return;
    ul.innerHTML = items.map(text => `
        <li class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 text-[#334168] text-xs font-bold border border-blue-100">
            <span class="mr-1">✓</span> ${text}
        </li>
    `).join('');
}

// Render About
function renderAbout(data) {
    const desc = document.getElementById("about-desc");
    const ul = document.getElementById("about-list");
    if(desc) desc.textContent = data.description || "";
    if(ul && data.highlights) {
        ul.innerHTML = data.highlights.map(item => `
            <li class="flex items-start gap-3 text-sm text-gray-700">
                <span class="mt-1.5 h-1.5 w-1.5 bg-[#F88008] rounded-full flex-shrink-0"></span>
                <span>${item}</span>
            </li>
        `).join('');
    }
}

// Render Table Dinamis (Bisa untuk Harga atau Model)
function renderTableData(tableId, data) {
    const thead = document.getElementById(`${tableId}-head`);
    const tbody = document.getElementById(`${tableId}-table`);
    if(!thead || !tbody) return;

    thead.innerHTML = "";
    tbody.innerHTML = "";

    if (!data || data.length === 0) return;

    // 1. Buat Header Otomatis dari Keys JSON
    const columns = Object.keys(data[0]);
    
    let headHtml = '<tr>';
    columns.forEach(col => {
        // Panggil formatHeader(col) disini
        headHtml += `<th class="px-4 py-3 text-xs uppercase tracking-tighter font-bold text-left text-white bg-[#334168]">
            ${formatHeader(col)} 
        </th>`;
    });
    headHtml += '</tr>';
    thead.innerHTML = headHtml;
    // -----------------------------

    // 2. Isi Baris Data
    data.forEach((row, index) => {
        const bg = index % 2 === 0 ? 'bg-white' : 'bg-gray-50';
        const rowsHtml = columns.map(col => `
            <td class="px-4 py-2 text-gray-700 border-b border-gray-100 text-sm">
                ${row[col] ?? "-"}
            </td>
        `).join("");
        tbody.innerHTML += `<tr class="${bg} hover:bg-orange-50 transition">${rowsHtml}</tr>`;
    });
}

function formatHeader(key) {
    const map = {
        mutu: "Produk",
        cm6: "6 cm",
        cm8: "8 cm",
        dim3: "3 Dim",
        type: "Tipe",
        size: "Ukuran",
        spec: "Spesifikasi",
        price: "Harga",
        unit: "Satuan",
        name: "Warna"
    };

    return map[key] || key.replace(/_/g, " ");
}

// Buka Tutup Accordion
window.toggleAccordion = function(index) {
    // Tutup semua dulu
    document.querySelectorAll('[id^="content-"]').forEach(el => el.classList.add('hidden'));
    document.querySelectorAll('[id^="icon-"]').forEach(el => el.textContent = '+');
    
    // Buka yang diklik
    const content = document.getElementById(`content-${index}`);
    const icon = document.getElementById(`icon-${index}`);
    if (content && content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        if(icon) icon.textContent = '−';
    }
};

// Reset Accordion (Buka yang pertama saja)
function resetAccordionUI() {
    document.querySelectorAll('[id^="content-"]').forEach(el => el.classList.add('hidden'));
    const first = document.getElementById('content-0');
    const firstIcon = document.getElementById('icon-0');
    if(first) {
        first.classList.remove('hidden');
        if(firstIcon) firstIcon.textContent = '−';
    }
}

// Sembunyikan Accordion jika datanya kosong
function syncAccordions(item) {
    const map = {
        about: !!item.about,
        prices: Array.isArray(item.prices) && item.prices.length > 0,
        models: Array.isArray(item.models) && item.models.length > 0,
        colors: Array.isArray(item.colors) && item.colors.length > 0
    };

    document.querySelectorAll("[data-accordion]").forEach(section => {
        const key = section.dataset.accordion;
        if (!map[key]) section.classList.add("hidden");
        else section.classList.remove("hidden");
    });
}