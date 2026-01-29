<x-production.layout>
    {{-- Library Tambahan --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- Plugin Label Angka --}}
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- WRAPPER UTAMA: Full Screen --}}
    <div x-data="dashboardHandler()" class="w-full h-screen bg-slate-50 flex flex-col overflow-hidden font-sans text-slate-800">
        
        {{-- 1. HEADER --}}
        <div class="flex-none bg-white border-b border-gray-200 shadow-sm z-40">
            <div class="w-full px-8 py-4 flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-[#334168] to-[#1e293b] flex items-center justify-center text-white shadow-lg shadow-blue-900/20">
                        <i class="fa-solid fa-boxes-stacked text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-extrabold tracking-tight text-[#334168] leading-none">
                            Inventory Command Center
                        </h2>
                        <div class="flex items-center gap-2 text-sm font-bold text-gray-500 uppercase tracking-wide mt-1">
                            <span class="relative flex h-2.5 w-2.5">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
                            </span>
                            Live Monitoring • <span x-text="currentTime"></span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button class="flex items-center gap-2 px-6 py-3 bg-white border border-gray-200 rounded-xl text-gray-600 hover:bg-gray-50 transition shadow-sm font-bold text-base">
                        <i class="fa-solid fa-file-arrow-down text-[#334168]"></i> Laporan
                    </button>
                    {{-- Button Purchase Order dihapus/disembunyikan jika ingin lebih bersih, atau biarkan tetap ada --}}
                </div>
            </div>
        </div>

        {{-- 2. MAIN CONTENT --}}
        <div class="flex-1 w-full px-8 py-6 flex flex-col gap-6 overflow-hidden">

            {{-- SECTION ATAS: MATERIAL CARDS --}}
            {{-- Height diset 42% agar cukup untuk font besar tapi sisa layar cukup untuk grafik --}}
            <div class="h-[42%] flex flex-col">
                <div class="flex justify-between items-end mb-3 flex-none">
                    <h3 class="text-2xl font-bold text-[#334168]">Detail Stok Material</h3>
                    <div class="flex gap-4">
                        <div class="flex items-center gap-2 text-sm text-gray-600 font-bold"><span class="w-2.5 h-2.5 rounded-full bg-green-500"></span> Aman</div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 font-bold"><span class="w-2.5 h-2.5 rounded-full bg-yellow-400"></span> Warning</div>
                        <div class="flex items-center gap-2 text-sm text-gray-600 font-bold"><span class="w-2.5 h-2.5 rounded-full bg-red-500"></span> Critical</div>
                    </div>
                </div>

                <div class="flex-1 grid grid-cols-3 grid-rows-2 gap-4 h-full">
                    @foreach($materials as $item)
                        @php
                            $percent = ($item['current'] / $item['max']) * 100;
                            $status = 'Aman';
                            $statusColor = 'bg-green-100 text-green-700 border-green-200';
                            $barColor = 'bg-[#334168]';
                            $iconBg = 'bg-slate-100 text-[#334168]';
                            
                            if($percent < 50) {
                                $status = 'Warning';
                                $statusColor = 'bg-yellow-100 text-yellow-700 border-yellow-200';
                                $barColor = 'bg-yellow-400';
                            }
                            if($percent < 30) {
                                $status = 'Critical';
                                $statusColor = 'bg-red-100 text-red-700 border-red-200 animate-pulse';
                                $barColor = 'bg-[#F88008]';
                                $iconBg = 'bg-orange-100 text-[#F88008]';
                            }
                        @endphp
                        
                        <div class="bg-white rounded-2xl p-4 border border-gray-100 shadow-sm flex flex-col justify-between h-full group hover:border-blue-200 transition-colors">
                            {{-- Header Card --}}
                            <div class="flex justify-between items-start">
                                <div class="flex items-center gap-3">
                                    <div class="h-11 w-11 rounded-xl {{ $iconBg }} flex items-center justify-center text-lg transition-colors duration-300">
                                        <i class="fa-solid {{ $item['icon'] }}"></i>
                                    </div>
                                    <div>
                                        {{-- FONT NAMA DIPERBESAR --}}
                                        <h4 class="font-extrabold text-gray-800 text-lg leading-tight">{{ $item['name'] }}</h4>
                                        <span class="inline-block px-2.5 py-0.5 rounded text-xs font-bold uppercase border mt-1 {{ $statusColor }}">
                                            {{ $status }}
                                        </span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Kapasitas</p>
                                    <p class="text-sm font-bold text-gray-700">{{ $item['max'] }} {{ $item['unit'] }}</p>
                                </div>
                            </div>

                            {{-- Body Card (Angka Besar) --}}
                            <div>
                                <div class="flex items-end justify-between mb-1">
                                    <div class="flex items-baseline gap-1.5">
                                        {{-- ANGKA UTAMA SANGAT BESAR --}}
                                        <span class="text-5xl font-black text-gray-800 group-hover:text-[#334168] transition-colors">
                                            {{ $item['current'] }}
                                        </span>
                                        <span class="text-base font-bold text-gray-500">{{ $item['unit'] }}</span>
                                    </div>
                                </div>

                                <div class="w-full bg-gray-100 rounded-full h-3 mb-1.5 overflow-hidden">
                                    <div class="{{ $barColor }} h-3 rounded-full transition-all duration-1000 ease-out" style="width: {{ $percent }}%"></div>
                                </div>
                                <div class="flex justify-between text-xs font-bold text-gray-500">
                                    <span>0%</span>
                                    <span>{{ round($percent) }}% Terisi</span>
                                    <span>100%</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- SECTION BAWAH: CHART & MUTASI --}}
            <div class="flex-1 grid grid-cols-1 xl:grid-cols-3 gap-6 min-h-0">
                
                {{-- Chart Section --}}
                <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col h-full">
                    <div class="flex justify-between items-center mb-2 flex-none">
                        <h3 class="text-xl font-bold text-[#334168]">Analisis Komposisi Stok</h3>
                        <span class="text-xs font-bold text-gray-500 bg-gray-100 px-3 py-1.5 rounded-lg">Real-time Data</span>
                    </div>
                    <div class="flex-1 relative w-full min-h-0">
                        <canvas id="interactiveStockChart"></canvas>
                    </div>
                </div>

                {{-- Mutasi Section --}}
                <div class="xl:col-span-1 bg-white rounded-2xl shadow-sm border border-gray-100 flex flex-col h-full overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex-none flex justify-between items-center">
                        <h3 class="text-xl font-bold text-[#334168]">Mutasi Stok</h3>
                        <i class="fa-solid fa-clock-history text-gray-400 text-xl"></i>
                    </div>
                    
                    <div class="flex-1 overflow-y-auto px-6 py-2 custom-scrollbar">
                        {{-- Loop Mutasi Item --}}
                        <div class="py-4 border-b border-dashed border-gray-100 last:border-0 group">
                            <div class="flex justify-between items-center mb-2">
                                {{-- Font diperbesar --}}
                                <span class="text-base font-bold text-gray-800 group-hover:text-[#334168] transition">Semen</span>
                                <span class="text-[10px] font-bold px-2.5 py-1 bg-slate-100 text-slate-600 rounded-full">Hari Ini</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-sm font-bold text-red-600 bg-red-50 border border-red-100 px-3 py-2 rounded-lg flex items-center gap-2 w-full">
                                    <i class="fa-solid fa-arrow-down"></i> Keluar 50 Sak
                                </span>
                            </div>
                        </div>

                        <div class="py-4 border-b border-dashed border-gray-100 last:border-0 group">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-base font-bold text-gray-800 group-hover:text-[#334168] transition">Pasir</span>
                                <span class="text-[10px] font-bold px-2.5 py-1 bg-slate-100 text-slate-600 rounded-full">Hari Ini</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-sm font-bold text-green-700 bg-green-50 border border-green-100 px-3 py-2 rounded-lg flex items-center gap-2 w-full">
                                    <i class="fa-solid fa-arrow-up"></i> Masuk 20 Ton
                                </span>
                            </div>
                        </div>

                        <div class="py-4 border-b border-dashed border-gray-100 last:border-0 group">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-base font-bold text-gray-800 group-hover:text-[#334168] transition">Abu Batu</span>
                                <span class="text-[10px] font-bold px-2.5 py-1 bg-slate-100 text-slate-600 rounded-full">Kemarin</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-sm font-bold text-red-600 bg-red-50 border border-red-100 px-3 py-2 rounded-lg flex items-center gap-2 w-full">
                                    <i class="fa-solid fa-arrow-down"></i> Keluar 10 Ton
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- STYLES --}}
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>

    {{-- SCRIPTS --}}
    <script>
        function dashboardHandler() {
            // Register Plugin DataLabels
            Chart.register(ChartDataLabels);

            return {
                currentTime: new Date().toLocaleTimeString('id-ID', {hour: '2-digit', minute:'2-digit'}),
                chartInstance: null,
                materials: @json($materials),

                init() {
                    this.renderChart();
                    setInterval(() => {
                        this.currentTime = new Date().toLocaleTimeString('id-ID', {hour: '2-digit', minute:'2-digit'});
                    }, 60000);
                },

                renderChart() {
                    const ctx = document.getElementById('interactiveStockChart').getContext('2d');
                    
                    let gradient = ctx.createLinearGradient(0, 0, 0, 300);
                    gradient.addColorStop(0, '#334168');
                    gradient.addColorStop(1, '#64748b');

                    this.chartInstance = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: this.materials.map(m => m.name),
                            datasets: [{
                                label: 'Jumlah Stok',
                                data: this.materials.map(m => m.current),
                                backgroundColor: (ctx) => {
                                    const index = ctx.dataIndex;
                                    const item = this.materials[index];
                                    return (item.current / item.max < 0.3) ? '#F88008' : gradient;
                                },
                                borderRadius: 6,
                                barPercentage: 0.6,
                                categoryPercentage: 0.8
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    top: 30 // Padding atas ditambah untuk label angka besar
                                }
                            },
                            plugins: {
                                legend: { display: false },
                                tooltip: { enabled: false }, // Tooltip dimatikan sesuai request
                                datalabels: { 
                                    anchor: 'end',
                                    align: 'top',
                                    color: '#334168',
                                    font: {
                                        weight: 'bold',
                                        size: 16 // FONT ANGKA DI GRAFIK DIPERBESAR
                                    },
                                    formatter: function(value, context) {
                                        return value;
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grid: { borderDash: [2, 4], color: '#f1f5f9' },
                                    ticks: { 
                                        font: {size: 14, weight: 'bold'}, // Font Y-Axis diperbesar
                                        color: '#94a3b8' 
                                    }
                                },
                                x: {
                                    grid: { display: false },
                                    ticks: { 
                                        font: {size: 14, weight: 'bold'}, // Font X-Axis (Nama Barang) diperbesar
                                        color: '#334168' 
                                    }
                                }
                            }
                        }
                    });
                }
            }
        }
    </script>
</x-production.layout>