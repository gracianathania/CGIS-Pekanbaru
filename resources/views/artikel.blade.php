<x-app-layout>
    <div x-data="{
        showModal: false,
        activeArticle: null,
        activeCategory: 'all',
        searchQuery: '',
        articles: [
            {
                id: 1,
                title: '5 Cara Meredakan Sakit Perut Secara Alami Sebelum ke Klinik',
                category: 'Pertolongan Pertama',
                categoryColor: 'bg-emerald-100 text-emerald-700 border-emerald-300',
                author: 'dr. Anisa Rahma',
                date: '8 September 2026',
                readTime: '3 mnt baca',
                image: '{{ url('/images/doctor_consultation.jpg') }}',
                summary: 'Sering merasa perut kembung atau melilit tiba-tiba? Berikut pertolongan pertama sederhana yang bisa Anda lakukan di rumah sebelum berkonsultasi ke dokter.',
                content: `
                    <p class='mb-4'>Sakit perut dapat disebabkan oleh berbagai faktor, mulai dari pola makan yang tidak teratur, stres, hingga masalah pencernaan seperti maag atau asam lambung naik. Sebelum Anda memeriksakan diri ke klinik terdekat di Pekanbaru, ada beberapa langkah pertolongan pertama alami yang efektif untuk meredakan gejalanya:</p>
                    <h4 class='font-semibold text-lg text-amber-700 mb-2'>1. Minum Air Hangat atau Teh Jahe</h4>
                    <p class='mb-4'>Air hangat membantu merelaksasi otot-otot saluran pencernaan yang tegang. Jahe mengandung senyawa gingerol alami yang bersifat anti-inflamasi dan sangat baik menetralkan rasa mual serta gas berlebih.</p>
                    <h4 class='font-semibold text-lg text-amber-700 mb-2'>2. Kompres Hangat di Area Perut</h4>
                    <p class='mb-4'>Gunakan botol berisi air hangat yang dibungkus handuk kecil lalu tempelkan di atas perut selama 15–20 menit. Suhu hangat meningkatkan sirkulasi darah dan mengurangi rasa kram.</p>
                    <h4 class='font-semibold text-lg text-amber-700 mb-2'>3. Konsumsi Peppermint atau Teh Mint</h4>
                    <p class='mb-4'>Daun peppermint membantu melemaskan otot usus dan mempercepat dorongan gas keluar dari perut.</p>
                    <h4 class='font-semibold text-lg text-amber-700 mb-2'>Kapan Harus Segera ke Klinik?</h4>
                    <p class='mb-4 text-rose-700 font-medium'>Jika sakit perut disertai demam tinggi, muntah terus-menerus, atau nyeri hebat menetap lebih dari 24 jam, segera kunjungi Klinik Pratama terdekat untuk penanganan medis tepat.</p>
                `
            },
            {
                id: 2,
                title: 'Panduan Lengkap Menggunakan BPJS Kesehatan di Klinik Pratama Pekanbaru',
                category: 'BPJS & Layanan',
                categoryColor: 'bg-blue-100 text-blue-700 border-blue-300',
                author: 'Tim Redaksi C-GIS',
                date: '5 September 2026',
                readTime: '5 mnt baca',
                image: '{{ url('/images/clinic_modern.jpg') }}',
                summary: 'Ingin berobat gratis pakai BPJS di Pekanbaru? Ketahui alur pelayanan, syarat pendaftaran, dan fasilitas yang ditanggung di Faskes Tingkat Pertama.',
                content: `
                    <p class='mb-4'>BPJS Kesehatan memberikan jaminan pelayanan medis komprehensif di Fasilitas Kesehatan Tingkat Pertama (FKTP) seperti Klinik Pratama dan Puskesmas. Agar proses berobat Anda berjalan lancar, ikuti panduan berikut:</p>
                    <h4 class='font-semibold text-lg text-amber-700 mb-2'>Dokumen yang Wajib Dibawa:</h4>
                    <ul class='list-disc pl-5 mb-4 space-y-1'>
                        <li>Kartu BPJS Kesehatan (Fisik atau KIS Digital via aplikasi Mobile JKN)</li>
                        <li>Kartu Tanda Penduduk (KTP) / Kartu Keluarga</li>
                    </ul>
                    <h4 class='font-semibold text-lg text-amber-700 mb-2'>Layanan yang Ditanggung Gratis:</h4>
                    <p class='mb-4'>Pemeriksaan umum, konsultasi dokter, obat-obatan generik sesuai indikasi medis, tindakan medis non-spesialistik, hingga rujukan ke Rumah Sakit jika diperlukan rujukan lanjutan.</p>
                    <div class='p-4 bg-amber-50 rounded-xl border border-amber-200 text-amber-800 text-sm'>
                        💡 <strong>Tips C-GIS:</strong> Gunakan fitur pencarian C-GIS untuk menyaring daftar klinik di Pekanbaru yang sudah bekerja sama dengan BPJS Kesehatan!
                    </div>
                `
            },
            {
                id: 3,
                title: 'Pentingnya Pemeriksaan Kesehatan Gigi Rutin Setiap 6 Bulan',
                category: 'Kesehatan Gigi',
                categoryColor: 'bg-cyan-100 text-cyan-700 border-cyan-300',
                author: 'drg. Hendra Wijaya',
                date: '2 September 2026',
                readTime: '4 mnt baca',
                image: '{{ url('/images/dental_clinic.jpg') }}',
                summary: 'Jangan tunggu sakit gigi baru ke dokter! Ketahui mengapa karang gigi dan gigi berlubang kecil harus ditangani sejak dini.',
                content: `
                    <p class='mb-4'>Banyak masyarakat baru mengunjungi klinik gigi ketika sudah merasakan nyeri bengkak hebat. Padahal, pencegahan dini jauh lebih murah dan tidak merusak jaringan gigi asli.</p>
                    <h4 class='font-semibold text-lg text-amber-700 mb-2'>Manfaat Check-up Gigi Rutin:</h4>
                    <ul class='list-disc pl-5 mb-4 space-y-1'>
                        <li><strong>Pembersihan Karang Gigi (Scaling):</strong> Mencegah bau mulut, gusi berdarah, dan penyakit periodontitis.</li>
                        <li><strong>Deteksi Lubang Kecil:</strong> Penambalan lebih sederhana dan tidak mengenai saraf gigi.</li>
                        <li><strong>Skrining Kesehatan Mulut:</strong> Memastikan tidak ada lesi mukosa abnormal.</li>
                    </ul>
                    <p class='mb-4'>Klinik gigi di Pekanbaru menyediakan fasilitas perawatan modern dengan dokter gigi spesialis maupun umum yang berpengalaman.</p>
                `
            },
            {
                id: 4,
                title: 'Tips Menjaga Daya Tahan Tubuh Anak Saat Musim Hujan & Pancaroba',
                category: 'Tips Sehat',
                categoryColor: 'bg-amber-100 text-amber-700 border-amber-300',
                author: 'dr. Maya Sartika, Sp.A',
                date: '28 Agustus 2026',
                readTime: '3 mnt baca',
                image: '{{ url('/images/img1.png') }}',
                summary: 'Perubahan cuaca ekstrem di Pekanbaru sering memicu batuk, flu, dan ISPA pada anak. Cek langkah praktis meningkatkan imunitas buah hati Anda.',
                content: `
                    <p class='mb-4'>Anak-anak memiliki sistem kekebalan tubuh yang masih berkembang, sehingga lebih rentan terhadap infeksi virus flu dan ISPA saat perubahan cuaca.</p>
                    <h4 class='font-semibold text-lg text-amber-700 mb-2'>Langkah Memperkuat Imunitas Anak:</h4>
                    <ul class='list-disc pl-5 mb-4 space-y-1'>
                        <li>Pastikan asupan nutrisi seimbang (protein, buah kaya Vitamin C seperti jeruk dan pepaya).</li>
                        <li>Cukupi waktu tidur anak (8-10 jam setiap malam).</li>
                        <li>Jaga kebersihan tangan dengan rutin cuci tangan pakai sabun.</li>
                        <li>Berikan imunisasi rutin dan suplemen vitamin sesuai anjuran dokter anak.</li>
                    </ul>
                `
            },
            {
                id: 5,
                title: 'Mengenal Perbedaan Klinik Pratama dan Klinik Utama',
                category: 'Informasi Klinik',
                categoryColor: 'bg-purple-100 text-purple-700 border-purple-300',
                author: 'Tim Konsultan Medis C-GIS',
                date: '20 Agustus 2026',
                readTime: '4 mnt baca',
                image: '{{ url('/images/img2.png') }}',
                summary: 'Bingung memilih tempat berobat? Pahami perbedaan jenis pelayanan medis, ketersediaan dokter spesialis, dan fasilitas di Klinik Pratama vs Utama.',
                content: `
                    <p class='mb-4'>Di Indonesia, fasilitas kesehatan klinik terbagi menjadi dua kategori utama berdasarkan Peraturan Menteri Kesehatan:</p>
                    <h4 class='font-semibold text-lg text-amber-700 mb-2'>1. Klinik Pratama</h4>
                    <p class='mb-3'>Menyelenggarakan pelayanan medis dasar oleh dokter umum dan/atau dokter gigi. Biasanya menjadi titik pertama pelayanan kesehatan (FKTP BPJS).</p>
                    <h4 class='font-semibold text-lg text-amber-700 mb-2'>2. Klinik Utama</h4>
                    <p class='mb-3'>Menyelenggarakan pelayanan medis spesialistik atau pelayanan subspesialistik (seperti poli kebidanan, poli mata, UGD lengkap, laboratorium canggih, dan rawat inap).</p>
                `
            },
            {
                id: 6,
                title: 'Fasilitas Rawat Inap di Klinik Pekanbaru: Apa Saja yang Disediakan?',
                category: 'Layanan Klinik',
                categoryColor: 'bg-rose-100 text-rose-700 border-rose-300',
                author: 'dr. Rizky Pratama',
                date: '15 Agustus 2026',
                readTime: '4 mnt baca',
                image: '{{ url('/images/img3.png') }}',
                summary: 'Beberapa klinik di Pekanbaru menyediakan fasilitas rawat inap 24 jam dengan kamar yang nyaman. Ketahui kriteria penanganan medisnya di sini.',
                content: `
                    <p class='mb-4'>Klinik dengan fasilitas rawat inap memungkinkan pasien mendapatkan observasi medis berkelanjutan tanpa perlu langsung dirujuk ke rumah sakit besar untuk kasus derajat ringan hingga sedang.</p>
                    <p class='mb-4'>Fasilitas umum meliputi bed rawat inap ber-AC, pemantauan perawat 24 jam, pemberian infus dan obat injeksi, serta konsultasi dokter penanggung jawab harian.</p>
                `
            }
        ],
        get filteredArticles() {
            return this.articles.filter(item => {
                const matchesCategory = this.activeCategory === 'all' || item.category === this.activeCategory;
                const matchesSearch = item.title.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                                      item.summary.toLowerCase().includes(this.searchQuery.toLowerCase());
                return matchesCategory && matchesSearch;
            });
        },
        openArticle(article) {
            this.activeArticle = article;
            this.showModal = true;
            document.body.style.overflow = 'hidden';
        },
        closeModal() {
            this.showModal = false;
            this.activeArticle = null;
            document.body.style.overflow = 'auto';
        }
    }" class="min-h-screen bg-[#fffdfa] font-sans pb-16">

        <!-- Hero Banner Section -->
        <div class="bg-gradient-to-r from-[#f9b244] to-[#ff9900] text-white py-12 px-4 shadow-sm mb-8">
            <div class="max-w-6xl mx-auto text-center">
                <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-semibold uppercase tracking-wider mb-3">
                    Edukasi Kesehatan Pekanbaru
                </span>
                <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-white mb-3">
                    Kumpulan Artikel & Tips Kesehatan
                </h1>
                <p class="text-amber-100 max-w-2xl mx-auto text-sm sm:text-base font-medium">
                    Temukan panduan medis tepercaya, informasi BPJS, serta tips menjaga kesehatan diri dan keluarga di kota Pekanbaru. Klik pada artikel untuk membaca selengkapnya.
                </p>

                <!-- Search Input Bar -->
                <div class="mt-6 max-w-xl mx-auto relative">
                    <input 
                        type="text" 
                        x-model="searchQuery" 
                        placeholder="Cari artikel kesehatan, BPJS, sakit perut..." 
                        class="w-full pl-11 pr-4 py-3 rounded-full text-gray-800 bg-white shadow-lg focus:outline-none focus:ring-4 focus:ring-amber-300 text-sm font-medium border-0 placeholder-gray-400 transition"
                    />
                    <svg class="w-5 h-5 absolute left-4 top-3.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Filter Categories Tabs -->
        <div class="max-w-6xl mx-auto px-4 mb-8">
            <div class="flex items-center justify-start sm:justify-center gap-2 overflow-x-auto pb-2 scrollbar-none">
                <button 
                    @click="activeCategory = 'all'" 
                    :class="activeCategory === 'all' ? 'bg-[#ff9900] text-white shadow-md' : 'bg-white text-gray-600 hover:bg-amber-50 border border-gray-200'"
                    class="px-4 py-2 rounded-full text-xs font-medium transition whitespace-nowrap"
                >
                    🔍 Semua Artikel
                </button>
                <button 
                    @click="activeCategory = 'Pertolongan Pertama'" 
                    :class="activeCategory === 'Pertolongan Pertama' ? 'bg-[#ff9900] text-white shadow-md' : 'bg-white text-gray-600 hover:bg-amber-50 border border-gray-200'"
                    class="px-4 py-2 rounded-full text-xs font-medium transition whitespace-nowrap"
                >
                    🚑 Pertolongan Pertama
                </button>
                <button 
                    @click="activeCategory = 'BPJS & Layanan'" 
                    :class="activeCategory === 'BPJS & Layanan' ? 'bg-[#ff9900] text-white shadow-md' : 'bg-white text-gray-600 hover:bg-amber-50 border border-gray-200'"
                    class="px-4 py-2 rounded-full text-xs font-medium transition whitespace-nowrap"
                >
                    💳 BPJS & Layanan
                </button>
                <button 
                    @click="activeCategory = 'Kesehatan Gigi'" 
                    :class="activeCategory === 'Kesehatan Gigi' ? 'bg-[#ff9900] text-white shadow-md' : 'bg-white text-gray-600 hover:bg-amber-50 border border-gray-200'"
                    class="px-4 py-2 rounded-full text-xs font-medium transition whitespace-nowrap"
                >
                    🦷 Kesehatan Gigi
                </button>
                <button 
                    @click="activeCategory = 'Tips Sehat'" 
                    :class="activeCategory === 'Tips Sehat' ? 'bg-[#ff9900] text-white shadow-md' : 'bg-white text-gray-600 hover:bg-amber-50 border border-gray-200'"
                    class="px-4 py-2 rounded-full text-xs font-medium transition whitespace-nowrap"
                >
                    💡 Tips Sehat
                </button>
            </div>
        </div>

        <!-- Main Articles Grid -->
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="article in filteredArticles" :key="article.id">
                    <div 
                        @click="openArticle(article)"
                        class="bg-white rounded-2xl border border-amber-100/80 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1.5 cursor-pointer overflow-hidden flex flex-col group"
                    >
                        <!-- Cover Image Container -->
                        <div class="relative h-48 w-full overflow-hidden bg-gray-100">
                            <img 
                                :src="article.image" 
                                :alt="article.title"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            />
                            <div class="absolute top-3 left-3">
                                <span 
                                    :class="article.categoryColor" 
                                    class="px-3 py-1 rounded-full text-xs font-semibold border backdrop-blur-sm shadow-sm"
                                    x-text="article.category"
                                ></span>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center text-xs text-gray-400 space-x-2 mb-2 font-medium">
                                    <span x-text="article.date"></span>
                                    <span>•</span>
                                    <span x-text="article.readTime"></span>
                                </div>
                                <h3 class="text-base font-bold text-gray-800 group-hover:text-amber-600 transition-colors line-clamp-2 leading-snug mb-2" x-text="article.title"></h3>
                                <p class="text-xs text-gray-600 line-clamp-3 leading-relaxed" x-text="article.summary"></p>
                            </div>

                            <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="w-6 h-6 rounded-full bg-amber-500 text-white font-bold flex items-center justify-center text-xs" x-text="article.author.charAt(0)"></div>
                                    <span class="text-xs font-medium text-gray-500" x-text="article.author"></span>
                                </div>
                                <span class="inline-flex items-center text-xs font-semibold text-amber-600 group-hover:translate-x-1 transition-transform">
                                    Baca &rarr;
                                </span>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Empty State -->
            <div x-show="filteredArticles.length === 0" class="text-center py-16 bg-white rounded-2xl border border-gray-200">
                <p class="text-gray-500 font-medium text-base">Tidak ditemukan artikel yang sesuai pencarian Anda.</p>
                <button @click="searchQuery = ''; activeCategory = 'all'" class="mt-3 text-xs font-semibold text-amber-600 underline">Reset Pencarian</button>
            </div>
        </div>

        <!-- Interactive Article Modal Reader -->
        <div 
            x-show="showModal" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[10000] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm overflow-y-auto"
            style="display: none;"
        >
            <div 
                @click.outside="closeModal()" 
                class="bg-white rounded-3xl max-w-3xl w-full max-h-[90vh] overflow-y-auto shadow-2xl relative animate-fade-in border border-gray-100"
            >
                <!-- Modal Sticky Header Bar -->
                <div class="sticky top-0 bg-white/95 backdrop-blur-md px-6 py-4 border-b border-gray-100 flex items-center justify-between z-20">
                    <span 
                        x-show="activeArticle"
                        :class="activeArticle?.categoryColor" 
                        class="px-3 py-1 rounded-full text-xs font-semibold border"
                        x-text="activeArticle?.category"
                    ></span>
                    <button 
                        @click="closeModal()" 
                        class="w-9 h-9 rounded-full bg-gray-100 hover:bg-amber-100 text-gray-600 hover:text-amber-700 flex items-center justify-center transition font-bold text-lg"
                    >
                        &times;
                    </button>
                </div>

                <!-- Modal Body Content -->
                <template x-if="activeArticle">
                    <div class="p-6 sm:p-8">
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 leading-tight mb-4" x-text="activeArticle.title"></h2>

                        <div class="flex items-center justify-between text-xs text-gray-500 pb-6 mb-6 border-b border-gray-100 font-medium">
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 rounded-full bg-amber-500 text-white font-bold flex items-center justify-center text-sm" x-text="activeArticle.author.charAt(0)"></div>
                                <div>
                                    <p class="font-semibold text-gray-800" x-text="activeArticle.author"></p>
                                    <p class="text-gray-400" x-text="activeArticle.date"></p>
                                </div>
                            </div>
                            <span class="bg-gray-100 px-3 py-1 rounded-full text-gray-600 font-semibold" x-text="activeArticle.readTime"></span>
                        </div>

                        <!-- Article Banner Image -->
                        <div class="rounded-2xl overflow-hidden mb-6 max-h-80 w-full shadow-sm">
                            <img :src="activeArticle.image" :alt="activeArticle.title" class="w-full h-full object-cover" />
                        </div>

                        <!-- Full Rich Text Content -->
                        <div class="prose max-w-none text-gray-700 text-sm sm:text-base leading-relaxed space-y-4 font-sans" x-html="activeArticle.content"></div>

                        <!-- Footer Actions inside Modal -->
                        <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-xs font-semibold text-gray-400">CGIS Kesehatan Pekanbaru</span>
                            <button @click="closeModal()" class="px-5 py-2.5 bg-[#ff9900] text-white font-semibold text-xs rounded-xl hover:bg-amber-600 shadow-md transition">
                                Selesai Membaca
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </div>

    </div>
</x-app-layout>