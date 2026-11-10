<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function index(Request $request)
    {
        $level = $request->query('level');

        return view('modul', [
            'moduls' => Modul::when($level, fn ($q) => $q->where('level', $level))
                            ->orderBy('pertemuan')->get(),
            'level'  => $level,
        ]);
    }
}
