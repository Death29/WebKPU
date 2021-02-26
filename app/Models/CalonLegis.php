<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonLegis extends Model
{
    use HasFactory;

    protected $table = "calonlegis";
    protected $fillable = [
        "nim",
        "nama",
        "jenis_legislatif",
        "fakultas",
        "jurusan",
        "suara",
    ];
}
