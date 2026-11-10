<?php

namespace Database\Seeders;

use App\Models\Modul;
use App\Models\Pelatihan;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => 'password']
        );

        // [judul, tanggal, jumlah peserta contoh]
        $jadwal = [
            ['Dasar jaringan komputer',       now()->next('Saturday'),               18],
            ['Konfigurasi router dan switch', now()->next('Saturday')->addWeek(),     9],
            ['Pengenalan subnetting',         now()->next('Saturday')->addWeeks(2),   3],
        ];

        foreach ($jadwal as [$judul, $tanggal, $jumlah]) {
            $p = Pelatihan::firstOrCreate(
                ['judul' => $judul],
                ['tanggal' => $tanggal, 'tempat' => 'Lab jaringan', 'kuota' => 30]
            );
            for ($i = 1; $i <= $jumlah; $i++) {
                Pendaftaran::firstOrCreate(
                    ['pelatihan_id' => $p->id, 'nim' => sprintf('24%03d%05d', $p->id, $i)],
                    ['nama' => "Peserta $i", 'kelas' => '2TIB']
                );
            }
        }

        foreach ([
            ['Pengenalan jaringan komputer', 1, 'dasar'],
            ['Konfigurasi VLAN',             2, 'menengah'],
            ['Routing OSPF dan EIGRP',       3, 'lanjut'],
        ] as [$judul, $pertemuan, $level]) {
            Modul::firstOrCreate(['judul' => $judul], ['pertemuan' => $pertemuan, 'level' => $level, 'link' => '#']);
        }
    }
}
