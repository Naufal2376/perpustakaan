<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function data_laporan()
    {
        return view('dashboard.user.data.data_laporan');
    }
}