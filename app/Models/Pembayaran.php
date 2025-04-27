<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    
    protected $table = 'pembayaran';
    protected $fillable = ['pesanan_id', 'tgl_bayar', 'total_bayar', 'metode_pembayaran', 'status_pembayaran'];
    // Tambahkan relasi ke pembayaran
    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
