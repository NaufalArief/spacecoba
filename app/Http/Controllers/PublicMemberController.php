<?php

namespace App\Http\Controllers;

use App\Models\Member; // Pastikan model Member di-import
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicMemberController extends Controller
{
    /**
     * Menampilkan halaman daftar semua anggota (grid).
     */
    public function index(): View
    {
        // Mengambil semua data dari tabel 'member', diurutkan berdasarkan nama
        $members = Member::orderBy('nama', 'asc')->get();

        // Mengirim data 'members' ke view 'members.blade.php'
        return view('members', compact('members'));
    }

    /**
     * Menampilkan halaman profil detail untuk satu anggota.
     * Laravel akan secara otomatis menemukan member berdasarkan NPM di URL.
     */
    public function show(Member $member): View
    {
        // Mengirim data satu member spesifik ke view 'member-profile'
        return view('member-profile', compact('member'));
    }
}
