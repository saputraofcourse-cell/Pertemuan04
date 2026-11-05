<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Produk extends Controller
{
    
    public function index() {
        return view('pages.produk');
    }

    public function tambahProduk() {
        $data_gudang = [
            'nama_gudang' => 'Gudang A',
            'lokasi' => 'Subang',
            'type' => 'Pusat'
        ];
        return view('pages.tambahProduk',$data_gudang);
    }

}
