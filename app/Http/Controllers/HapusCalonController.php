<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Models\CalonLegis;

class HapusCalonController extends Controller
{
    public function index($id)
    {
        CalonLegis::find($id)->delete();
        $msg = "Data berhasil dihapus";
        return Redirect::to('/admin')->with(['hapus-msg' => $msg]);
    }
}
