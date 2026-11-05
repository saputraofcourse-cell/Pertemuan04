<?php

namespace App\Http\Controllers;

use App\Models\M_Dosen;
use Dompdf\Dompdf;                                                     // BARU
use Illuminate\Http\Request;

class C_Dosen extends Controller
{
    private M_Dosen $M_Dosen;

    public function __construct()
    {
        $this->M_Dosen = new M_Dosen();
    }

    public function index()
    {
        $data = ['dosen' => $this->M_Dosen->allData()];
        return view('v_dosen', $data);
    }

    public function detail($id_dosen)
    {
        $dosen = $this->M_Dosen->detailData($id_dosen);

        if (!$dosen) {
            abort(404);
        }

        return view('v_detaildosen', ['dosen' => $dosen]);
    }

    public function add()
    {
        return view('v_adddosen', ['kode' => $this->M_Dosen->kodeOtomatis()]);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nip'         => 'required|unique:tb_dosen,nip|min:17|max:18',
            'nama_dosen'  => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen'  => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
        ], [
            'nip.required'         => 'NIP wajib diisi !',
            'nip.unique'           => 'NIP ini sudah terdaftar di database !',
            'nip.min'              => 'NIP minimal 17 karakter',
            'nip.max'              => 'NIP maksimal 18 karakter',
            'nama_dosen.required'  => 'Nama Dosen wajib diisi !',
            'mata_kuliah.required' => 'Nama Mata Kuliah wajib diisi !',
            'foto_dosen.required'  => 'Foto Dosen wajib diisi !',
        ]);

        $file     = $request->file('foto_dosen');
        $fileName = $request->nip . '.' . $file->extension();
        $file->move(public_path('foto_dosen'), $fileName);

        $this->M_Dosen->addData([
            'kode_dosen'  => $this->M_Dosen->kodeOtomatis(),
            'nip'         => $request->nip,
            'nama_dosen'  => $request->nama_dosen,
            'mata_kuliah' => $request->mata_kuliah,
            'foto_dosen'  => $fileName,
        ]);

        return redirect()->route('dosen')->with('pesan', 'Data berhasil ditambahkan !');
    }

    public function edit($id_dosen)
    {
        $dosen = $this->M_Dosen->detailData($id_dosen);

        if (!$dosen) {
            abort(404);
        }

        return view('v_editdosen', ['dosen' => $dosen]);
    }

    public function update(Request $request, $id_dosen)
    {
        $request->validate([
            'nama_dosen'  => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen'  => 'nullable|mimes:jpg,jpeg,png,bmp|max:1024',
        ], [
            'nama_dosen.required'  => 'Nama Dosen wajib diisi !',
            'mata_kuliah.required' => 'Nama Mata Kuliah wajib diisi !',
        ]);

        $dosen = $this->M_Dosen->detailData($id_dosen);

        if (!$dosen) {
            abort(404);
        }

        $data = [
            'nama_dosen'  => $request->nama_dosen,
            'mata_kuliah' => $request->mata_kuliah,
        ];

        if ($request->hasFile('foto_dosen')) {
            $file     = $request->file('foto_dosen');
            $fileName = $dosen->nip . '.' . $file->extension();

            if ($dosen->foto_dosen && file_exists(public_path('foto_dosen/' . $dosen->foto_dosen))) {
                unlink(public_path('foto_dosen/' . $dosen->foto_dosen));
            }

            $file->move(public_path('foto_dosen'), $fileName);
            $data['foto_dosen'] = $fileName;
        }

        $this->M_Dosen->editData($id_dosen, $data);

        return redirect()->route('dosen')->with('pesan', 'Data berhasil diupdate !');
    }

    public function delete($id_dosen)
    {
        $dosen = $this->M_Dosen->detailData($id_dosen);

        if ($dosen && $dosen->foto_dosen && file_exists(public_path('foto_dosen/' . $dosen->foto_dosen))) {
            unlink(public_path('foto_dosen/' . $dosen->foto_dosen));
        }

        $this->M_Dosen->deleteData($id_dosen);

        return redirect()->route('dosen')->with('pesan', 'Data berhasil dihapus !');
    }

    // >>> BARU: cetak laporan PDF
    public function print()
    {
        $html = view('v_print', ['dosen' => $this->M_Dosen->allData()])->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return response($dompdf->output(), 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="laporan-dosen.pdf"',
        ]);
    }
    // <<< BARU
}