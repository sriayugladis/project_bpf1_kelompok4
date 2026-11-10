<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['judul', 'tanggal', 'tempat', 'kuota'])]
class Pelatihan extends Model
{
    protected $casts = ['tanggal' => 'date'];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
