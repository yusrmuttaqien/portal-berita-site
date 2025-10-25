<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['role' => 'Super Admin', 'deskripsi' => 'Akses penuh ke seluruh sistem'],
            ['role' => 'Admin', 'deskripsi' => 'Akses ke manajemen konten dan pengguna'],
            ['role' => 'Editor', 'deskripsi' => 'Akses ke manajemen konten artikel'],
            ['role' => 'Penulis', 'deskripsi' => 'Akses terbatas hanya untuk menulis artikel'],
        ];

        foreach ($roles as $roleData) {
            Role::create($roleData);
        }
    }
}
