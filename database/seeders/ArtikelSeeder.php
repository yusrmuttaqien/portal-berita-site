<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artikel;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID kategori dan penulis untuk relasi
        $politikId = Category::where('slug', 'politik')->first()->id_kategori;
        $ekonomiId = Category::where('slug', 'ekonomi')->first()->id_kategori;
        $teknologiId = Category::where('slug', 'teknologi')->first()->id_kategori;
        $olahragaId = Category::where('slug', 'olahraga')->first()->id_kategori;
        $kesehatanId = Category::where('slug', 'kesehatan')->first()->id_kategori;

        // Ambil ID penulis (role_id = 4)
        $penulisIds = User::where('role_id', 4)->pluck('id')->toArray();

        // Ensure the artikel directory exists in storage
        $storageArtikelDir = storage_path('app/public/artikel');
        if (!File::exists($storageArtikelDir)) {
            File::makeDirectory($storageArtikelDir, 0755, true);
        }

        // Move all files from database/images/artikel to storage/app/public/artikel
        $sourceDir = database_path('images/artikel');
        $destinationDir = $storageArtikelDir;

        if (File::exists($sourceDir)) {
            $files = File::allFiles($sourceDir);
            foreach ($files as $file) {
                $fileName = $file->getFilename();
                $sourcePath = $sourceDir . '/' . $fileName;
                $destinationPath = $destinationDir . '/' . $fileName;
                
                // Only move if the destination file doesn't already exist
                if (!File::exists($destinationPath)) {
                    File::copy($sourcePath, $destinationPath);
                }
            }
        }

        $artikelData = [
            [
                'judul' => 'Indonesia Tuntaskan Negosiasi Perdagangan dengan Blok Eropa, Fokus Sektor Hijau',
                'slug' => 'indonesia-tuntaskan-negosiasi-perdagangan-dengan-blok-eropa-fokus-sektor-hijau',
                'kategori_id' => $ekonomiId,
                'penulis_id' => $penulisIds[0], // Aizar
                'kategori' => 'Ekonomi',
                'penulis' => 'Aizar',
                'foto' => 'artikel/l3p6GAB5vn3rYNCGl0D061YMHwhhva76UGM9YGY6.jpg',
                'ringkasan' => 'Kabar terbaru dari Kementerian Perdagangan mengumumkan penuntasan negosiasi perjanjian dagang komprehensif dengan Uni Eropa, dengan fokus utama pada produk ramah lingkungan dan keberlanjutan.',
                'isi' => 'Indonesia dan Uni Eropa (UE) telah berhasil menyelesaikan putaran negosiasi terakhir untuk perjanjian Comprehensive Economic Partnership Agreement (CEPA). Penandatanganan akhir diharapkan terjadi pada kuartal mendatang. Perjanjian ini akan membuka akses pasar yang lebih luas bagi produk Indonesia, terutama di sektor green economy seperti energi terbarukan, produk organik, dan teknologi ramah lingkungan.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Mendagri Perintahkan Pemda Waspada, Stabilitas Harga Pangan Jadi Prioritas Utama Akhir Tahun',
                'slug' => 'mendagri-perintahkan-pemda-waspada-stabilitas-harga-pangan-jadi-prioritas-utama-akhir-tahun',
                'kategori_id' => $politikId,
                'penulis_id' => $penulisIds[1], // Imel
                'kategori' => 'Politik',
                'penulis' => 'Imel',
                'foto' => 'artikel/WARuGbODTbbdkkdnAizZHYSf3gMeAYsMJ3pAZJn8.jpg',
                'ringkasan' => 'Menteri Dalam Negeri (Mendagri) menegaskan pentingnya intervensi aktif pemerintah daerah (Pemda) untuk menjaga stabilitas harga pangan, terutama menjelang perayaan akhir tahun yang rentan terhadap inflasi.',
                'isi' => 'Jakarta, 17 Oktober 2025 - Menteri Dalam Negeri Muhammad Tito Karnavian kembali menekankan kepada seluruh kepala daerah pentingnya menjaga stabilitas harga pangan di wilayah masing-masing. Instruksi ini disampaikan dalam rapat koordinasi nasional yang dihadiri gubernur dan bupati/walikota se-Indonesia.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'DPR Kritik Kenaikan Iuran BPJS Kesehatan: Solusi Jangan Bebani Rakyat',
                'slug' => 'dpr-kritik-kenaikan-iuran-bpjs-kesehatan-solusi-jangan-bebani-rakyat',
                'kategori_id' => $politikId,
                'penulis_id' => $penulisIds[2], // Yusril
                'kategori' => 'Politik',
                'penulis' => 'Yusril',
                'foto' => 'artikel/7vLeaa2S9ND7ndGXpOo6xaAF7H4XNRc0inPnSYt7.jpg',
                'ringkasan' => 'Komisi di DPR mengkritisi rencana kenaikan iuran BPJS Kesehatan yang dikabarkan akan diberlakukan pada tahun 2025, mendesak pemerintah mencari solusi berkelanjutan lain sebelum membebani masyarakat.',
                'isi' => 'Jakarta, 19 Oktober 2025 - Rencana kenaikan iuran BPJS Kesehatan pada tahun anggaran 2025 mendapat reaksi keras dari Dewan Perwakilan Rakyat (DPR). Komisi IX DPR menilai langkah ini terlalu memberatkan masyarakat di tengah kondisi ekonomi yang belum sepenuhnya pulih.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Konflik Timur Tengah Memanas, Harga Emas Global Capai Rekor Tertinggi',
                'slug' => 'konflik-timur-tengah-memanas-harga-emas-global-capai-rekor-tertinggi',
                'kategori_id' => $ekonomiId,
                'penulis_id' => $penulisIds[3], // Rara
                'kategori' => 'Ekonomi',
                'penulis' => 'Rara',
                'foto' => 'artikel/zzEihnEtngxXXFadwd5PuLRaNbj2f88cMv3po9Cb.jpg',
                'ringkasan' => 'Ketegangan geopolitik dan kebijakan moneter global memicu lonjakan harga emas. Emas menjadi aset paling aman (safe haven) di tengah ketidakpastian, berdampak pada inflasi di Indonesia.',
                'isi' => 'Jakarta, 15 Oktober 2025 - Ketidakpastian geopolitik di Timur Tengah dan kebijakan Bank Sentral Amerika Serikat yang cenderung dovish telah mendorong harga emas global mencapai rekor tertinggi sepanjang sejarah. Harga emas spot kini berada di level US$ 2.750 per troy ounce.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'AS Kembali Veto Resolusi Gencatan Senjata Permanen di Gaza Dewan Keamanan PBB',
                'slug' => 'as-kembali-veto-resolusi-gencatan-senjata-permanen-di-gaza-dewan-keamanan-pbb',
                'kategori_id' => $politikId,
                'penulis_id' => $penulisIds[4], // Stevanus
                'kategori' => 'Politik',
                'penulis' => 'Stevanus',
                'foto' => 'artikel/yK2jEkWujWXXYSLswuDUd7cp2gwhPi58YGE8lIuY.jpg',
                'ringkasan' => 'Amerika Serikat sekali lagi menggunakan hak vetonya di Dewan Keamanan PBB untuk menolak resolusi yang menyerukan gencatan senjata permanen di Gaza, menimbulkan kritik dari negara-negara anggota lain.',
                'isi' => 'New York, 14 Oktober 2025 - Dewan Keamanan Perserikatan Bangsa-Bangsa (PBB) kembali gagal mencapai konsensus mengenai krisis di Gaza setelah Amerika Serikat menggunakan hak vetonya untuk menolak resolusi yang mengusulkan gencatan senjata permanen.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'BSSN Peringatkan Ancaman Siber 2025 Lebih Kompleks: Waspada AI Agentik dan Ransomware',
                'slug' => 'bssn-peringatkan-ancaman-siber-2025-lebih-kompleks-waspada-ai-agentik-dan-ransomware',
                'kategori_id' => $teknologiId,
                'penulis_id' => $penulisIds[5], // Budi
                'kategori' => 'Teknologi',
                'penulis' => 'Budi',
                'foto' => 'artikel/T9C96jTLXh9ElijQdLu7f6ag0iaVnI30y7ovZzhu.jpg',
                'ringkasan' => 'Badan Siber dan Sandi Negara (BSSN) memprediksi tahun 2025 menjadi tahun paling menantang dalam keamanan siber nasional, terutama dengan meningkatnya serangan ransomware dan ancaman dari Artificial Intelligence (AI) Agentik.',
                'isi' => 'Jakarta, 13 Oktober 2025 - BSSN mengeluarkan peringatan keras mengenai lanskap keamanan siber tahun 2025 yang diprediksi akan lebih kompleks dibanding tahun-tahun sebelumnya. Kepala BSSN menjelaskan bahwa ancaman siber kini tidak hanya berasal dari hacker individual.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'OJK Dorong Pembiayaan UMKM Lebih Cepat dan Murah, Kredit Hanya Tumbuh 1,35%',
                'slug' => 'ojk-dorong-pembiayaan-umkm-lebih-cepat-dan-murah-kredit-hanya-tumbuh-135',
                'kategori_id' => $ekonomiId,
                'penulis_id' => $penulisIds[6], // Tono
                'kategori' => 'Ekonomi',
                'penulis' => 'Tono',
                'foto' => 'artikel/ZthnBHZtlNDQNzSGFoqIBSMkn8UEumVqn8pjt2eC.jpg',
                'ringkasan' => 'Otoritas Jasa Keuangan (OJK) merilis data terbaru yang menunjukkan pertumbuhan kredit UMKM melambat signifikan menjadi 1,35% per Agustus 2025, mendorong otoritas untuk menerbitkan aturan baru demi mempermudah akses pembiayaan.',
                'isi' => 'Jakarta, 12 Oktober 2025 - Sektor Usaha Mikro, Kecil, dan Menengah (UMKM) menghadapi tantangan serius dalam mengakses pembiayaan perbankan. Data OJK menunjukkan pertumbuhan kredit UMKM hanya 1,35% year-on-year per Agustus 2025.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Emas Antam Stagnan di Level Tertinggi Hari Ini, Investor Pantau Suku Bunga Global',
                'slug' => 'emas-antam-stagnan-di-level-tertinggi-hari-ini-investor-pantau-suku-bunga-global',
                'kategori_id' => $ekonomiId,
                'penulis_id' => $penulisIds[0], // Aizar
                'kategori' => 'Ekonomi',
                'penulis' => 'Aizar',
                'foto' => 'artikel/RgA9DHgQsB1vYLzbX3LhUDGQh61rri5z99DeFW61.jpg',
                'ringkasan' => 'Harga emas batangan Logam Mulia (Antam) hari ini, 19 Oktober 2025, terpantau stagnan di level tinggi setelah sebelumnya mengalami kenaikan tajam akibat ketidakpastian geopolitik dan suku bunga AS.',
                'isi' => 'Jakarta, 11 Oktober 2025 - Harga emas batangan produksi PT Aneka Tambang Tbk (Antam) pada hari ini, Minggu (19/10), berada pada posisi stagnan setelah pergerakan volatil di pasar global minggu lalu. Harga jual emas Antam ukuran 1 gram dipatok di level Rp 1.325.000.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Mimpi Piala Dunia Pupus, Timnas Indonesia Tersingkir dari Kualifikasi Usai Dikalahkan Irak',
                'slug' => 'mimpi-piala-dunia-pupus-timnas-indonesia-tersingkir-dari-kualifikasi-usai-dikalahkan-irak',
                'kategori_id' => $olahragaId,
                'penulis_id' => $penulisIds[1], // Imel
                'kategori' => 'Olahraga',
                'penulis' => 'Imel',
                'foto' => 'artikel/Jac0tc2yhXiSDAyQmeBcSjyUruI4259D7peEmncX.jpg',
                'ringkasan' => 'Timnas Indonesia resmi tersingkir dari Kualifikasi Piala Dunia 2026 setelah kalah 0-1 dari Irak. Mimpi lolos ke putaran final untuk pertama kalinya sejak 1938 harus terkubur di Stadion King Abdullah Sports City.',
                'isi' => 'Jeddah, 10 Oktober 2025 - Perjalanan bersejarah Tim Nasional Indonesia di Kualifikasi Piala Dunia 2026 harus terhenti di putaran keempat setelah takluk 0-1 dari Irak dalam pertandingan hidup-mati di Stadion King Abdullah Sports City.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Dominasi Horor Indonesia: Film Pabrik Gula Jadi Terlaris 2025 dengan 6 Juta Penonton',
                'slug' => 'dominasi-horor-indonesia-film-pabrik-gula-jadi-terlaris-2025-dengan-6-juta-penonton',
                'kategori_id' => $teknologiId,
                'penulis_id' => $penulisIds[2], // Yusril
                'kategori' => 'Teknologi',
                'penulis' => 'Yusril',
                'foto' => 'artikel/T8DS5bvJCtlzkraT6j0GaqT9AXfHTDuhVgZt6rL9.jpg',
                'ringkasan' => 'Industri film horor Indonesia mencatatkan kinerja gemilang sepanjang 2025. Film Pabrik Gula berhasil menempati posisi puncak sebagai film terlaris tahun ini dengan raihan lebih dari 6 juta penonton.',
                'isi' => 'Jakarta, 19 Oktober 2025 - Tren film horor Indonesia terus menguat di box office nasional. Film Pabrik Gula yang diproduksi oleh Rapi Films berhasil melampaui ekspektasi dengan meraih lebih dari 6 juta penonton dalam waktu 3 bulan penayangan.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Misi M2/Resilience Jepang Fokus pada Oksigen di Bulan, Siap Luncur Januari 2026',
                'slug' => 'misi-m2resilience-jepang-fokus-pada-oksigen-di-bulan-siap-luncur-januari-2026',
                'kategori_id' => $teknologiId,
                'penulis_id' => $penulisIds[3], // Rara
                'kategori' => 'Teknologi',
                'penulis' => 'Rara',
                'foto' => 'artikel/1RmA2Z9y0TgfaU9TeJ20uMWQFXceCzAPYo0h8UGQ.jpg',
                'ringkasan' => 'Badan Eksplorasi Antariksa Jepang (JAXA) tengah bersiap meluncurkan misi M2/Resilience pada Januari 2026 dengan fokus utama mencari dan mengekstrak oksigen dari permukaan Bulan.',
                'isi' => 'Tokyo, 19 Oktober 2025 - Setelah sukses dengan beberapa misi luar angkasa sebelumnya, Jepang kini mengalihkan fokus ke Bulan dengan misi ambisius bernama M2/Resilience. Misi ini bertujuan untuk mencari sumber oksigen di permukaan Bulan.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Kenyamanan Mengalahkan Jarak, 78% Wisatawan Indonesia Pilih Staycation di Hotel Mewah',
                'slug' => 'kenyamanan-mengalahkan-jarak-78-wisatawan-indonesia-pilih-staycation-di-hotel-mewah',
                'kategori_id' => $ekonomiId,
                'penulis_id' => $penulisIds[4], // Stevanus
                'kategori' => 'Ekonomi',
                'penulis' => 'Stevanus',
                'foto' => 'artikel/BF7Yqk6sEk1r6Z4hTcrWkSsOqJNn8uh8pBDdDh8T.jpg',
                'ringkasan' => 'Survei pariwisata 2025 menunjukkan preferensi masyarakat Indonesia yang semakin condong ke tren staycation di hotel-hotel mewah lokal, menggeser minat traveling ke luar negeri.',
                'isi' => 'Jakarta, 19 Oktober 2025 - Liburan tidak harus bepergian jauh. Itulah filosofi yang kini dianut mayoritas wisatawan Indonesia. Survei yang dilakukan oleh Asosiasi Perhotelan Indonesia menunjukkan 78% responden memilih staycation.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Pabrik Gula Puncaki Box Office, Film Horor Indonesia Buktikan Kualitas dan Daya Tarik Lokal',
                'slug' => 'pabrik-gula-puncaki-box-office-film-horor-indonesia-buktikan-kualitas-dan-daya-tarik-lokal',
                'kategori_id' => $teknologiId,
                'penulis_id' => $penulisIds[5], // Budi
                'kategori' => 'Teknologi',
                'penulis' => 'Budi',
                'foto' => 'artikel/KhOs6UOgXIHlL9tWBZb0mvdYd8oG5BKo60xmz3hu.jpg',
                'ringkasan' => 'Film horor Pabrik Gula resmi dinobatkan sebagai film terlaris di Indonesia pada 2025, membuktikan bahwa konten lokal mampu bersaing dengan film-film Hollywood.',
                'isi' => 'Jakarta, 19 Oktober 2025 - Industri film Indonesia menunjukkan kekuatan yang luar biasa tahun ini. Film horor Pabrik Gula yang disutradarai oleh Ginanti Rona berhasil mengalahkan film-film blockbuster Hollywood di box office Indonesia.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Investor Cemas Geopolitik, Harga Emas Batangan Antam Tembus Rp 2,4 Juta per Gram',
                'slug' => 'investor-cemas-geopolitik-harga-emas-batangan-antam-tembus-rp-24-juta-per-gram',
                'kategori_id' => $ekonomiId,
                'penulis_id' => $penulisIds[6], // Tono
                'kategori' => 'Ekonomi',
                'penulis' => 'Tono',
                'foto' => 'artikel/mQ3E1wfWW1zY1RXPadqipF8c9kW8UzJki1j29Mns.jpg',
                'ringkasan' => 'Harga emas batangan Logam Mulia (Antam) pada 19 Oktober 2025 tercatat stagnan di level sangat tinggi, mencerminkan kekhawatiran investor global terhadap ketidakstabilan geopolitik.',
                'isi' => 'Jakarta, 19 Oktober 2025 - Harga jual emas batangan PT Antam Tbk hari ini, Minggu (19/10), kembali mencatatkan harga yang stabil di level tertinggi sepanjang masa. Emas Antam 1 gram dipatok di harga Rp 1.325.000.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Kalah Tipis dari Arab Saudi 2-3, Pelatih Timnas Sesalkan Gol Mudah di Awal Laga',
                'slug' => 'kalah-tipis-dari-arab-saudi-2-3-pelatih-timnas-sesalkan-gol-mudah-di-awal-laga',
                'kategori_id' => $olahragaId,
                'penulis_id' => $penulisIds[0], // Aizar
                'kategori' => 'Olahraga',
                'penulis' => 'Aizar',
                'foto' => 'artikel/IsWR7OpRoGY9iCpaHZX90uLzMldfmVLviqmisuND.jpg',
                'ringkasan' => 'Timnas Indonesia memulai Kualifikasi Piala Dunia 2026 putaran keempat dengan kekalahan dramatis 2-3 dari Arab Saudi di Stadion King Saud University.',
                'isi' => 'Riyadh, 19 Oktober 2025 - Tim Nasional Indonesia harus mengakui keunggulan Arab Saudi dengan skor akhir 2-3 dalam laga pembuka Kualifikasi Piala Dunia 2026 putaran keempat. Pelatih Shin Tae-yong menyesalkan gol cepat yang dicetak tuan rumah.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Musim Hujan Datang, Kemenkes Minta Masyarakat Waspada Kenaikan Kasus Flu Musiman',
                'slug' => 'musim-hujan-datang-kemenkes-minta-masyarakat-waspada-kenaikan-kasus-flu-musiman',
                'kategori_id' => $kesehatanId,
                'penulis_id' => $penulisIds[1], // Imel
                'kategori' => 'Kesehatan',
                'penulis' => 'Imel',
                'foto' => 'artikel/FqjHPv1c5iG3FenagiTDT6Nl6zgoCKz8UGCwIz3g.jpg',
                'ringkasan' => 'Kementerian Kesehatan (Kemenkes) mengeluarkan imbauan kepada masyarakat untuk kembali meningkatkan kewaspadaan dan protokol kesehatan menjelang musim hujan.',
                'isi' => 'Jakarta, 19 Oktober 2025 - Pergantian musim dari kemarau ke hujan selalu membawa risiko kesehatan tersendiri. Kementerian Kesehatan melalui Direktur Jenderal Pencegahan dan Pengendalian Penyakit mengingatkan masyarakat untuk waspada terhadap peningkatan kasus flu musiman.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => '5 Rekomendasi Kafe Instagramable di Jakarta Selatan, Tawarkan Konsep Unik dan Co-working Space',
                'slug' => '5-rekomendasi-kafe-instagramable-di-jakarta-selatan-tawarkan-konsep-unik-dan-co-working-space',
                'kategori_id' => $teknologiId,
                'penulis_id' => $penulisIds[2], // Yusril
                'kategori' => 'Teknologi',
                'penulis' => 'Yusril',
                'foto' => 'artikel/OwqevSu4K7hnUEBASGp67e2Uac7uElpMc18B84yf.jpg',
                'ringkasan' => 'Jakarta Selatan, sebagai pusat gaya hidup urban, terus menyajikan kafe dan tempat nongkrong baru yang menarik untuk generasi milenial dan Gen Z.',
                'isi' => 'Jakarta, 19 Oktober 2025 - Budaya kopi dan co-working di Jakarta Selatan tidak pernah mati. Setiap bulannya selalu bermunculan kafe-kafe baru dengan konsep unik yang menarik perhatian anak muda. Berikut 5 rekomendasi kafe instagramable terbaru.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Pasar Kendaraan Listrik Memanas, Produsen Lokal Siap Luncurkan Model Baru dengan Harga di Bawah Rp 250 Juta',
                'slug' => 'pasar-kendaraan-listrik-memanas-produsen-lokal-siap-luncurkan-model-baru-dengan-harga-di-bawah-rp-250-juta',
                'kategori_id' => $teknologiId,
                'penulis_id' => $penulisIds[3], // Rara
                'kategori' => 'Teknologi',
                'penulis' => 'Rara',
                'foto' => 'artikel/muQviIvHtKIratUsM04ClgdCIojhKFnoQNOFzb6c.jpg',
                'ringkasan' => 'Menyambut insentif pemerintah, beberapa produsen otomotif lokal dan kemitraan siap meluncurkan model mobil listrik baru dengan harga terjangkau.',
                'isi' => 'Karawang, 19 Oktober 2025 - Persaingan di pasar kendaraan listrik (EV) Indonesia semakin memanas. Beberapa produsen otomotif yang beroperasi di Indonesia bersiap meluncurkan model-model baru dengan target harga di bawah Rp 250 juta.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'BMKG Ingatkan Kesiapsiagaan Nasional, Cuaca Ekstrem Intai Wilayah Indonesia Hingga Akhir Bulan',
                'slug' => 'bmkg-ingatkan-kesiapsiagaan-nasional-cuaca-ekstrem-intai-wilayah-indonesia-hingga-akhir-bulan',
                'kategori_id' => $politikId,
                'penulis_id' => $penulisIds[4], // Stevanus
                'kategori' => 'Politik',
                'penulis' => 'Stevanus',
                'foto' => 'artikel/yOVpsLugmccG5Y9FzjHUchQ9dQqJbDurUxI26QK4.jpg',
                'ringkasan' => 'Badan Meteorologi, Klimatologi, dan Geofisika (BMKG) mengeluarkan peringatan dini potensi cuaca ekstrem yang akan melanda beberapa wilayah Indonesia.',
                'isi' => 'Jakarta, 19 Oktober 2025 - BMKG kembali merilis peringatan dini cuaca ekstrem yang diprediksi akan terus melanda beberapa wilayah Indonesia hingga akhir Oktober 2025. Kepala BMKG menjelaskan bahwa fenomena La Nina yang sedang terjadi berpotensi memicu cuaca ekstrem.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Kinerja Positif Laba Bersih Emiten Agregat Naik 21%, Sektor Bahan Baku Jadi Raja',
                'slug' => 'kinerja-positif-laba-bersih-emiten-agregat-naik-21-sektor-bahan-baku-jadi-raja',
                'kategori_id' => $ekonomiId,
                'penulis_id' => $penulisIds[5], // Budi
                'kategori' => 'Ekonomi',
                'penulis' => 'Budi',
                'foto' => 'artikel/OqY9uO3W9iZOixijT1VU8KtOUZkE7EeCzc2Mjnkc.jpg',
                'ringkasan' => 'Kinerja emiten di Bursa Efek Indonesia (BEI) pada Semester I-2025 menunjukkan pertumbuhan laba bersih agregat yang signifikan sebesar 21% year-on-year.',
                'isi' => 'Jakarta, 19 Oktober 2025 - Pasar modal nasional mencatatkan kinerja positif pada paruh pertama 2025. Data yang dihimpun dari laporan keuangan emiten menunjukkan laba bersih agregat tumbuh 21% dibanding periode yang sama tahun lalu.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Final Dramatis Piala AFF U-23: Indonesia Tunduk 0-1 dari Vietnam, Harus Puas Jadi Runner-up',
                'slug' => 'final-dramatis-piala-aff-u-23-indonesia-tunduk-0-1-dari-vietnam-harus-puas-jadi-runner-up',
                'kategori_id' => $olahragaId,
                'penulis_id' => $penulisIds[6], // Tono
                'kategori' => 'Olahraga',
                'penulis' => 'Tono',
                'foto' => 'artikel/uuqzI1q1QVSQ4Wq2CxXozmRkiRCBHcI9QyC74Byd.jpg',
                'ringkasan' => 'Timnas Indonesia U-23 gagal meraih gelar juara Piala AFF U-23 2025 setelah kalah tipis 0-1 dari rival abadi, Vietnam U-23, di partai final.',
                'isi' => 'Jakarta, 19 Oktober 2025 - Mimpi Garuda Muda untuk mengangkat trofi Piala AFF U-23 2025 di hadapan publik sendiri harus pupus. Tim asuhan Indra Sjafri harus mengakui keunggulan Vietnam U-23 dengan skor akhir 0-1.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Indonesia Sentris Jadi Prioritas RPJPN 2025-2045, Pembangunan Infrastruktur Luar Jawa Dikebut',
                'slug' => 'indonesia-sentris-jadi-prioritas-rpjpn-2025-2045-pembangunan-infrastruktur-luar-jawa-dikebut',
                'kategori_id' => $politikId,
                'penulis_id' => $penulisIds[0], // Aizar
                'kategori' => 'Politik',
                'penulis' => 'Aizar',
                'foto' => 'artikel/LLfai6tvqU471PKqLr5ccqnFPhk6mPrbKZprQfAZ.jpg',
                'ringkasan' => 'Pemerintah memastikan pembangunan infrastruktur tidak lagi berpusat di Jawa, sejalan dengan visi "Indonesia Sentris" dalam RPJPN 2025-2045.',
                'isi' => 'Jakarta, 19 Oktober 2025 - Presiden kembali menegaskan komitmen pemerintah dalam melanjutkan pembangunan infrastruktur yang inklusif dan merata di seluruh Indonesia. Visi "Indonesia Sentris" menjadi panduan utama dalam Rencana Pembangunan Jangka Panjang Nasional (RPJPN) 2025-2045.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Kesehatan Mental Jadi Prioritas, Generasi Muda Tuntut Work-Life Balance dan Kerja Fleksibel',
                'slug' => 'kesehatan-mental-jadi-prioritas-generasi-muda-tuntut-work-life-balance-dan-kerja-fleksibel',
                'kategori_id' => $kesehatanId,
                'penulis_id' => $penulisIds[1], // Imel
                'kategori' => 'Kesehatan',
                'penulis' => 'Imel',
                'foto' => 'artikel/lxCwbbL3XNT092m5NAMPFX893VDbO4rur40nFtcs.jpg',
                'ringkasan' => 'Tren Work-Life Balance (WLB) semakin menguat pada 2025. Generasi muda menuntut fleksibilitas waktu dan lokasi kerja demi menjaga kesehatan mental.',
                'isi' => 'Jakarta, 19 Oktober 2025 - Budaya kerja di Indonesia mengalami transformasi signifikan. Generasi muda, khususnya milenial dan Gen Z, semakin vokal menuntut keseimbangan antara kehidupan kerja dan pribadi (work-life balance).',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'PSSI Gelar Seleksi Pemain U-17 Gelombang Kedua, Jaring Talenta Daerah untuk Piala Asia 2026',
                'slug' => 'pssi-gelar-seleksi-pemain-u-17-gelombang-kedua-jaring-talenta-daerah-untuk-piala-asia-2026',
                'kategori_id' => $olahragaId,
                'penulis_id' => $penulisIds[2], // Yusril
                'kategori' => 'Olahraga',
                'penulis' => 'Yusril',
                'foto' => 'artikel/jtNWTM2GuJIXWv4Thb2gBuTsHEFtUZcVNqqaLWlQ.jpg',
                'ringkasan' => 'PSSI kembali menggelar seleksi Timnas U-17 Indonesia, kali ini fokus pada 34 pemain muda dari akademi regional dan SSB di seluruh Indonesia.',
                'isi' => 'Jakarta, 19 Oktober 2025 - PSSI (Persatuan Sepak Bola Seluruh Indonesia) melalui Direktur Tekniknya, mengumumkan dimulainya seleksi gelombang kedua Tim Nasional U-17 untuk persiapan Piala Asia U-17 2026.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
            [
                'judul' => 'Startup EdTech Indonesia Raih Pendanaan Seri B US$ 15 Juta, Ekspansi ke Asia Tenggara',
                'slug' => 'startup-edtech-indonesia-raih-pendanaan-seri-b-us-15-juta-ekspansi-ke-asia-tenggara',
                'kategori_id' => $teknologiId,
                'penulis_id' => $penulisIds[3], // Rara
                'kategori' => 'Teknologi',
                'penulis' => 'Rara',
                'foto' => 'artikel/wlY1OS10JdHqSJqDF0tpJaaQo0Ii9I4Sipslzdzc.jpg',
                'ringkasan' => 'Startup teknologi pendidikan (EdTech) asal Indonesia berhasil menutup putaran pendanaan Seri B senilai US$ 15 juta dari investor regional dan global, membuka jalan ekspansi ke negara-negara Asia Tenggara.',
                'isi' => 'Jakarta, 19 Oktober 2025 - Setelah mengalami masa sulit investor technology startup, sektor EdTech Indonesia kembali menunjukkan tanda-tanda pemulihan. Salah satu startup edukasi digital terkemuka berhasil mengamankan pendanaan Seri B sebesar US$ 15 juta dari konsorsium investor yang dipimpin oleh venture capital regional. Pendanaan ini akan digunakan untuk memperluas layanan ke Vietnam, Thailand, dan Malaysia dalam 18 bulan ke depan.',
                'status' => 'terbit',
                'tanggal_terbit' => '2025-10-19 00:00:00',
            ],
        ];

        foreach ($artikelData as $artikel) {
            Artikel::create($artikel);
        }
    }
}
