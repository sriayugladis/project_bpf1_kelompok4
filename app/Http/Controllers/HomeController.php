<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\Pelatihan;
use App\Models\Pendaftaran;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'pelatihans'      => Pelatihan::withCount('pendaftarans')
                                    ->whereDate('tanggal', '>=', today())
                                    ->orderBy('tanggal')->take(6)->get(),
            'jumlahPelatihan' => Pelatihan::count(),
            'jumlahModul'     => Modul::count(),
            'jumlahPeserta'   => Pendaftaran::count(),
        ]);
    }
}
