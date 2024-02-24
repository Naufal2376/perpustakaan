<?php

namespace App\Http\Controllers\Data;

use App\Models\Koleksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KoleksiController extends Controller
{
    public function data_koleksi()
    {
        $koleksi = Koleksi::all();
        return view('dashboard.data.data_koleksi', compact('koleksi'));
    }
}