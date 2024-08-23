<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dash(){
        return view('dashboard');
    }
    public function berita(){
        $posts = Berita::all();
        return view('dash.berita', ['posts' => $posts]);
    }
    public function potensi(){
        return view('dash.potensi');
    }
    public function perangkat(){
        return view('dash.perangkat');
    }
    public function sarana(){
        return view('dash.sarana');
    }
    public function kontak(){
        return view('dash.kontak');
    }
    
}
