<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PotensiController extends Controller
{
    // Menampilkan halaman Potensi di situs web
    public function show()
    {
        $potensi = Potensi::first(); 
        return view('potensi', ['potensi' => $potensi]); 
    }

    public function index()
{
    $posts = Berita::latest()->take(5)->get(); // Mengambil 5 berita terbaru
    $potensi = Potensi::first(); // Mengambil data Potensi Desa pertama
    return view('home', ['posts' => $posts, 'potensi' => $potensi]);
}
    
    // Menampilkan dashboard Potensi untuk admin
    public function dashboard()
    {
        $potensi = Potensi::first(); 
        return view('dash.potensi', ['potensi' => $potensi]);
    }

    // Mengupdate konten Potensi
    public function update(Request $request, Potensi $potensi)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            // Hapus gambar lama jika ada
            if ($potensi->picture) {
                Storage::disk('public')->delete($potensi->picture);
            }
            $path = $request->file('picture')->store('images', 'public');
            $potensi->picture = $path;
        }

        $potensi->title = $request->title;
        $potensi->content = $request->content;
        $potensi->save();

        return redirect()->route('dash.potensi')->with('success', 'Potensi updated successfully.');
    }
}
