/* =========================================
   LOGIC UTAMA (ENGINE)
   ========================================= */
let currentSector = null;

document.addEventListener('DOMContentLoaded', () => {
    // 1. Ambil data yang di-inject dari Blade
    const data = window.SECTOR_DATA;
    
    if (data && data.length > 0) {
        initApp(data);
    } else {
        document.getElementById('main-content-canvas').innerHTML = 
            `<div class="text-center py-20">Belum ada data produk.</div>`;
    }
});

function initApp(data) {
    const tabContainer = document.getElementById('sector-tabs-container');
    if (!tabContainer) return;
    
    tabContainer.innerHTML = '';

    // 1. Render Tab Sektor
    data.forEach(sector => {
        const btn = document.createElement('button');
        btn.className = `sector-btn px-6 py-2 rounded-full font-bold shadow-sm transition-all duration-300 text-sm whitespace-nowrap border border-gray-100 bg-white text-gray-500 hover:scale-105`;
        btn.innerHTML = sector.label;
        btn.onclick = () => activateSector(sector.id); 
        btn.dataset.id = sector.id;
        tabContainer.appendChild(btn);
    });

    // 2. Cek URL Parameter (misal: ?product=nama-slug)
    const params = new URLSearchParams(window.location.search);
    const productSlug = params.get('product');

    if (productSlug) {
        const foundSector = data.find(s => s.items.some(i => i.id === productSlug));
        if (foundSector) {
            activateSector(foundSector.id);
            setTimeout(() => fetchAndRenderProduct(productSlug), 100);
        } else {
            activateSector(data[0].id);
        }
    } else {
        activateSector(data[0].id);
    }
}

function activateSector(sectorId) {
    const sectorData = window.SECTOR_DATA.find(s => s.id === sectorId);
    if (!sectorData) return;
    currentSector = sectorData;

    // Update UI Tab
    document.querySelectorAll('.sector-btn').forEach(btn => {
        if (btn.dataset.id === sectorId) {
            btn.classList.remove('bg-white', 'text-gray-500');
            btn.classList.add('bg-[#334168]', 'text-white');
        } else {
            btn.classList.add('bg-white', 'text-gray-500');
            btn.classList.remove('bg-[#334168]', 'text-white');
        }
    });

    renderSidebarAndDropdown(sectorData.items);

    // Default: Buka produk pertama
    if (sectorData.items.length > 0) {
        fetchAndRenderProduct(sectorData.items[0].id);
    }
}

function renderSidebarAndDropdown(items) {
    const sidebar = document.getElementById('sidebar-list-container');
    const mobileSelect = document.getElementById('mobile-product-select');
    
    sidebar.innerHTML = '';
    mobileSelect.innerHTML = '';

    items.forEach(item => {
        // Sidebar Item
        const btn = document.createElement('button');
        btn.className = `sidebar-item w-full text-left px-4 py-3 rounded-xl text-sm font-semibold transition-all hover:bg-gray-50 flex justify-between group text-gray-600`;
        btn.dataset.itemId = item.id;
        btn.innerHTML = `${item.title} <span class="opacity-0 group-hover:opacity-100 transition-opacity">→</span>`;
        
        btn.onclick = () => {
            fetchAndRenderProduct(item.id);
            const url = new URL(window.location);
            url.searchParams.set('product', item.id);
            window.history.pushState({}, '', url);
        };
        
        sidebar.appendChild(btn);

        // Mobile Option
        const opt = document.createElement('option');
        opt.value = item.id;
        opt.textContent = item.title;
        mobileSelect.appendChild(opt);
    });

    mobileSelect.onchange = (e) => fetchAndRenderProduct(e.target.value);
}

async function fetchAndRenderProduct(slug) {
    const canvas = document.getElementById('main-content-canvas');
    
    // UI Loading
    canvas.innerHTML = `<div class="flex justify-center py-20"><div class="animate-spin rounded-full h-10 w-10 border-b-2 border-[#F88008]"></div></div>`;

    // Update Active State Sidebar
    document.querySelectorAll('.sidebar-item').forEach(btn => {
        if (btn.dataset.itemId === slug) {
            btn.classList.remove('text-gray-600', 'hover:bg-gray-50');
            btn.classList.add('bg-[#334168]', 'text-white', 'shadow-md', 'translate-x-2');
        } else {
            btn.classList.add('text-gray-600', 'hover:bg-gray-50');
            btn.classList.remove('bg-[#334168]', 'text-white', 'shadow-md', 'translate-x-2');
        }
    });

    try {
        const response = await fetch(`/api/product/${slug}`);
        if (!response.ok) throw new Error("Gagal mengambil data");
        
        const productData = await response.json();
        renderSingleProduct(productData);
        
    } catch (error) {
        canvas.innerHTML = `<div class="text-center text-red-500 py-10">Gagal memuat produk.<br><small>${error.message}</small></div>`;
    }
}

function renderSingleProduct(item) {
    const canvas = document.getElementById('main-content-canvas');
    const layout = item.layoutType || currentSector.layoutType;

    if (layout === 'catalog') {
        canvas.innerHTML = getCatalogHTML(item);
        if(item.images) renderImages(item.images);
        if(item.useCases) renderUseCases(item.useCases);
        if(item.about) renderAbout(item.about);
        if(item.prices) renderTableData('prices', item.prices);
        if(item.models) renderTableData('models', item.models);
        if(item.colors) renderTableData('colors', item.colors);
        
        syncAccordions(item);
        resetAccordionUI();
    } else {
        canvas.innerHTML = getRentalHTML(item);
        // Efek Fade In
        const img = document.getElementById('rental-main-image');
        if(img) {
            img.style.opacity = 0;
            setTimeout(() => { img.style.opacity = 1; }, 100);
        }
    }
}

// Template 1: Tampilan Katalog
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

// Template 2: Tampilan Sewa
function getRentalHTML(item) {
    let specsHTML = '';
    if(item.specs) {
        specsHTML = item.specs.map(s => `
            <div>
                <span class="text-gray-500 block text-xs uppercase tracking-wide">${s.label}</span>
                <span class="font-bold text-[#334168] text-sm">${s.value}</span>
            </div>
        `).join('');
    }

    // FIX BUG IMAGE DISINI: Ambil dari array images[0]
    const mainImg = (item.images && item.images.length > 0) ? item.images[0].src : '/images/placeholder.png';

    return `
        <div class="bg-white rounded-3xl border border-gray-200 overflow-hidden shadow-sm flex flex-col md:flex-row">
            <div class="w-full md:w-5/12 bg-gray-100 relative group min-h-[300px] flex items-center justify-center p-6">
                <img id="rental-main-image" src="${mainImg}" class="max-w-full max-h-[300px] object-contain drop-shadow-xl transition-opacity duration-500" alt="${item.title}">
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

function getAccordionHTML(idx, title, type, isTable = false) {
    let contentInner = '';
    
    if (type === 'about') {
        contentInner = `<p id="about-desc" class="mb-3"></p><ul id="about-list" class="space-y-2"></ul>`;
    } else if (isTable) {
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