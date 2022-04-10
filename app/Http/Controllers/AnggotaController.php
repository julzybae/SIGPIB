<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use File;
use Carbon\Carbon;
use Alert;

class AnggotaController extends Controller
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
    public function tampil_anggota()
    {
        $anggota = Anggota::orderBy('updated_at', 'desc')->get();

        return view('anggota.index', compact('anggota'));
    }

    public function ambil_kabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabupatens = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option hidden disabled selected value>Pilih Kabupaten</option>";

        foreach($kabupatens as $kabupaten)
        {
            $option .= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }

        echo $option;
    }

    public function tambah_anggota()
    {
        // Memanggil models IndoRegion
        $provinces = Province::all();

        // Membuat kode anggota secara otomatis
        $getRow = Anggota::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        $lastId = $getRow->first();
        $kode = "GPIB00001";
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                $kode = "GPIB0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                $kode = "GPIB000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                $kode = "GPIB00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                $kode = "GPIB0".''.($lastId->id + 1);
            } else {
                $kode = "GPIB".''.($lastId->id + 1);
            }
        }

        $anggota = Anggota::get();

        return view('anggota.create', compact('kode', 'anggota', 'provinces'));
    }

    public function simpan_anggota(Request $request)
    {
        // Validasi Form
        $this->validate($request,
        // Aturan
        [
            'nama' => 'required|min:3',
            'jk' => 'required',
            'tempat_lahir' => 'required|min:3',
            'tgl_lahir' => 'required',
            'no_hp' => 'required|min:7',
            'pekerjaan' => 'required|min:3',
            'sts_keluarga' => 'required',
            'alamat' => 'required|min:3',
            'kabupaten' => 'required',
            'kelurahan' => 'required',
            'provinsi' => 'required',
            'kecamatan' => 'required',
            'goldar' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png|max:2048',
        ],
        // Pesan
        [
            // Required
            'nama.required' => 'Nama lengkap wajib diisi!',
            'jk.required' => 'Jenis kelamin wajib diisi!',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi!',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi!',
            'no_hp.required' => 'Nomor handphone wajib diisi!',
            'pekerjaan.required' => 'Pekerjaan wajib diisi!',
            'sts_keluarga.required' => 'Status keluarga wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'kabupaten.required' => 'Kabupaten wajib diisi!',
            'kelurahan.required' => 'Kelurahan wajib diisi!',
            'provinsi.required' => 'Provinsi wajib diisi!',
            'kecamatan.required' => 'Kecamatan wajib diisi!',
            'goldar.required' => 'Golongan darah wajib diisi!',

            // Min
            'nama.min' => 'Nama lengkap diisi minimal 3 karakter!',
            'tempat_lahir.min' => 'Tempat lahir diisi minimal 3 karakter!',
            'no_hp.min' => 'Nomor handphone diisi minimal 7 karakter!',
            'pekerjaan.min' => 'Pekerjaan diisi minimal 3 karakter!',
            'alamat.min' => 'Alamat diisi minimal 3 karakter!',

            // Tipe File
            'gambar.mimes' => 'Tipe file yang dapat di unggah adalah jpg/jpeg/png',

            // Ukuran file
            'gambar.max' => 'Ukuran maksimal file gambar adalah 2mb'
        ]);

        // Proses upload gambar
        if($request->file('gambar') == '') {
            $gambar = NULL;
        } else {
            $nama_file_dikonversi = $request->nama;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->gambar->getClientOriginalExtension();
            $simpan_nama_file = $nama_file_dikonversi.'-'.$dt->format('d-M-Y').'.'.$extension;
            $gambar = $request->file('gambar')->move('images/anggota', $simpan_nama_file);
            $gambar = $simpan_nama_file;
        }

        Anggota::create([
            'kode_anggota' => $request->input('kode_anggota'),
            'nama' => $request->input('nama'),
            'jk' => $request->input('jk'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'no_hp' => $request->input('no_hp'),
            'pekerjaan' => $request->input('pekerjaan'),
            'sts_keluarga' => $request->input('sts_keluarga'),
            'alamat' => $request->input('alamat'),
            'kabupaten' => $request->input('kabupaten'),
            'kelurahan' => $request->input('kelurahan'),
            'provinsi' => $request->input('provinsi'),
            'kecamatan' => $request->input('kecamatan'),
            'goldar' => $request->input('goldar'),
            'gambar' => $gambar
        ]);

        Alert::success('Data berhasil disimpan!', '');

        return redirect()->route('anggota.index');
    }

    public function tampil_ubah_anggota($id)
    {
        // Memanggil models IndoRegion
        $provinces = Province::all();
        $regencies = Regency::all();

        $anggota = Anggota::find($id);

        return view('anggota.edit', compact('anggota', 'provinces','regencies'));
    }

    public function perbarui_anggota(Request $request, $id)
    {
        $anggota = Anggota::find($id);

        // Validasi Form
        $this->validate($request,
        // Aturan
        [
            'nama' => 'required|min:3',
            'jk' => 'required',
            'tempat_lahir' => 'required|min:3',
            'tgl_lahir' => 'required',
            'no_hp' => 'required|min:7',
            'pekerjaan' => 'required|min:3',
            'sts_keluarga' => 'required',
            'alamat' => 'required|min:3',
            'kabupaten' => 'required',
            'kelurahan' => 'required',
            'provinsi' => 'required',
            'kecamatan' => 'required',
            'goldar' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png|max:2048',
        ],
        // Pesan
        [
            // Required
            'nama.required' => 'Nama lengkap wajib diisi!',
            'jk.required' => 'Jenis kelamin wajib diisi!',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi!',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi!',
            'no_hp.required' => 'Nomor handphone wajib diisi!',
            'pekerjaan.required' => 'Pekerjaan wajib diisi!',
            'sts_keluarga.required' => 'Status keluarga wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'kabupaten.required' => 'Kabupaten wajib diisi!',
            'kelurahan.required' => 'Kelurahan wajib diisi!',
            'provinsi.required' => 'Provinsi wajib diisi!',
            'kecamatan.required' => 'Kecamatan wajib diisi!',
            'goldar.required' => 'Golongan darah wajib diisi!',

            // Min
            'nama.min' => 'Nama lengkap diisi minimal 3 karakter!',
            'tempat_lahir.min' => 'Tempat lahir diisi minimal 3 karakter!',
            'no_hp.min' => 'Nomor handphone diisi minimal 7 karakter!',
            'pekerjaan.min' => 'Pekerjaan diisi minimal 3 karakter!',
            'alamat.min' => 'Alamat diisi minimal 3 karakter!',

            // Tipe File
            'gambar.mimes' => 'Tipe file yang dapat di unggah adalah jpg/jpeg/png',

            // Ukuran file
            'gambar.max' => 'Ukuran maksimal file gambar adalah 2mb'
        ]);

        $anggota->nama = $request->input('nama');
        $anggota->jk = $request->input('jk');
        $anggota->tempat_lahir = $request->input('tempat_lahir');
        $anggota->tgl_lahir = $request->input('tgl_lahir');
        $anggota->no_hp = $request->input('no_hp');
        $anggota->pekerjaan = $request->input('pekerjaan');
        $anggota->sts_keluarga = $request->input('sts_keluarga');
        $anggota->alamat = $request->input('alamat');
        $anggota->kabupaten = $request->input('kabupaten');
        $anggota->kelurahan = $request->input('kelurahan');
        $anggota->provinsi = $request->input('provinsi');
        $anggota->kecamatan = $request->input('kecamatan');
        $anggota->goldar = $request->input('goldar');

        // Proses upload gambar
        if($request->file('gambar') == '') {
            $gambar = NULL;
        } else {
            $nama_file_dikonversi = $request->nama;
            $dt = Carbon::now();
            // $nama_file = pathinfo($nama_file_dikonversi, PATHINFO_FILENAME);
            $extension = $request->gambar->getClientOriginalExtension();
            $simpan_nama_file = $nama_file_dikonversi.'-'.$dt->format('d-M-Y').'.'.$extension;
            $gambar = $request->file('gambar')->move('images/anggota', $simpan_nama_file);
            $anggota->gambar = $simpan_nama_file;
        }

        $anggota->update();

        Alert::success('Data berhasil diubah!', '');

        return redirect()->route('anggota.index');
    }

    public function tampil_detail_anggota($id)
    {
        $anggota = Anggota::find($id);

        // Memanggil models IndoRegion
        $provinsi = Anggota::join('provinces', 'provinces.id', '=' , 'anggota.provinsi')
        ->get(['provinces.name']);

        $kabupaten = Anggota::join('regencies', 'regencies.id', '=' , 'anggota.kabupaten')
        ->get('regencies.name');

        return view('anggota.show', compact('anggota', 'provinsi', 'kabupaten'));
    }

    public function hapus_anggota($id)
    {
        $anggota = Anggota::find($id);
        $file_gambar = 'images/anggota/'. $anggota->gambar;

        if(File::exists($file_gambar))
        {
            File::delete($file_gambar);
        }

        $anggota->delete();

        Alert::success('Data berhasil dihapus!', '');

        return redirect()->back();
    }
}
