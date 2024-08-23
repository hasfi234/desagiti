<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kontak;
use App\Models\Sarana;
use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function shownews($slug)
{
    $post = Berita::where('slug', $slug)->firstOrFail();
    return view('news.show', compact('post'));
}
    // Menampilkan berita di situs web
    public function show()
    {
        $recents = Berita::orderBy('created_at', 'desc')->get();
        $kontaks = Kontak::orderBy('created_at', 'desc')->take(1)->get();
    $posts = Berita::paginate(5);; // Mengambil semua data berita, diurutkan dari yang terbaru
    return view('news', ['recents' => $recents, 'kontaks' => $kontaks, 'posts' => $posts]);
    }

    public function index()
    {
        $kontaks = Kontak::orderBy('created_at', 'desc')->take(1)->get();
        $saranas = Sarana::all();
        $posts = Berita::all(); // Mengambil 5 berita terbaru
        $potensi = Potensi::all()->take(1); // Mengambil data Potensi Desa pertama
        $recents = Berita::orderBy('created_at', 'desc')->take(3)->get();
    return view('home', ['kontaks' => $kontaks, 'saranas' => $saranas, 'posts' => $posts, 'potensi' => $potensi]);
    }    

    // Menampilkan dashboard berita untuk admin
    public function dashboard()
    {
        $posts = Berita::all();
        return view('dash.berita', ['posts' => $posts]);
    }

    // Menyimpan berita baru
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('picture') ? $request->file('picture')->store('images', 'public') : null;

        Berita::create([
            'title' => $request->title,
            'content' => $request->content,
            'picture' => $path,
        ]);

        return redirect()->route('dash.berita')->with('success', 'News item added successfully.');
    }

    // Menampilkan form edit berita
    public function edit(Berita $news)
    {
        $posts = Berita::all(); // Load all news for the table display
        return view('dash.berita', ['posts' => $posts, 'news' => $news]); // Pass the news item to the form
    }

    // Mengupdate berita
    public function update(Request $request, Berita $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            // Hapus gambar lama jika ada
            if ($news->picture) {
                Storage::disk('public')->delete($news->picture);
            }
            $path = $request->file('picture')->store('images', 'public');
            $news->picture = $path;
        }

        $news->title = $request->title;
        $news->content = $request->content;
        $news->save();

        return redirect()->route('dash.berita')->with('success', 'News item updated successfully.');
    }

    // Menghapus berita
    public function destroy(Berita $news)
    {
        // Hapus gambar jika ada
        if ($news->picture) {
            Storage::disk('public')->delete($news->picture);
        }
        $news->delete();

        return redirect()->route('dash.berita')->with('success', 'News item deleted successfully.');
    }
}
