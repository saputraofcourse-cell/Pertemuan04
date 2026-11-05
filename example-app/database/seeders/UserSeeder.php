<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $akun = [
            ['Admin',     'admin@gmail.com',     1],
            ['Budi',      'user@gmail.com',      2],
            ['Mahasiswa', 'mahasiswa@gmail.com', 3],
            ['Dosen 1',   'dosen@gmail.com',     4],
        ];

        foreach ($akun as [$nama, $email, $level]) {
            User::updateOrCreate(
                ['email' => $email],
                ['name' => $nama, 'password' => 'password', 'level' => $level]
            );
        }
    }
}