<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index', compact('items'));
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
            'nama_item' => 'required|max:30',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ], [
            'harga.required' => 'harga wajib diisi',
            'stok.required' => 'stok wajib diisi',
            'gambar.required' => 'gambar Wajib diupload'
        ]);

        $namaFile = $request->file('gambar')->store('item','public');
        Item::create([
            'nama_item' => $request->input('nama_item'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
            'gambar' => $namaFile,
            
        ]);
        
        return redirect()->route('admin.item.index')->with('success', 'Data Item Berhasil Disimpan');
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
        $items = Item::findOrFail($id);
        return view('admin.item.edit', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_item' => 'required|max:30',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ], [
            'nama_item.required' => 'nama_paket wajib diisi',
            'harga.required' => 'harga wajib diisi',
            'stok.required' => 'stok wajib diisi',
            'gambar.required' => 'gambar wajib diupload'
        ]);
        
        $items = Item::findOrFail($id);

        // Jika ada gambar yang diunggah, simpan dan hapus gambar lama
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($items->gambar) {
                Storage::disk('public')->delete($items->gambar);
            }
            
            $namaFile = $request->file('gambar')->store('item', 'public');
        } else {
            $namaFile = $items->gambar; // Gunakan gambar lama jika tidak ada yang baru
        }
    
        $items->update([
            'nama_item' => $request->input('nama_item'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
            'gambar' => $namaFile,
            
        ]);
        return redirect()->route('admin.item.index')->with('success', 'Data Item Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Item::where('id', $id)->delete();
        return redirect()->route('admin.item.index')->with('success', 'Data Item Berhasil Dihapus');
    }
}
