<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Models\CalonLegis;

class EditCalonController extends Controller
{
    public function index($id)
    {
        $calonlegis = CalonLegis::where("id", $id)->get();
        return view('edit-calon', ["calonlegis" => $calonlegis]);
    }
}
