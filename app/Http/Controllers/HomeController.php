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

    // Dashboard
    public function index()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();

        return view('home', compact('anggota', 'pelkat', 'sekwil', 'kakel'));
    }

    // Anggota
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

    // Pelkat
    public function pelkat()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();
        $det_pelkat = DetailPelkat::get();

        return view('dashboard.pelkat.index', compact('anggota', 'pelkat', 'sekwil', 'kakel','det_pelkat'));
    }

    public function pelkat_pa()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();
        $det_pelkat = DetailPelkat::get();

        $total_anggota = DetailPelkat::where('id_pelkat', '1')
        ->select(DB::raw("CAST(COUNT(id_anggota) as int) as total_anggota"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total_anggota');

        $bulan = DetailPelkat::where('id_pelkat', '1')
        ->select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        return view('dashboard.pelkat.pa', compact('anggota', 'pelkat', 'sekwil', 'kakel','det_pelkat','total_anggota','bulan'));
    }

    public function pelkat_pt()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();
        $det_pelkat = DetailPelkat::get();

        $total_anggota = DetailPelkat::where('id_pelkat', '2')
        ->select(DB::raw("CAST(COUNT(id_anggota) as int) as total_anggota"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total_anggota');

        $bulan = DetailPelkat::where('id_pelkat', '2')
        ->select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        return view('dashboard.pelkat.pt', compact('anggota', 'pelkat', 'sekwil', 'kakel','det_pelkat','total_anggota','bulan'));
    }

    public function pelkat_gp()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();
        $det_pelkat = DetailPelkat::get();

        $total_anggota = DetailPelkat::where('id_pelkat', '3')
        ->select(DB::raw("CAST(COUNT(id_anggota) as int) as total_anggota"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total_anggota');

        $bulan = DetailPelkat::where('id_pelkat', '3')
        ->select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        return view('dashboard.pelkat.gp', compact('anggota', 'pelkat', 'sekwil', 'kakel','det_pelkat','total_anggota','bulan'));
    }

    public function pelkat_pkp()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();
        $det_pelkat = DetailPelkat::get();

        $total_anggota = DetailPelkat::where('id_pelkat', '4')
        ->select(DB::raw("CAST(COUNT(id_anggota) as int) as total_anggota"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total_anggota');

        $bulan = DetailPelkat::where('id_pelkat', '4')
        ->select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        return view('dashboard.pelkat.pkp', compact('anggota', 'pelkat', 'sekwil', 'kakel','det_pelkat','total_anggota','bulan'));
    }

    public function pelkat_pkb()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();
        $det_pelkat = DetailPelkat::get();

        $total_anggota = DetailPelkat::where('id_pelkat', '5')
        ->select(DB::raw("CAST(COUNT(id_anggota) as int) as total_anggota"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total_anggota');

        $bulan = DetailPelkat::where('id_pelkat', '5')
        ->select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        return view('dashboard.pelkat.pkb', compact('anggota', 'pelkat', 'sekwil', 'kakel','det_pelkat','total_anggota','bulan'));
    }

    public function pelkat_pklu()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();
        $det_pelkat = DetailPelkat::get();

        $total_anggota = DetailPelkat::where('id_pelkat', '6')
        ->select(DB::raw("CAST(COUNT(id_anggota) as int) as total_anggota"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total_anggota');

        $bulan = DetailPelkat::where('id_pelkat', '6')
        ->select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        return view('dashboard.pelkat.pklu', compact('anggota', 'pelkat', 'sekwil', 'kakel','det_pelkat','total_anggota','bulan'));
    }

    // Sekwil
    public function sekwil()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();

        return view('dashboard.sekwil.index', compact('anggota', 'pelkat', 'sekwil', 'kakel'));
    }

    public function sekwil1()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();

        $total_kakel = Kakel::where('id_sekwil', '1')
        ->select(DB::raw("CAST(COUNT(id_anggota) as int) as total_anggota"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total_anggota');

        $bulan = Kakel::where('id_sekwil', '1')
        ->select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        return view('dashboard.sekwil.sektor1', compact('anggota', 'pelkat', 'sekwil', 'kakel','total_kakel','bulan'));
    }

    public function sekwil2()
    {
        $anggota = Anggota::get();
        $pelkat = Pelkat::get();
        $sekwil = Sekwil::get();
        $kakel = Kakel::get();

        $total_kakel = Kakel::where('id_sekwil', '2')
        ->select(DB::raw("CAST(COUNT(id_anggota) as int) as total_anggota"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total_anggota');

        $bulan = Kakel::where('id_sekwil', '2')
        ->select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        return view('dashboard.sekwil.sektor2', compact('anggota', 'pelkat', 'sekwil', 'kakel','total_kakel','bulan'));
    }
}
