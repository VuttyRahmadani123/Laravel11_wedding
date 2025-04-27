<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanandetail extends Model
{
    protected $table = 'pesanandetail';
    protected $fillable = ['pesanan_id', 'jenispaket_id', 'item_id', 'jumlah'];
    // Tambahkan relasi ke pesanandetail
    public function pesanandetail()
    {
        return $this->belongsTo(Pesanandetail::class);
    }
}
