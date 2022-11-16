<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Pelkat;
use App\Models\Sekwil;
use App\Models\Kakel;
use App\Models\DetailPelkat;
use App\Models\DetailKakel;
use DB;

class HomeController extends Controller
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
    public function index()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();

        return view('home', compact('anggota', 'pelkat', 'sekwil', 'kakel'));
    }

    public function anggota()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();

        $total_anggota = Anggota::select(DB::raw("CAST(COUNT(nama) as int) as total_anggota"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total_anggota');

        $bulan = Anggota::select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        return view('dashboard.anggota.index', compact('anggota', 'pelkat', 'sekwil', 'kakel','total_anggota','bulan'));
    }

    public function pelkat()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();
        $det_pelkat = DetailPelkat::get();

        return view('dashboard.pelkat.index', compact('anggota', 'pelkat', 'sekwil', 'kakel','det_pelkat'));
    }

    public function sekwil()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();

        return view('dashboard.sekwil.index', compact('anggota', 'pelkat', 'sekwil', 'kakel'));
    }
}
