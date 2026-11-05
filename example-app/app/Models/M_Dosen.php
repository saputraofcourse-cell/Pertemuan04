<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Dosen extends Model
{
    public function allData()
    {
        return DB::table('tb_dosen')->get();
    }

    public function detailData($id_dosen)
    {
        return DB::table('tb_dosen')->where('id_dosen', $id_dosen)->first();
    }

    public function addData($data)
    {
        DB::table('tb_dosen')->insert($data);
    }

    public function editData($id_dosen, $data)
    {
        DB::table('tb_dosen')->where('id_dosen', $id_dosen)->update($data);
    }

    public function deleteData($id_dosen)
    {
        DB::table('tb_dosen')->where('id_dosen', $id_dosen)->delete();
    }

    // >>> BARU: PEG0001, PEG0002, ... (ambil kode terakhir lalu +1)
    public function kodeOtomatis()
    {
        $terakhir = DB::table('tb_dosen')->max('kode_dosen');
        $urutan   = $terakhir ? (int) substr($terakhir, 3) : 0;

        return 'PEG' . sprintf('%04d', $urutan + 1);
    }
    // <<< BARU
}