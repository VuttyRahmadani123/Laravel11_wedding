<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item_paket extends Model
{
    protected $table = 'item_paket';
    protected $fillable = ['jenispaket_id', 'item_id'];
    // Tambahkan relasi ke item_paket
    public function item_paket()
    {
        return $this->belongsTo(Item_paket::class);
    }  
}
