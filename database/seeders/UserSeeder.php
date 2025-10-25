<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Administrator', // 1
                'email' => 'superadmin@yopmail.com',
                'password' => bcrypt('password'),
                'role_id' => 1,
            ],
            [
                'name' => 'Admin Portal', // 2
                'email' => 'admin@yopmail.com',
                'password' => bcrypt('password'),
                'role_id' => 2
            ],
            [
                'name' => 'Editor Utama', // 3
                'email' => 'editor@yopmail.com',
                'password' => bcrypt('password'),
                'role_id' => 3
            ],
            [
                'name' => 'Aizar', // 4
                'email' => 'aizar.penulis@yopmail.com',
                'password' => bcrypt('password'),
                'role_id' => 4
            ],
            [
                'name' => 'Imel', // 5
                'email' => 'imel.penulis@yopmail.com',
                'password' => bcrypt('password'),
                'role_id' => 4
            ],
            [
                'name' => 'Yusril', // 6
                'email' => 'yusril.penulis@yopmail.com',
                'password' => bcrypt('password'),
                'role_id' => 4
            ],
            [
                'name' => 'Rara', // 7
                'email' => 'rara.penulis@yopmail.com',
                'password' => bcrypt('password'),
                'role_id' => 4
            ],
            [
                'name' => 'Stevanus', // 8
                'email' => 'stevanus.penulis@yopmail.com',
                'password' => bcrypt('password'),
                'role_id' => 4
            ],
            [
                'name' => 'Budi', // 9
                'email' => 'budi.penulis@yopmail.com',
                'password' => bcrypt('password'),
                'role_id' => 4
            ],
            [
                'name' => 'Tono', // 10
                'email' => 'tono.penulis@yopmail.com',
                'password' => bcrypt('password'),
                'role_id' => 4
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
