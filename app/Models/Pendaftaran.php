<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['pelatihan_id', 'nama', 'nim', 'kelas'])]
class Pendaftaran extends Model
{
    protected $table = 'pendaftarans';

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class);
    }
}
