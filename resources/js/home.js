document.addEventListener('DOMContentLoaded', () => {
    // Panggil fungsi inisialisasi saat web selesai dimuat
    initHomeTabs();
});

function initHomeTabs() {
    const tabWrapper = document.getElementById('home-tabs-wrapper');
    const contentWrapper = document.getElementById('home-content-wrapper');
    
    // Safety Check: Pastikan elemen ada
    if(!tabWrapper || !contentWrapper) return;

    tabWrapper.innerHTML = '';
    contentWrapper.innerHTML = '';

    // AMBIL DATA DARI JEMBATAN (WINDOW)
    const data = window.SECTORS_DATA;

    // Cek jika data kosong atau undefined
    if (!data || data.length === 0) {
        contentWrapper.innerHTML = '<div class="text-center text-white/50 py-10 italic">Belum ada data sektor produk.</div>';
        return;
    }

    data.forEach(sector => {
        // A. Buat Tombol Tab
        const btn = document.createElement('button');
        btn.id = `btn-${sector.id}`;
        btn.className = `px-5 py-2 rounded-lg font-semibold text-xs md:text-sm transition-all duration-300 whitespace-nowrap flex-shrink-0 text-gray-300 hover:text-white border border-transparent`;
        btn.textContent = sector.label;
        
        // Kirim ID sektor ke fungsi switch
        btn.onclick = () => switchHomeSector(sector.id);
        
        tabWrapper.appendChild(btn);

        // B. Buat Container Konten
        const contentDiv = document.createElement('div');
        contentDiv.id = `content-${sector.id}`;
        contentDiv.className = `hidden transition-opacity duration-300 ease-in-out`; 
        
        // C. Render Slider
        contentDiv.innerHTML = renderSliderHTML(sector.items);
        
        contentWrapper.appendChild(contentDiv);
    });

    // Otomatis Aktifkan Tab Pertama
    if(data.length > 0) {
        switchHomeSector(data[0].id);
    }
}

function switchHomeSector(sectorId) {
    // Ambil data lagi dari window
    const data = window.SECTORS_DATA; 

    data.forEach(sector => {
        const btn = document.getElementById(`btn-${sector.id}`);
        const content = document.getElementById(`content-${sector.id}`);
        
        if (sector.id === sectorId) {
            // Aktifkan
            if(content) content.classList.remove('hidden');
            if(btn) {
                btn.classList.remove('text-gray-300', 'hover:text-white', 'bg-transparent');
                btn.classList.add('bg-[#F88008]', 'text-white', 'shadow-md');
            }
        } else {
            // Non-aktifkan
            if(content) content.classList.add('hidden');
            if(btn) {
                btn.classList.add('text-gray-300', 'hover:text-white', 'bg-transparent');
                btn.classList.remove('bg-[#F88008]', 'text-white', 'shadow-md');
            }
        }
    });
}

function renderSliderHTML(items) {
    if (!items || items.length === 0) {
        return '<div class="text-center text-white/50 py-12 italic">Belum ada produk di kategori ini.</div>';
    }

    const cards = items.map(item => `
        <div class="flex-shrink-0 w-[85vw] sm:w-[300px] md:min-w-[350px] bg-white rounded-2xl overflow-hidden snap-center group hover:shadow-2xl hover:shadow-orange-500/20 transition duration-300 border border-gray-100">
            <div class="h-48 bg-gray-200 relative overflow-hidden">
                <div class="absolute inset-0 bg-[#334168]/20 group-hover:bg-transparent transition"></div>
                
                <img src="${item.img}" alt="${item.name}" class="w-full h-full object-cover"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                
                <div class="w-full h-full bg-gray-300 hidden items-center justify-center text-gray-500 font-semibold text-sm">
                    <span class="text-gray-400">Image: ${item.name}</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-[#334168] mb-2 truncate">${item.name}</h3>
                <p class="text-sm text-gray-500 mb-4 line-clamp-2 min-h-[40px]">${item.desc}</p>
                <a href="/products?product=${item.slug}" 
                   class="inline-block text-[#F88008] font-bold text-sm hover:underline">
                    Lihat Spesifikasi →
                </a>
            </div>
        </div>
    `).join('');

    return `
        <div class="flex gap-6 overflow-x-auto pb-8 pt-2 snap-x scroll-smooth scrollbar-hide px-1">
            ${cards}
        </div>
    `;
}