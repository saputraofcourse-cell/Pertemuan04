<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tb_dosen', function (Blueprint $table) {
            $table->string('kode_dosen', 10)->nullable()->unique()->after('id_dosen');
        });

        // isi kode untuk data lama: PEG0001, PEG0002, ...
        foreach (DB::table('tb_dosen')->orderBy('id_dosen')->get() as $d) {
            DB::table('tb_dosen')
                ->where('id_dosen', $d->id_dosen)
                ->update(['kode_dosen' => 'PEG' . sprintf('%04d', $d->id_dosen)]);
        }
    }

    public function down(): void
    {
        Schema::table('tb_dosen', function (Blueprint $table) {
            $table->dropUnique(['kode_dosen']);
            $table->dropColumn('kode_dosen');
        });
    }
};