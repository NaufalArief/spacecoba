<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil seeder khusus untuk data anggota
        $this->call([
            MemberSeeder::class,
        ]);

        // Anda bisa menambahkan seeder lain di sini jika ada
    }
}
