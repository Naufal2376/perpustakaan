<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function data_user()
    {
        $data = User::all();
        return view('dashboard.user.data.data_user', compact('data'));
    }
}