<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $fillable = ['pelanggan_id', 'jenispaket_id', 'item_id', 'total_harga', 'tgl_acara', 'jam_acara', 'lokasi_acara', 'catatan'];
    // Tambahkan relasi ke pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }
    public function jenispaket()
    {
        return $this->belongsTo(Jenispaket::class, 'jenispaket_id', 'id');
    }
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}
