<x-app-layout>
    <div class="min-h-screen bg-[#fffdfa] font-sans py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            
            <!-- Title & Search Bar -->
            <div class="text-center max-w-3xl mx-auto mb-10">
                <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-semibold uppercase tracking-wider mb-2">
                    Eksplorasi Faskes & Event
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-3">Eksplorasi Klinik Kesehatan</h1>
                <p class="text-sm text-gray-500 mb-6">Cari klinik spesialis, layanan BPJS, dan kegiatan kesehatan masyarakat di Pekanbaru.</p>
                
                <div class="flex flex-col sm:flex-row items-center gap-3 bg-white p-2.5 rounded-2xl shadow-lg border border-amber-100">
                    <div class="relative w-full">
                        <input type="text" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500" placeholder="Cari nama klinik, layanan, atau lokasi..." />
                        <svg class="w-5 h-5 absolute left-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <div class="flex gap-2 w-full sm:w-auto">
                        <select class="px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-medium bg-gray-50 focus:outline-none focus:ring-2 focus:ring-amber-500 text-gray-700">
                            <option>Semua Kategori</option>
                            <option>Klinik Pratama</option>
                            <option>Klinik Utama</option>
                            <option>Spesialis Gigi</option>
                        </select>
                        <button class="px-5 py-2.5 bg-[#ff9900] hover:bg-amber-600 text-white font-semibold text-sm rounded-xl shadow-md transition whitespace-nowrap">
                            Cari
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl border border-amber-100 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden flex flex-col justify-between group">
                    <a href="{{ route('detail') }}">
                        <div class="relative h-48 w-full overflow-hidden bg-gray-100">
                            <img src="{{ url('/images/clinic_modern.jpg') }}" alt="Klinik Utama Mutiara Hati" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            <div class="absolute top-3 left-3">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-500 text-white shadow-md">Klinik Utama</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-base font-bold text-gray-800 group-hover:text-amber-600 transition-colors mb-2">Klinik Utama Mutiara Hati</h3>
                            <p class="text-xs text-gray-600 mb-3">Layanan UGD 24 Jam, Poli Gigi, Poli Anak, USG 2D/4D</p>
                            <div class="flex items-center justify-between text-xs text-gray-500 pt-3 border-t border-gray-100">
                                <span>📍 Senapelan, Pekanbaru</span>
                                <span class="text-amber-600 font-semibold">⭐ 5.0</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-2xl border border-amber-100 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden flex flex-col justify-between group">
                    <a href="{{ route('detail') }}">
                        <div class="relative h-48 w-full overflow-hidden bg-gray-100">
                            <img src="{{ url('/images/doctor_consultation.jpg') }}" alt="Klinik Dr Misbah Yosudarso" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            <div class="absolute top-3 left-3">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-md">BPJS Kesehatan</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-base font-bold text-gray-800 group-hover:text-amber-600 transition-colors mb-2">Klinik Dr Misbah Yosudarso</h3>
                            <p class="text-xs text-gray-600 mb-3">Buka 24 Jam, Rawat Inap, Poli Umum & Spesialis</p>
                            <div class="flex items-center justify-between text-xs text-gray-500 pt-3 border-t border-gray-100">
                                <span>📍 Yos Sudarso, Pekanbaru</span>
                                <span class="text-amber-600 font-semibold">⭐ 3.6</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-2xl border border-amber-100 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden flex flex-col justify-between group">
                    <a href="{{ route('detail') }}">
                        <div class="relative h-48 w-full overflow-hidden bg-gray-100">
                            <img src="{{ url('/images/dental_clinic.jpg') }}" alt="Tatjana Dental Care" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            <div class="absolute top-3 left-3">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-cyan-600 text-white shadow-md">Spesialis Gigi</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-base font-bold text-gray-800 group-hover:text-amber-600 transition-colors mb-2">Tatjana Dental Care</h3>
                            <p class="text-xs text-gray-600 mb-3">Pembersihan Karang Gigi, Penambalan, & Perawatan Estetika</p>
                            <div class="flex items-center justify-between text-xs text-gray-500 pt-3 border-t border-gray-100">
                                <span>📍 Sukajadi, Pekanbaru</span>
                                <span class="text-amber-600 font-semibold">⭐ 4.8</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-2xl border border-amber-100 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden flex flex-col justify-between group">
                    <a href="{{ route('detail') }}">
                        <div class="relative h-48 w-full overflow-hidden bg-gray-100">
                            <img src="{{ url('/images/img1.png') }}" alt="Klinik Pratama Bunda Medical Centre" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            <div class="absolute top-3 left-3">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-500 text-white shadow-md">Klinik Pratama</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-base font-bold text-gray-800 group-hover:text-amber-600 transition-colors mb-2">Klinik Pratama Bunda Medical (BMC)</h3>
                            <p class="text-xs text-gray-600 mb-3">Buka 24 Jam, Poli Spesialis, IGD, & Cek Kesehatan Sekeluarga</p>
                            <div class="flex items-center justify-between text-xs text-gray-500 pt-3 border-t border-gray-100">
                                <span>📍 Tampan, Pekanbaru</span>
                                <span class="text-amber-600 font-semibold">⭐ 4.7</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 5 -->
                <div class="bg-white rounded-2xl border border-amber-100 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden flex flex-col justify-between group">
                    <a href="{{ route('detail') }}">
                        <div class="relative h-48 w-full overflow-hidden bg-gray-100">
                            <img src="{{ url('/images/img2.png') }}" alt="Klinik Rumbai Sehat" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            <div class="absolute top-3 left-3">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-md">BPJS Kesehatan</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-base font-bold text-gray-800 group-hover:text-amber-600 transition-colors mb-2">Klinik Rumbai Sehat</h3>
                            <p class="text-xs text-gray-600 mb-3">Poli Umum, Cek Kesehatan Rutin, Scaling Gigi, & Pengobatan Umum</p>
                            <div class="flex items-center justify-between text-xs text-gray-500 pt-3 border-t border-gray-100">
                                <span>📍 Rumbai, Pekanbaru</span>
                                <span class="text-amber-600 font-semibold">⭐ 4.2</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 6 -->
                <div class="bg-white rounded-2xl border border-amber-100 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden flex flex-col justify-between group">
                    <a href="{{ route('detail') }}">
                        <div class="relative h-48 w-full overflow-hidden bg-gray-100">
                            <img src="{{ url('/images/img3.png') }}" alt="Klinik Utama Pramita" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            <div class="absolute top-3 left-3">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-purple-600 text-white shadow-md">Laboratorium Lengkap</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-base font-bold text-gray-800 group-hover:text-amber-600 transition-colors mb-2">Klinik Utama Pramita</h3>
                            <p class="text-xs text-gray-600 mb-3">General Check-Up, Paket Kesehatan Blue/Silver/Gold/Platinum</p>
                            <div class="flex items-center justify-between text-xs text-gray-500 pt-3 border-t border-gray-100">
                                <span>📍 Pekanbaru Kota</span>
                                <span class="text-amber-600 font-semibold">⭐ 4.6</span>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>