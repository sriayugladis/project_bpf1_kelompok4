<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['judul', 'pertemuan', 'level', 'link'])]
class Modul extends Model
{
    protected $table = 'moduls';
}
