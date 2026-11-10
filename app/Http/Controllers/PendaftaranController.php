<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        return view('pendaftaran', [
            'pelatihans' => Pelatihan::withCount('pendaftarans')->orderBy('tanggal')->get(),
            'terpilih'   => $request->query('pelatihan'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pelatihan_id' => 'required|exists:pelatihans,id',
            'nama'         => 'required|string|max:100',
            'nim'          => 'required|string|max:20',
            'kelas'        => 'required|string|max:20',
        ]);

        $pelatihan = Pelatihan::withCount('pendaftarans')->findOrFail($data['pelatihan_id']);

        if ($pelatihan->pendaftarans_count >= $pelatihan->kuota) {
            return back()->withErrors(['pelatihan_id' => 'Kuota pelatihan sudah penuh.'])->withInput();
        }
        if ($pelatihan->pendaftarans()->where('nim', $data['nim'])->exists()) {
            return back()->withErrors(['nim' => 'NIM ini sudah terdaftar di pelatihan tersebut.'])->withInput();
        }

        Pendaftaran::create($data);

        return redirect()->route('pendaftaran')
            ->with('success', "Pendaftaran berhasil. {$data['nama']} terdaftar di {$pelatihan->judul}.");
    }
}
