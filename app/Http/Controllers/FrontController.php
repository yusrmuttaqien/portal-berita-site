<?php

namespace App\Http\Controllers;

use App\Models\Artikel;

class FrontController extends Controller
{
    public function index()
    {
        $artikel = Artikel::where('status', 'terbit')->orderByDesc('created_at', 'desc')->paginate(6);
        return view('front.index', compact('artikel'));
    }

    public function show($slug)
    {
        $a = Artikel::where('slug', $slug)->where('status', 'terbit')->firstOrFail();
        return view('front.show', compact('a'));
    }
}
