<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tb_dosen')->insertOrIgnore([
            [
                'nip'         => '199001262019031025',
                'nama_dosen'  => 'Mohammad Iqbal,S.Kom.,M.T.',
                'mata_kuliah' => 'Pemrograman Berorientasi Objek',
                'foto_dosen'  => null,
            ],
            [
                'nip'         => '198801052019031001',
                'nama_dosen'  => 'Tri Herdiawan Apandi,S.ST.,M.T.',
                'mata_kuliah' => 'Data Mining',
                'foto_dosen'  => null,
            ],
        ]);
    }
}