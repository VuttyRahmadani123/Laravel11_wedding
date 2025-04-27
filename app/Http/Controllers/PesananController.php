<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pesanan;
use App\Models\Jenispaket;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanans = Pesanan::with(['jenispaket', 'item'])->get(); 
        $jenispakets = Jenispaket::all();
        $items = Item::all();
        return view('admin.pesanan.index', compact('pesanans', 'jenispakets', 'items'));
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
            'pelanggan_id' => 'required',
            'jenispaket_id' => 'required',
            'item_id' => 'required',
            'total_harga' => 'required',
            'tgl_acara' => 'required',
            'jam_acara' => 'required',
            'lokasi_acara' => 'required',
            'catatan' => 'required',
        ], [
            'pelanggan_id.required' => 'pelanggan_id wajib diisi',
            'jenispaket_id.required' => 'jenispaket_id wajib diisi',
            'item_id.required' => 'item_id wajib diisi',
            'total_harga.required' => 'total harga wajib diisi',
            'tgl_acara.required' => 'tgl acara wajib diisi',
            'jam_acara.required' => 'jam acara wajib diisi',
            'lokasi_acara.required' => 'lokasi acara wajib diisi',
            'catatan.required' => 'catatan wajib diisi'
        ]);
        Pesanan::create([
            'pelanggan_id' => $request->input('pelanggan_id'),
            'jenispaket_id' => $request->input('jenispaket_id'),
            'item_id' => $request->input('item_id'),
            'total_harga' => $request->input('total_harga'),
            'tgl_acara' => $request->input('tgl_acara'),
            'jam_acara' => $request->input('jam_acara'),
            'lokasi_acara' => $request->input('lokasi_acara'),
            'catatan' => $request->input('catatan')
        ]);
        
        return redirect()->route('admin.pesanan.index')->with('success', 'Data Pesanan Berhasil Disimpan');
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
        $pesanans = Pesanan::findOrFail($id);
        return view('admin.pesanan.edit', compact('pesanans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'jenispaket_id' => 'required',
            'item_id' => 'required',
            'total_harga' => 'required',
            'tgl_acara' => 'required',
            'jam_acara' => 'required',
            'lokasi_acara' => 'required',
            'catatan' => 'required',
        ], [
            'pelanggan_id.required' => 'pelanggan_id wajib diisi',
            'jenispaket_id.required' => 'jenispaket_id wajib diisi',
            'item_id.required' => 'item_id wajib diisi',
            'total_harga.required' => 'total harga wajib diisi',
            'tgl_acara.required' => 'tgl acara wajib diisi',
            'jam_acara.required' => 'jam acara wajib diisi',
            'lokasi_acara.required' => 'lokasi acara wajib diisi',
            'catatan.required' => 'catatan wajib diisi'
        ]);
        $pesanans = Pesanan::findOrFail($id);
        $pesanans->update([
            'pelanggan_id' => $request->input('pelanggan_id'),
            'jenispaket_id' => $request->input('jenispaket_id'),
            'item_id' => $request->input('item_id'),
            'total_harga' => $request->input('total_harga'),
            'tgl_acara' => $request->input('tgl_acara'),
            'jam_acara' => $request->input('jam_acara'),
            'lokasi_acara' => $request->input('lokasi_acara'),
            'catatan' => $request->input('catatan')
        ]);
        return redirect()->route('admin.pesanan.index')->with('success', 'Data Pesanan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pesanan::where('id', $id)->delete();
        return redirect()->route('admin.pesanan.index')->with('success', 'Data Pesanan Berhasil Dihapus');
    }
}
