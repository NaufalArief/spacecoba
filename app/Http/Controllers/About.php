<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class About extends Controller
{
    /**
     * Menampilkan halaman dashboard.
     */
    public function index(): View
    {
        // Di sini Anda bisa menambahkan logika untuk mengambil data
        // $data = ...

        return view('about'); // atau return view('dashboard', ['data' => $data]);
    }
}
