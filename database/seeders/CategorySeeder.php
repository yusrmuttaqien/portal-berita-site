<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'Politik',
                'slug' => 'politik',
                'deskripsi' => 'Berita dan artikel seputar politik nasional dan internasional.',
                'aktif' => true
            ],
            [
                'nama_kategori' => 'Ekonomi',
                'slug' => 'ekonomi',
                'deskripsi' => 'Informasi terkini mengenai ekonomi, bisnis, dan keuangan.',
                'aktif' => true
            ],
            [
                'nama_kategori' => 'Teknologi',
                'slug' => 'teknologi',
                'deskripsi' => 'Perkembangan teknologi dan inovasi digital.',
                'aktif' => true
            ],
            [
                'nama_kategori' => 'Olahraga',
                'slug' => 'olahraga',
                'deskripsi' => 'Berita olahraga nasional dan internasional',
                'aktif' => true
            ],
            [
                'nama_kategori' => 'Kesehatan',
                'slug' => 'kesehatan',
                'deskripsi' => 'Berita kesehatan dan berita medis terbaru',
                'aktif' => true
            ]
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}
