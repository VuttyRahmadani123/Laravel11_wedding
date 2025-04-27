<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $fillable = ['nama_item', 'harga', 'stok', 'gambar'];
    // Tambahkan relasi ke pelanggan
    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
