<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kakel;
use App\Models\Anggota;
use App\Models\Sekwil;
use DB;
use Alert;

class KakelController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tampil_kakel()
    {
        $kakel = Kakel::get();

        return view('kakel.index', compact('kakel'));
    }

    public function tambah_kakel()
    {
        $anggota = Anggota::WhereNotExists(function($query) {
            $query->select(DB::raw(1))
            ->from('kakel')
            ->whereRaw('kakel.id_anggota = anggota.id');
         })->get();

        $sekwil = Sekwil::get();

        return view('kakel.create', compact('anggota', 'sekwil'));
    }

    public function simpan_kakel(Request $request)
    {
        // Validasi Form
        $this->validate($request,
        // Aturan
        [
            'id_anggota' => 'required',
            'id_sekwil' => 'required',
            'nomor_kk' => 'required|min:3|unique:kakel,nomor_kk,'
        ],
        // Pesan
        [
            // Required
            'id_anggota.required' => 'Kepala keluarga wajib diisi!',
            'id_sekwil.required' => 'Sektor wilayah wajib diisi!',
            'nomor_kk.required' => 'Nomor kartu keluarga wajib diisi!',

            // Min
            'nomor_kk.min' => 'Nomor kartu keluarga diisi minimal 3 karakter!',

            // Unique
            'nomor_kk.unique' => 'Nomor kartu keluarga sudah terdaftar!'

        ]);

        Kakel::create([
            'id_anggota' => $request->input('id_anggota'),
            'id_sekwil' => $request->input('id_sekwil'),
            'nomor_kk' => $request->input('nomor_kk')
        ]);

        Alert::success('Data berhasil disimpan!', '');

        return redirect()->route('kakel.index');
    }

    public function hapus_kakel($id)
    {
        Kakel::find($id)->delete();

        Alert::success('Data berhasil dihapus!', '');

        return redirect()->back();
    }
}

