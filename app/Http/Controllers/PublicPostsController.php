<?php

namespace App\Http\Controllers;

use App\Models\Post; // Pastikan model Post di-import
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicPostsController extends Controller
{
    /**
     * Menampilkan halaman dashboard publik dengan galeri postingan.
     */
    public function index(): View
    {
        // Mengambil semua data dari tabel 'posts', diurutkan dari yang terbaru
        $posts = Post::latest()->get();

        // Mengirim data 'posts' ke view 'dashboard.blade.php'
        return view('about', compact('posts'));
    }
}
