<?php

namespace App\Http\Controllers;

use App\Models\Pesanandetail;
use Illuminate\Http\Request;

class PesanandetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanandetails = Pesanandetail::all();
        return view('admin.pesanandetail.index', compact('pesanandetails'));
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
            'pesanan_id' => 'required',
            'jenispaket_id' => 'required',
            'item_id' => 'required',
            'jumlah' => 'required',
        ], [
            'pesanan_id.required' => 'pesanan_id wajib diisi',
            'jenispaket_id.required' => 'jenispaket_id wajib diisi',
            'item_id.required' => 'item_id wajib diisi',
            'jumlah.required' => 'jumlah wajib diisi',
        ]);
        Pesanandetail::create([
            'pesanan_id' => $request->input('pesanan_id'),
            'jenispaket_id' => $request->input('jenispaket_id'),
            'item_id' => $request->input('item_id'),
            'jumlah' => $request->input('jumlah'),
        ]);
        
        return redirect()->route('admin.pesanandetail.index')->with('success', 'Data Pesanan Detail Berhasil Disimpan');
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
        $pesanandetails =  Pesanandetail::findOrFail($id);
        return view('admin.pesanandetail.edit', compact('pesanandetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pesanan_id' => 'required',
            'jenispaket_id' => 'required',
            'item_id' => 'required',
            'jumlah' => 'required',
        ], [
            'pesanan_id.required' => 'pesanan_id wajib diisi',
            'jenispaket_id.required' => 'jenispaket_id wajib diisi',
            'item_id.required' => 'item_id wajib diisi',
            'jumlah.required' => 'jumlah wajib diisi',
        ]);
        $pesanandetails = Pesanandetail::findOrFail($id);
        $pesanandetails->update([
            'pesanan_id' => $request->input('pelanggan_id'),
            'jenispaket_id' => $request->input('jenispaket_id'),
            'item_id' => $request->input('item_id'),
            'jumlah' => $request->input('tjumlahotal_harga'),
        ]);
        return redirect()->route('admin.pesanandetail.index')->with('success', 'Data Pesanan Detail Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pesanandetail::where('id', $id)->delete();
        return redirect()->route('admin.pesanandetail.index')->with('success', 'Data Pesanan Detail Berhasil Dihapus');

    }
}
