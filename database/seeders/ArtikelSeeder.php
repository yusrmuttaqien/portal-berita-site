<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artikel;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 25; $i++) {
            $judul = "Berita Ke-$i: Perkembangan Proyek Nasional";
            $data[] = [
                'judul' => $judul,
                'slug' => Str::slug($judul),
                'kategori' => 'Nasional',
                'penulis' => 'Tim Redaksi',
                'ringkasan' => "Ringkasan berita nomor $i tentang update proyek nasional yang sedang berlangsung.",
                'isi' => "Isi lengkap berita ke-$i yang membahas detail kemajuan proyek nasional serta komentar pejabat terkait.",
                'status' => 'terbit',
                'tanggal_terbit' => Carbon::now()->subDays($i),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Artikel::insert($data);
    }
}
