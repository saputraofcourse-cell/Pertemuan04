<?php

namespace App\Http\Controllers;

use App\Models\User;

class C_Admin extends Controller
{
    public function about()
    {
        return view('v_about');
    }

    public function chart()
    {
        // jumlah user per tahun (3 tahun ke belakang s/d 2 tahun ke depan)
        $tahun  = range((int) date('Y') - 3, (int) date('Y') + 2);
        $jumlah = [];

        foreach ($tahun as $t) {
            $jumlah[] = User::whereYear('created_at', $t)->count();
        }

        return view('v_chart', ['tahun' => $tahun, 'jumlah' => $jumlah]);
    }

    public function invoice()
    {
        $item = [
            ['qty' => 1, 'produk' => 'Call of Duty',    'serial' => '455-981-221', 'harga' => 64500],
            ['qty' => 1, 'produk' => 'Need for Speed IV', 'serial' => '247-925-726', 'harga' => 50000],
            ['qty' => 1, 'produk' => 'Monsters DVD',    'serial' => '735-845-642', 'harga' => 10700],
            ['qty' => 1, 'produk' => 'Grown Ups Blu-Ray', 'serial' => '422-568-642', 'harga' => 25990],
        ];

        return view('v_invoice', ['item' => $item]);
    }
}