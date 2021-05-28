<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilih;

class InfoPemilihController extends Controller
{
    public function index()
    {
        $pemilih = Pemilih::paginate(20);
        return view('info-pemilih', ["pemilih" => $pemilih]);
    }
}
