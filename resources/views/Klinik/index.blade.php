<x-app-layout>
    <div 
        x-data="{
            searchQuery: '',
            bpjsFilter: 'all',
            hoursFilter: 'all',
            matchesFilter(nama, bpjsText, jamText) {
                const searchLower = this.searchQuery.toLowerCase();
                const namaLower = nama.toLowerCase();
                const matchesSearch = !this.searchQuery || namaLower.includes(searchLower);
                
                const isBpjs = bpjsText.toLowerCase().includes('bpjs') && !bpjsText.toLowerCase().includes('tidak');
                let matchesBpjs = true;
                if (this.bpjsFilter === 'bpjs') matchesBpjs = isBpjs;
                if (this.bpjsFilter === 'non-bpjs') matchesBpjs = !isBpjs;

                const is24Jam = jamText.toLowerCase().includes('24 jam');
                let matchesHours = true;
                if (this.hoursFilter === '24jam') matchesHours = is24Jam;

                return matchesSearch && matchesBpjs && matchesHours;
            }
        }" 
        class="min-h-screen bg-[#fffdfa] font-sans py-8 px-4 sm:px-6 lg:px-8"
    >
        <div class="max-w-7xl mx-auto">
            
            <!-- Page Header -->
            <div class="mb-8 pb-6 border-b border-amber-100">
                <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-semibold uppercase tracking-wider mb-2">
                    Katalog Faskes Pekanbaru
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">Daftar Klinik Kesehatan</h1>
                <p class="text-sm text-gray-500 mt-1">Temukan informasi jam operasional, status penerimaan BPJS, dan lokasi presisi klinik di Pekanbaru.</p>
                
                <!-- Interactive Filter Controls -->
                <div class="mt-6 flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4 bg-white p-4 rounded-2xl shadow-sm border border-amber-100">
                    
                    <!-- Search Input -->
                    <div class="relative flex-1">
                        <input 
                            type="text" 
                            x-model="searchQuery" 
                            placeholder="Cari nama klinik (misal: Misbah, Pratama, Dental)..." 
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 bg-gray-50/50"
                        />
                        <svg class="w-4 h-4 absolute left-3.5 top-3 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>

                    <!-- BPJS Filter Buttons -->
                    <div class="flex items-center gap-2 overflow-x-auto pb-1 md:pb-0">
                        <button 
                            @click="bpjsFilter = 'all'" 
                            :class="bpjsFilter === 'all' ? 'bg-[#ff9900] text-white shadow-sm font-semibold' : 'bg-gray-100 text-gray-600 hover:bg-amber-50'"
                            class="px-3.5 py-2 rounded-xl text-xs transition whitespace-nowrap"
                        >
                            Semua BPJS
                        </button>
                        <button 
                            @click="bpjsFilter = 'bpjs'" 
                            :class="bpjsFilter === 'bpjs' ? 'bg-emerald-600 text-white shadow-sm font-semibold' : 'bg-gray-100 text-gray-600 hover:bg-emerald-50'"
                            class="px-3.5 py-2 rounded-xl text-xs transition whitespace-nowrap flex items-center gap-1"
                        >
                            <span>✓</span> Menerima BPJS
                        </button>
                        <button 
                            @click="bpjsFilter = 'non-bpjs'" 
                            :class="bpjsFilter === 'non-bpjs' ? 'bg-amber-600 text-white shadow-sm font-semibold' : 'bg-gray-100 text-gray-600 hover:bg-amber-50'"
                            class="px-3.5 py-2 rounded-xl text-xs transition whitespace-nowrap"
                        >
                            Umum / Non-BPJS
                        </button>
                        <button 
                            @click="hoursFilter = hoursFilter === '24jam' ? 'all' : '24jam'" 
                            :class="hoursFilter === '24jam' ? 'bg-blue-600 text-white shadow-sm font-semibold' : 'bg-gray-100 text-gray-600 hover:bg-blue-50'"
                            class="px-3.5 py-2 rounded-xl text-xs transition whitespace-nowrap flex items-center gap-1"
                        >
                            <span>⏰</span> Buka 24 Jam
                        </button>
                    </div>

                </div>
            </div>

            <!-- Klinik Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($kliniks as $loopIndex => $klinik)
                    @php
                        $nama = $klinik->data['Nama Klinik'] ?? '';
                        $bpjs = $klinik->data['BPJS/tidak BPJS'] ?? '';
                        $jam = $klinik->data['Jam Operasional'] ?? '';
                        $harga = $klinik->data['Harga'] ?? '';
                        $lat = $klinik->data['Lintang'] ?? 0;
                        $lng = $klinik->data['Bujur'] ?? 0;
                        $rating = $klinik->data['Rating'] ?? '4.0';

                        $namaLower = strtolower($nama);
                        $bpjsLower = strtolower($bpjs);
                        $isBpjs = str_contains($bpjsLower, 'bpjs') && !str_contains($bpjsLower, 'tidak');

                        // Dynamic Thumbnail Logic
                        if (str_contains($namaLower, 'dental') || str_contains($namaLower, 'gigi')) {
                            $imgSrc = url('/images/dental_clinic.jpg');
                        } elseif (str_contains($namaLower, 'utama') || str_contains($namaLower, 'centre') || str_contains($namaLower, 'medical')) {
                            $imgSrc = url('/images/clinic_modern.jpg');
                        } elseif (str_contains($namaLower, 'dr') || str_contains($namaLower, 'dokter') || str_contains($namaLower, 'praktek')) {
                            $imgSrc = url('/images/doctor_consultation.jpg');
                        } else {
                            $images = [
                                url('/images/img1.png'),
                                url('/images/img2.png'),
                                url('/images/img3.png'),
                                url('/images/clinic_modern.jpg')
                            ];
                            $imgSrc = $images[$loopIndex % count($images)];
                        }

                        // Map Target Link with Query Parameters for Auto Zoom & Highlight
                        $mapTargetUrl = route('map') . '?' . http_build_query([
                            'lat' => $lat,
                            'lng' => $lng,
                            'name' => $nama,
                            'jam' => $jam,
                            'harga' => $harga,
                            'bpjs' => $bpjs,
                        ]);
                    @endphp

                    <div 
                        x-show="matchesFilter('{{ addslashes($nama) }}', '{{ addslashes($bpjs) }}', '{{ addslashes($jam) }}')"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        class="bg-white rounded-2xl border border-amber-100 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden flex flex-col justify-between group"
                    >
                        <!-- Thumbnail Image -->
                        <div class="relative h-48 w-full overflow-hidden bg-gray-100">
                            <img src="{{ $imgSrc }}" alt="{{ $nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            
                            <!-- Badges Overlay -->
                            <div class="absolute top-3 left-3 flex gap-2">
                                @if($isBpjs)
                                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-md">
                                        ✓ Menerima BPJS
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-500 text-white shadow-md">
                                        Umum / Non-BPJS
                                    </span>
                                @endif
                            </div>

                            <div class="absolute bottom-3 right-3 bg-black/60 backdrop-blur-md px-2.5 py-1 rounded-lg text-xs font-bold text-amber-300 flex items-center">
                                ⭐ {{ $rating }}
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-base font-bold text-gray-800 group-hover:text-amber-600 transition-colors line-clamp-1 mb-2">
                                    {{ $nama }}
                                </h3>

                                <div class="space-y-2 text-xs text-gray-600 mb-4">
                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-amber-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span class="font-medium">Jam: {{ $jam }}</span>
                                    </div>
                                    <div class="flex items-start text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        <span class="line-clamp-2">Biaya: {{ $harga }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4 border-t border-gray-100 flex items-center justify-between text-xs">
                                <span class="text-gray-400 font-mono flex items-center">
                                    📍 {{ number_format((float)$lat, 3) }}, {{ number_format((float)$lng, 3) }}
                                </span>
                                <a href="{{ $mapTargetUrl }}" class="font-bold text-amber-600 hover:text-amber-700 hover:underline flex items-center">
                                    Lihat di Peta &rarr;
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
