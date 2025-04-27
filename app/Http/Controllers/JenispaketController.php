<?php

namespace App\Http\Controllers;

use App\Models\Jenispaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JenispaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenispakets = Jenispaket::all();
        return view('admin.jenispaket.index', compact('jenispakets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|max:30',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'harga' => 'required|max:12'
        ], [
            'nama_paket.required' => 'nama paket wajib diisi',
            'deskripsi.required' => 'deskripsi wajib diisi',
            'gambar.required' => 'gambar wajib diupload',
            'harga.required' => 'harga wajib diisi'
        ]);

        $namaFile = $request->file('gambar')->store('jenispaket','public');
        Jenispaket::create([
            'nama_paket' => $request->input('nama_paket'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $namaFile,
            'harga' => $request->input('harga')
        ]);
        
        return redirect()->route('admin.jenispaket.index')->with('success', 'Data Jenis paket Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenispakets = Jenispaket::findOrFail($id);
        return view('admin.Jenispaket.edit', compact('jenispakets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_paket' => 'required|max:30',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'harga' => 'required|max:12'
        ], [
            'nama_paket.required' => 'nama paket wajib diisi',
            'deskripsi.required' => 'deskripsi wajib diisi',
            'gambar.required' => 'gambar wajib diupload',
            'harga.required' => 'harga wajib diisi'
        ]);
        
        $jenispakets = Jenispaket::findOrFail($id);

        // Jika ada gambar yang diunggah, simpan dan hapus gambar lama
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($jenispakets->gambar) {
                Storage::disk('public')->delete($jenispakets->gambar);
            }
            
            $namaFile = $request->file('gambar')->store('jenispaket', 'public');
        } else {
            $namaFile = $jenispakets->gambar; // Gunakan gambar lama jika tidak ada yang baru
        }
    
        $jenispakets->update([
            'nama_paket' => $request->input('nama_paket'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $namaFile,
            'harga' => $request->input('harga')
        ]);
        return redirect()->route('admin.jenispaket.index')->with('success', 'Data jenispaket Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jenispaket::where('id', $id)->delete();
        return redirect()->route('admin.jenispaket.index')->with('success', 'Data jenispaket Berhasil Dihapus');
    }
}
