<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function dashboard()
    {
        $totalArtikel = \App\Models\Artikel::count();
        $artikelTerbit = \App\Models\Artikel::where('status', 'terbit')->count();
        $artikelDraft = \App\Models\Artikel::where('status', 'draft')->count();

        return view('admin.dashboard', compact('totalArtikel', 'artikelTerbit', 'artikelDraft'));
    }

    public function index()
    {
        $artikels = Artikel::latest()->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        $artikel = new Artikel();
        return view('admin.artikel.create', compact('artikel'));
    }

    public function store(Request $request)
    {
        $data = $this->validasi($request);
        $data['slug'] = Str::slug($data['judul']);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('artikel', 'public');
        }

        Artikel::create($data);
        return redirect()->route('admin.artikel.index')->with('sukses', 'Artikel berhasil disimpan.');
    }


    public function edit(Artikel $artikel)
    {
        return view('admin.artikel.edit', compact('artikel'));
    }


    public function update(Request $request, Artikel $artikel)
    {
        $data = $this->validasi($request, $artikel->id_artikel);
        $data['slug'] = Str::slug($data['judul']);

        if ($request->hasFile('foto')) {
            if ($artikel->foto && file_exists(storage_path('app/public/' . $artikel->foto))) {
                unlink(storage_path('app/public/' . $artikel->foto));
            }
            $data['foto'] = $request->file('foto')->store('artikel', 'public');
        }


        $artikel->update($data);
        return redirect()->route('admin.artikel.index')->with('sukses', 'Artikel diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return back()->with('sukses', 'Artikel dihapus.');
    }

    private function validasi(Request $r, $id = null): array
    {
        return $r->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'penulis' => 'required|string|max:100',
            'ringkasan' => 'required|string',
            'isi' => 'required',
            'status' => 'required|in:draft,terbit',
            'tanggal_terbit' => 'nullable|date',
        ]);
    }
}
