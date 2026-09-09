<x-app-layout>
    <div class="background h-[calc(100vh-64px)] max-h-[calc(100vh-64px)] overflow-hidden font-sans relative flex items-center justify-end px-4 sm:px-12 lg:px-20">
        
        <!-- Right Info Glassmorphism Card -->
        <div class="w-full max-w-lg bg-white/95 backdrop-blur-md p-8 sm:p-10 rounded-3xl shadow-2xl border border-amber-200/80 text-center transition-all duration-300 transform hover:scale-[1.01] my-auto">
            
            <!-- Badge Header -->
            <div class="inline-flex items-center space-x-2 bg-amber-100/80 border border-amber-300/60 px-4 py-1.5 rounded-full text-xs font-semibold text-amber-800 mb-4 shadow-sm">
                <span>📍</span>
                <span>SIG Klinik Kesehatan Pekanbaru</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight leading-snug mb-2 text-center">
                Cari Klinik di Pekanbaru?
            </h1>
            <p class="text-lg sm:text-xl font-bold text-amber-600 mb-4 text-center">
                Carinya di <span class="bg-amber-500 text-white px-2.5 py-0.5 rounded-lg shadow-sm">C-GIS</span> aja!
            </p>

            <!-- Description Text -->
            <div class="space-y-3 text-xs sm:text-sm text-gray-600 leading-relaxed mb-6 text-center font-normal">
                <p>
                    <strong class="text-amber-700 font-semibold">Apa itu C-GIS?</strong><br/>
                    C-GIS (Clinic GIS) adalah aplikasi Sistem Informasi Geografis interaktif berbasis web yang memetakan lokasi klinik kesehatan di Kota Pekanbaru secara presisi.
                </p>
                <p class="text-gray-500 text-xs">
                    Dapatkan informasi lengkap layanan medis, jam operasional 24 jam, fasilitas BPJS, hingga estimasi tarif berobat dalam satu genggaman.
                </p>
            </div>

            <!-- Search Form -->
            <form action="{{ route('klinik.index') }}" method="GET" class="mb-5">
                <div class="relative w-full">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Cari nama klinik, BPJS, atau lokasi..." 
                        class="w-full pl-10 pr-24 py-3 rounded-full text-xs sm:text-sm font-medium text-gray-800 bg-gray-50 border border-amber-200 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:bg-white shadow-inner transition"
                    />
                    <svg class="w-4 h-4 absolute left-3.5 top-3.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <button type="submit" class="absolute right-1.5 top-1.5 px-4 py-1.5 bg-[#ff9900] hover:bg-amber-600 text-white text-xs font-semibold rounded-full shadow transition">
                        Cari
                    </button>
                </div>
            </form>

            <!-- Quick Action Buttons -->
            <div class="flex items-center justify-center gap-3 pt-2">
                <a href="{{ route('map') }}" class="px-5 py-2.5 bg-[#ff9900] hover:bg-amber-600 text-white text-xs font-bold rounded-xl shadow-md transition transform hover:-translate-y-0.5 flex items-center justify-center">
                    🗺️ Jelajahi Peta
                </a>
                <a href="{{ route('klinik.index') }}" class="px-5 py-2.5 bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-300 text-xs font-bold rounded-xl shadow-sm transition transform hover:-translate-y-0.5 flex items-center justify-center">
                    🏥 Daftar Klinik
                </a>
            </div>

        </div>
    </div>
</x-app-layout>